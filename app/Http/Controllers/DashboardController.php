<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Asuransi;

use App\Http\Controllers\CommonController;

class DashboardController extends Controller
{
    
    public function profile(Request $request)
    {
        $kode_user = $request->session()->get('user')['kode_user'];

        // DB::enableQueryLog();
        
        $profile = Asuransi::select(
            'nama_asuransi as nama_asuransi',
            'pimpinan as pimpinan',
            'alamat as alamat',
            'dc_kota.nama_kota as nama_kota',
            'dc_kecamatan.nama_kecamatan as nama_kecamatan',
            'dc_kelurahan.nama_kelurahan as nama_kelurahan',
            'kodepos as kodepos',
            'telpon1 as telpon1',
            'telpon2 as telpon2',
            'kontakperson as kontakperson',
            'kontakperson2 as kontakperson2',
            DB::raw('date(tgl_kontrak) as tgl_kontrak'),
            DB::raw('date(tgl_expired) as tgl_expired'),
            DB::raw('date(tgl_NIB) as tgl_NIB'),
            DB::raw('date(tgl_daftar) as tanggal_daftar'),            
            'fax as fax',
            'hp as hp',
            'kode_group as kode_group',
            'logo_asuransi as logo_asuransi',
            'no_surat_kontrak as no_surat_kontrak',
            'jenis_kerjasama as jenis_kerjasama',
            'alamat_tagihan as tagihan')
        ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_asuransi.id_dc_kelurahan')
        ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
        ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
        ->where('mt_asuransi.kode_asuransi', $kode_user)->first();
        $arr = [];
        // dd($profile);
        if ($profile){
            $longFormat = true;
            $withDate = true;

            $profile->tgl_kontrak_full  = CommonController::now($longFormat, $withDate, $profile->tgl_kontrak);
            $profile->tgl_expired_full  = CommonController::now($longFormat, $withDate, $profile->tgl_expired);
            $profile->tgl_NIB_full      = CommonController::now($longFormat, $withDate, $profile->tgl_NIB);
            $profile->tgl_daftar_full   = CommonController::now($longFormat, $withDate, $profile->tanggal_daftar);

            $arr['error'] = 0;
            $arr['profile'] = $profile;

        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }
                
        $data = [
            'profile' => $profile,
            'now' => CommonController::now()
        ];
        

        return view('hiss.profile.profile', $data);
    }
    

    public function asuransi(Request $request)
    {
        $asuransi = Asuransi::where('kode_asuransi', $request->kode_asuransi);

        $asuransi['kode_asuransi'] = $request->kode_asuransi;
        $asuransi['nama_asuransi'] = $request->nama_asuransi;
        $asuransi['pimpinan'] = $request->pimpinan;
        $asuransi['alamat'] = $request->alamat;

        $asuransi['id_dc_kelurahan'] = $request->id_dc_kelurahan;
        $asuransi['id_dc_kecamatan'] = $request->id_dc_kecamatan;
        $asuransi['id_dc_kota'] = $request->id_dc_kota;

        $asuransi['kode_pos'] = $request->kode_pos;
        $asuransi['telpon1'] = $request->telpon1;
        $asuransi['telpon2'] = $request->telpon2;
        $asuransi['kontakPerson'] = $request->kontakPerson;
        $asuransi['kontakPerson2'] = $request->kontakPerson2;
        $asuransi['hp'] = $request->hp;
        $asuransi['tgl_daftar'] = $request->tgl_daftar;
        $asuransi['tgl_nib'] = $request->tgl_nib;
        $asuransi['alamat_tagihan'] = $request->alamat_tagihan;
        $asuransi['jenis_kerjasama'] = $request->jenis_kerjasama;

        $file = $request->file('logo_asuransi');
        $targetFolder = 'logoasuransi';
        $originalFilename = $file->getClientOriginalName();
        
        if ($file->move($targetFolder, $originalFilename)) {
            $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;
            $asuransi->logo_asuransi = $filePath;
        }
        
        if ($asuransi->save()) {
            $arr = [
                'error' => 0,
                'message' => 'Data telah diupdate'
            ];
        } else {
            $arr = [
                'error' => 1,
                'message' => 'Data gagal diupdate'
            ];
        }

        return response()->json($arr);
    
    }


    public function blank()
    {
        return view('hiss.blank');
    }
   
}