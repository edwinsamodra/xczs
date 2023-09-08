<?php

namespace App\Http\Controllers\RumahSakit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataperusahaanController extends Controller
{
    //
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $karyawan = DB::table('mt_kepesertaan')
            ->select(
            'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
            'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
            'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
            'mt_kepesertaan.kd_jabatan as kd_jabatan',
            DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
            'mt_kepesertaan.nama_jabatan as nama_jabatan',
            'mt_kepesertaan.alergi as alergi',
            'dc_kawin.kawin as kawin',
            'dc_agama.agama as agama',
            'dc_gender.gender as gender',
            'dc_golongan_darah.golongan_darah as golongan_darah',
            'mt_perusahaan.nama_perusahaan as nama_perusahaan',
            'mt_kelas_asuransi.nama_layanan as nama_layanan',
            'mt_kepesertaan.status as status',
            )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('mt_kelas_asuransi', 'mt_kelas_asuransi.kd_kls_asuransi', '=', 'mt_kepesertaan.kd_sla')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('kd_Karyawan', 'asc')
            ->paginate(5);


        return view('apkrs.RumahSakit.DataPerusahaan.index', [
            'karyawan' => $karyawan,
            'keyword' => $keyword,
        ]);
    }
}
