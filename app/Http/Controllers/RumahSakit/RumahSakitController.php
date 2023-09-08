<?php

namespace App\Http\Controllers\RumahSakit;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Klinik;

class RumahSakitController extends Controller
{
    //
    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $klinik = New Klinik;
        $profileRS = $klinik->get_klinik($kodeUser);

        $data = [];

        if ($profileRS){
            $data['profileRS'] = $profileRS;
        } else {
            $data['profileRS'] = [];
        }
        
        return view('apkrs.RumahSakit.Profile.index', $data);
    }

    public function getKlinik(Request $request)
    {

        $kodeKlinik = $request->kodeKlinik;
     
        $klinik = New Klinik;
        $profileRS = $klinik->get_klinik($kodeKlinik);

        $arr = [];

        if ($profileRS){
            $arr['error'] = 0;
            $arr['content'] = $profileRS;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }

    public function blank()
    {
        return view('apkrs.Privy.blank');
    }

    public function store(Request $request)
    {
        $id_mt_klinik = $request->id_mt_klinik;

        $klinik = Klinik::find($id_mt_klinik);

        foreach($klinik->fieldnames as $fieldname){
            $klinik->{$fieldname} = $request->{$fieldname};
        }

        if ($klinik->save()){
            $arr['error'] = 0;
            $arr['message'] = 'Data berhasil disimpan';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal disimpan';
        }

        return response()->json($arr);
    }
}
