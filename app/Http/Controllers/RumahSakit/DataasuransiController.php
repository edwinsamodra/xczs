<?php

namespace App\Http\Controllers\RumahSakit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonController;



class DataasuransiController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $asuransi = DB::table('mt_asuransi')
            ->select(
                'mt_asuransi.id_asuransi as id_asuransi',
                'mt_asuransi.kode_asuransi as kode_asuransi',
                'mt_asuransi.nama_asuransi as nama_asuransi',
                'mt_asuransi.pimpinan as pimpinan',
                'mt_asuransi.id_dc_kelurahan as id_dc_kelurahan',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota'
            )->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->when($keyword, function ($query, $keyword) {
                $query->where('mt_asuransi.nama_asuransi', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_asuransi', 'asc')
            ->paginate(5);


        return view('apkrs.RumahSakit.DataAsuransi.index', [
            'asuransi' => $asuransi,
            'keyword' => $keyword,
        ]);
    }

    public function indexasuransi(Request $request)
    {
        $kodeAsuransi = $request->id;


        $asuransi = DB::table('mt_asuransi')
            ->select(
                'mt_asuransi.id_asuransi as id_asuransi',
                'mt_asuransi.kode_asuransi as kode_asuransi',
                'mt_asuransi.nama_asuransi as nama_asuransi',
                'mt_asuransi.pimpinan as pimpinan',
                'mt_asuransi.logo_asuransi as logo',
                'mt_asuransi.nomer_nib as nomer_nib',
                'mt_asuransi.alamat as alamat',
                'mt_asuransi.tgl_nib as tgl_nib',
                'mt_asuransi.tgl_daftar as tgl_daftar',
                'mt_asuransi.jenis_perusahaan as jenis_perusahaan',
                'mt_asuransi.jenis_kerjasama as jenis_kerjasama',
                'mt_asuransi.alamat_tagihan as alamat_tagihan',
                DB::raw('date(mt_asuransi.tgl_kontrak) as tgl_kontrak'),
                'mt_asuransi.no_surat_kontrak as no_surat_kontrak',
                'mt_asuransi.telpon1 as telpon1',
                'mt_asuransi.telpon2 as telpon2',
                'mt_asuransi.kontakperson as kontakperson',
                'mt_asuransi.kontakperson2 as kontakperson2',
                'mt_asuransi.hp as hp',
                'mt_asuransi.fax as fax',
                'mt_asuransi.kodepos as kodepos',

                'mt_asuransi.id_dc_kelurahan as id_dc_kelurahan',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota'
            )->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
           
            ->where('mt_asuransi.kode_asuransi', $kodeAsuransi)
            
            ->get()[0];
            $longFormat = true;
            $withDate = true;
            $asuransi->tgl_kontrak_format = CommonController::now($longFormat, $withDate, $asuransi->tgl_kontrak);
            $asuransi->tgl_nib_format = CommonController::now($longFormat, $withDate, $asuransi->tgl_nib);
            $asuransi->tgl_daftar_format = CommonController::now($longFormat, $withDate, $asuransi->tgl_daftar);



        return view('apkrs.RumahSakit.DataAsuransi.indexasuransi', [
            'asuransi' => $asuransi,
        ]);
    }
}
