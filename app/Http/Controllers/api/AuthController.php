<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
 
    /**
     * Login The User
     * @param Request $request
     * @return User
     */
    public function userLogin(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => md5($request->password),
            'kode_user' => $request->kode_user
        ];

        $user = User::where($credentials)->first();

        if (!$user)
        {
            return response()->json([
				'status' => false,
				'message' => 'Invalid credentials'
			], 401);
        }

        Auth::login($user);

        $userSite = DB::table('dd_user')
            ->select('dc_jenis_group.url_site AS url_site')
            ->join('dd_user_group', 'dd_user_group.id_dd_user_group', '=', 'dd_user.id_dd_user_group')
            ->join('dc_jenis_group', 'dc_jenis_group.id_dc_jenis_group', '=', 'dd_user_group.id_dc_jenis_group')
            ->where('dd_user.username', '=', $request->username)
            ->where('dd_user.kode_user', '=', $request->kode_user)
            ->get();

        return response()->json([
            'status' => true,
            'site' => $userSite[0]->url_site,
            'token' => $user->createToken("auth_token")->plainTextToken
        ], 200);
    }
    
}
