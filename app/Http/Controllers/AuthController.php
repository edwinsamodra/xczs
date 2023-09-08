<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\User;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }


    public function customAuthenticate(Request $request)
    {

        $credentials = [
            'kode_user' => $request->kode_user,
            'username' => $request->username,
            'password' => md5($request->password)
        ];

        $validationRules = [
            'kode_user' => ['required'],
            'username' => ['required'],
            'password' => ['required']
        ];

        if (!$request->validate($validationRules))
        {            
            return redirect('login');
        }

        $user = User::where($credentials)->first();

        if (!$user){
            $message = 'Kode user/username/password anda salah';
            return redirect('login')->with('message', $message);
        }

        $userSite = DB::table('dd_user')
            ->select('dc_jenis_group.url_site AS url_site')
            ->join('dd_user_group', 'dd_user_group.id_dd_user_group', '=', 'dd_user.id_dd_user_group')
            ->join('dc_jenis_group', 'dc_jenis_group.id_dc_jenis_group', '=', 'dd_user_group.id_dc_jenis_group')
            ->where('dd_user.username', '=', $request->username)
            ->where('dd_user.kode_user', '=', $request->kode_user)
            ->get();            

        if ($user)
        {
            Auth::login($user);

            $menus = DB::table('dd_user')->select(
                'dd_user_group_detail.id_dd_user_group_detail AS id_dd_user_group_detail',
                'dc_sub_menu.nama_sub_menu AS nama_sub_menu',
                'dc_sub_menu.url_sub_menu AS url_sub_menu',                
                'dc_sub_menu.no_urut AS no_urut_sub_menu',
                'dc_sub_menu.id_dc_sub_menu AS id_dc_sub_menu',
                'dc_menu.id_dc_menu AS id_dc_menu',
                'dc_menu.nama_menu AS nama_menu',
                'dc_menu.icon_menu AS icon_menu',
                'dc_menu.no_urut AS no_urut_menu',
                'dc_modul.id_dc_modul AS id_dc_modul',
                'dc_modul.nama_modul AS nama_modul',
                'dc_modul.logo AS logo',
                'dc_modul.no_urut AS no_urut_modul',
                'dd_user.id_dd_user AS id_dd_user',
                'dd_user.npp AS npp',
                'dd_user.status AS status',
                'dd_user.ko_wil AS ko_wil',
                'dd_user_group.id_dd_user_group AS id_dd_user_group',
                'dd_user_group.nama_group AS nama_group_user',
                'dc_modul.id_dc_modular AS id_dc_modular',
                'dd_user.no_induk AS no_induk',
                'dc_jenis_group.nama_jenis_group',
                'dc_jenis_group.url_site AS url_site'
            )    
            ->join('dd_user_group', 'dd_user.id_dd_user_group', '=', 'dd_user_group.id_dd_user_group')
            ->join('dd_user_group_detail', 'dd_user_group.id_dd_user_group', '=', 'dd_user_group_detail.id_dd_user_group')
            ->join('dc_jenis_group', 'dd_user_group.id_dc_jenis_group', '=', 'dc_jenis_group.id_dc_jenis_group')
            ->join('dc_sub_menu', 'dd_user_group_detail.id_dc_sub_menu', '=', 'dc_sub_menu.id_dc_sub_menu')
            ->join('dc_menu', 'dc_sub_menu.id_dc_menu', '=', 'dc_menu.id_dc_menu')
            ->join('dc_modul', 'dc_menu.id_dc_modul', '=', 'dc_modul.id_dc_modul')
            ->where('dd_user.username', '=', $request->username)
            ->where('dd_user.password', '=', md5($request->password))
            ->where('dd_user.kode_user', '=', $request->kode_user)
            ->orderBy('id_dc_modul', 'asc')
            ->orderBy('no_urut_menu', 'asc')
            ->orderBy('no_urut_sub_menu', 'asc')
            ->get();
           
            foreach($menus as $key=>$var){
                $idmenu=$var->id_dc_menu;
                $idsubmenu=$var->id_dc_sub_menu;
                $menu[$idmenu]['menu']=$var->nama_menu;
                $menu[$idmenu]['icon']=$var->icon_menu;
                //$menu['icon_menu']=$var->icon_menu;
                $sub_menu[$idmenu][$idsubmenu]['id_sub_menu']=$var->id_dc_sub_menu;
                $sub_menu[$idmenu][$idsubmenu]['sub_menu']=$var->nama_sub_menu;
                $sub_menu[$idmenu][$idsubmenu]['url']=$var->url_sub_menu;
                $sub_menu[$idmenu][$idsubmenu]['menu']=$var->nama_menu;      
            }
            // dd($menu);
           
            $arrmenu['menu']=$menu;
            $arrmenu['sub_menu']=$sub_menu;
                        
            // dd($arrmenu);

            // order by
            // id_dc_modul,no_urut_menu,no_urut_sub_menu

            // todo: cek is_object
            if ($userSite) {
                $request->session()->put('user', $user);
                $request->session()->put('menus', $menus);
                $request->session()->put('arrmenu', $arrmenu);
                $url = $userSite->first()->url_site;
                // dd($arrmenu);
                return redirect($url); 
                
            } else {
                return redirect('/');
            }

        } else {
            $message = 'Username/password anda salah, silahkan diulangi';
            return redirect('login')->with('message', $message);
        }

    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}