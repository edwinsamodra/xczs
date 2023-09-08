<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MenuController extends Controller
{
    public function index(Request $request)
    {

        $user = auth()->user();

        $menus = DB::table('dd_user')
            ->select(
                'dc_sub_menu.nama_sub_menu AS nama_sub_menu',
                'dc_sub_menu.url_sub_menu AS url_sub_menu',                
                'dc_sub_menu.no_urut AS no_urut_sub_menu',
                'dc_menu.nama_menu AS nama_menu',
                'dc_menu.no_urut AS no_urut_menu',
                'dc_modul.id_dc_modul AS id_dc_modul',
                'dc_modul.nama_modul AS nama_modul',
                'dc_modul.logo AS logo',
                'dc_modul.no_urut AS no_urut_modul',
                'dd_user.npp AS npp',
                'dd_user.status AS status',
                'dd_user.ko_wil AS ko_wil',
                'dd_user_group.nama_group AS nama_group_user',
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
            ->where('dd_user.username', '=', $user->username)
            ->where('dd_user.kode_user', '=', $user->kode_user)
            ->orderBy('id_dc_modul', 'asc')
            ->orderBy('no_urut_menu', 'asc')
            ->orderBy('no_urut_sub_menu', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'menus' => $menus
        ], 200);
    }

}
