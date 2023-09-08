<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asuransi;

class AsuransiController extends Controller
{
    
    public function update(Request $request)
    {
        $kode_asuransi = $request->kode_asuransi;
        $nama_asuransi = $request->nama_asuransi;
        $pimpinan = $request->pimpinan;
        $alamat = $request->alamat;
        $id_dc_kelurahan = $request->id_dc_kelurahan;
        $id_dc_kecamatan = $request->id_dc_kecamatan;
        $id_dc_kota = $request->id_dc_kota;
        $kota = $request->kota;
        $kode_pos = $request->kode_pos;
        $telpon1 = $request->telpon1;
        $telpon2 = $request->telpon2;
        $kontakPerson = $request->kontakPerson;
        $kontakPerson2 = $request->kontakPerson2;
        $hp = $request->hp;
        $tgl_daftar = $request->tgl_daftar;
        $tgl_nib = $request->tgl_nib;
        $alamat_tagihan = $request->alamat_tagihan;
        $jenis_kerjasama = $request->jenis_kerjasama;
        // $logo_asuransi = $request->logo_asuransi;

        $asuransi = Asuransi::where('kode_asuransi', $kode_asuransi)->first();
        
        $asuransi->nama_asuransi = $nama_asuransi;
        $asuransi->pimpinan = $pimpinan;
        $asuransi->alamat = $alamat;
        $asuransi->kota = $kota;
        $asuransi->id_dc_kelurahan = $id_dc_kelurahan;
        $asuransi->id_dc_kecamatan = $id_dc_kecamatan;
        $asuransi->id_dc_kota = $id_dc_kota;
        $asuransi->kodepos = $kode_pos;
        $asuransi->telpon1 = $telpon1;
        $asuransi->telpon2 = $telpon2;
        $asuransi->kontakPerson = $kontakPerson;
        $asuransi->kontakPerson2 = $kontakPerson2;
        $asuransi->hp = $hp;
        $asuransi->tgl_daftar = $tgl_daftar;
        $asuransi->tgl_nib = $tgl_nib;
        $asuransi->alamat_tagihan = $alamat_tagihan;
        $asuransi->jenis_kerjasama = $jenis_kerjasama;


        $file = $request->file('logo_asuransi');
        $targetFolder = 'logoasuransi';
        if ($file)
        {
            $originalFilename = $file->getClientOriginalName();
            if ($file->move($targetFolder, $originalFilename)){
                $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;
                $asuransi->logo_asuransi = $filePath;
            }
        };


        $arr = [];

        if ($asuransi->save()){
            $arr['statusCode'] = 200;
            $arr['message'] = 'Data berhasil di update';
        } else {
            $arr['statusCode'] = 404;
            $arr['message'] = 'Data not found';
        }

        return response()->json($arr);
    }
}
