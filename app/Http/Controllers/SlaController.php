<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{ServiceLevel, Propinsi, Kota, Kecamatan, Kelurahan};
use App\Http\Controllers\CommonController as Common;


class SlaController extends Controller
{
    //
    // public function index(Request $request)
    // {
    //     // $kodeUser = $request->session()->get('user')->kode_user;

    //     $keyword = $request->keyword;

    //     $sla = DB::table('q_sla_kepesertaan')
    //         ->select(
    //             // 'mt_master_karyawan_perusahaan.kd_Karyawan as kd_Karyawan',
    //             // 'mt_perusahaan.nama_perusahaan as nama_perusahaan',
    //             // 'mt_master_karyawan_perusahaan.Nama_karyawan as Nama_karyawan',
    //             // 'tbl_jabatan.nama_jabatan as nama_jabatan',
    //             // 'mt_sla_2022.presmi_per_bulan_perorangan as presmi_per_bulan_perorangan',
    //             // 'mt_sla_2022.Premi_per_tahun_perorangan as Premi_per_tahun_perorangan',
    //             // 'mt_sla_2022.presmi_per_bulan_keluarga as presmi_per_bulan_keluarga',
    //             // 'mt_sla_2022.Premi_per_tahun_keluarga as Premi_per_tahun_keluarga',
    //             // 'mt_sla_2022.pagu_perorangan as pagu_perorangan',
    //             // 'mt_sla_2022.pagu_perorangan_keluarga as pagu_perorangan_keluarga',
    //             // 'mt_sla_2022.tarif_rs_permalam as tarif_rs_permalam',
    //             // 'mt_sla_2022.SLA as SLA'
    //             )
    //         // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_master_karyawan_perusahaan.kd_jabatan')
    //         // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_jabatan', '=', 'mt_master_karyawan_perusahaan.kd_jabatan')
    //         // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_perusahaan', '=', 'mt_master_karyawan_perusahaan.kd_perusahaan')
    //         // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_perusahaan', '=', 'mt_master_karyawan_perusahaan.kd_perusahaan')
    //         // ->join('mt_kelas', 'mt_kelas.kl_klas', '=', 'mt_jatah_klas.kd_kls_asuransi')
    //         ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'q_sla_kepesertaan.kd_perusahaan')

    //         // ->join('mt_sla_2022', 'mt_sla_2022.kd_sla', '=', 'mt_jatah_klas.kd_kls_asuransi')

    //         // ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_tbl_jsla_perusahaan.kd_sla')
    //         // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_tbl_jsla_perusahaan.kd_jabatan')
    //         // ->where('mt_master_karyawan_perusahaan.kd_perusahaan', '=', 'P00001')
    //         ->when($keyword, function($query, $keyword){
    //             $query->where('Nama_karyawan', 'like', '%' . $keyword . '%');
    //         })
    //         // ->distinct('tbl_jabatan.kd_jabatan')
    //         ->orderBy('kd_Karyawan', 'asc')
    //         ->paginate(5);
    //     // dd($members);
    //     return view('hiss/sla/index',[
    //         'sla' => $sla,]);
    //     // return response()->json($sla);
    // }

    // public function index(Request $request)
    // {
    //     // $kodeUser = $request->session()->get('user')->kode_user;

    //     $keyword = $request->keyword;

    //     $sla = DB::table('mt_tbl_jsla_perusahaan')
    //         ->select(
    //             'mt_perusahaan.nama_perusahaan as nama_perusahaan',
    //             'tbl_jabatan.nama_jabatan as nama_jabatan',
    //             'mt_sla_2022.presmi_per_bulan_perorangan as presmi_per_bulan_perorangan',
    //             'mt_sla_2022.Premi_per_tahun_perorangan as Premi_per_tahun_perorangan',
    //             'mt_sla_2022.presmi_per_bulan_keluarga as presmi_per_bulan_keluarga',
    //             'mt_sla_2022.Premi_per_tahun_keluarga as Premi_per_tahun_keluarga',
    //             'mt_sla_2022.pagu_perorangan as pagu_perorangan',
    //             'mt_sla_2022.pagu_perorangan_keluarga as pagu_perorangan_keluarga',
    //             'mt_sla_2022.tarif_rs_permalam as tarif_rs_permalam',
    //             'mt_sla_2022.SLA as SLA'
    //             )
    //         ->join('mt_sla_2022', 'mt_sla_2022.kd_sla', '=', 'mt_tbl_jsla_perusahaan.kd_sla')
    //         ->join('mt_perusahaan', 'mt_perusahaan.id_perusahaan', '=', 'mt_tbl_jsla_perusahaan.kd_perusahaan')
    //         ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_tbl_jsla_perusahaan.kd_jabatan')
    //         // ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_tbl_jsla_perusahaan.kd_sla')
    //         // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_tbl_jsla_perusahaan.kd_jabatan')
    //         // ->where('mt_master_karyawan_perusahaan.kd_perusahaan', '=', 'P00001')
    //         ->when($keyword, function($query, $keyword){
    //             $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
    //         })
    //         ->orderBy('kl_sla_perusahaan', 'asc')
    //         ->paginate(5);
    //     // dd($members);
    //     return view('hiss/sla/index',[
    //         'sla' => $sla
    //     ]);
    // }


    

    public function store(Request $request)
    {        
        $idBranch = $request->frmDataCabang_id;
        // $kodeUser = $request->session()->get('user')->kode_user;

        if ($idBranch == 0)
        {
            $branch = new ServiceLevel;
        } else {
            $branch = ServiceLevel::find($idBranch);
        }
        
        $branch->nama_cabang_asuransi   = $request->nama_cabang_asuransi;
        $branch->nama_pimpinan_cabang   = $request->nama_pimpinan_cabang;
        $branch->id_dc_kelurahan        = $request->id_dc_kelurahan;
        

        if ($branch->save())
        {
            $arr = [
                'error' => 0,
                'message' => 'Data telah disimpan'
            ];
        } else {
            $arr = [
                'error' => 1,
                'message' => 'Data gagal disimpan'
            ];
        }

        return response()->json($arr);
    }



    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $searchBy = $request->searchBy;
        $keyword = $request->keyword;

        $sla = DB::table('mt_kepesertaan')->select(
            'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
            'mt_kepesertaan.Nama_karyawan as Nama_karyawan',
            'mt_perusahaan.nama_perusahaan as nama_perusahaan',
            // 'mt_kepesertaan.Nama_karyawan as Nama_karyawan',
            'tbl_jabatan.nama_jabatan as nama_jabatan',
            'mt_sla_2022.presmi_per_bulan_perorangan as premi_per_bulan_perorangan',
            'mt_sla_2022.Premi_per_tahun_perorangan as premi_per_tahun_perorangan',
            'mt_sla_2022.presmi_per_bulan_keluarga as premi_per_bulan_keluarga',
            'mt_sla_2022.Premi_per_tahun_keluarga as premi_per_tahun_keluarga',
            'mt_sla_2022.pagu_perorangan as pagu_perorangan',
            'mt_sla_2022.pagu_perorangan_keluarga as pagu_perorangan_keluarga',
            'mt_sla_2022.tarif_rs_permalam as tarif_rs_permalam',
            'mt_sla_2022.SLA as SLA',
            DB::raw("CASE mt_kepesertaan.id_dc_kawin WHEN 1 THEN 'PERORANGAN' ELSE 'KELUARGA' END AS status"))
        ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
        ->join('mt_tbl_jsla_perusahaan', 'mt_tbl_jsla_perusahaan.kd_jabatan', '=', 'tbl_jabatan.kd_jabatan')
        // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
        // ->join('mt_kelas', 'mt_kelas.kl_klas', '=', 'mt_jatah_klas.kd_kls_asuransi')
        ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
        ->join('mt_sla_2022', 'mt_sla_2022.kd_sla', '=', 'mt_tbl_jsla_perusahaan.kd_sla')
        ->where('mt_perusahaan.kode_asuransi', $kodeUser)            
        // ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_tbl_jsla_perusahaan.kd_sla')
        // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_tbl_jsla_perusahaan.kd_jabatan')
        // ->where('mt_kepesertaan.kd_perusahaan', '=', 'P00001')
        // ->when($keyword, function($query, $keyword){
        //     $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        // })
        // ->when($keyword, function($query, $keyword) use($searchBy){
        //     if ($searchBy == 'company'){
        //         $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
        //     } elseif ($searchBy == 'employee' || $searchBy == ''){
        //         $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        //     }
        // })        
        ->when($searchBy, function ($query, $searchBy) use ($keyword) {
            if ($searchBy=='company'){
                $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
            } else {
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            }
        })
        ->distinct('mt_kepesertaan.nama_Karyawan')
        ->orderBy('mt_kepesertaan.kd_Karyawan', 'asc')
        ->paginate(5);

        // $searchBy = 'employee';
        // $keyword  = '';

        // if ($request->has('keyword')){
        //     $keyword = $request->keyword;

        //     if ($request->has('searchBy')){
        //         $searchBy = $request->searchBy;

        //         if ($searchBy == 'company'){
        //             // search by company with keyword x
        //             $sla->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
        //         } else {
        //             // search by employee with keyword x
        //             $sla->where('mt_master_karyawan_perusahaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        //         }
        //     } else {
        //         // search by employee
        //         $sla->where('mt_master_karyawan_perusahaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        //     }
        // } else {
        //     // search by employee
        //     // $sla->where('mt_master_karyawan_perusahaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        // }

        //dd($sla);

        return view('hiss/sla/index',[
            'sla' => $sla,
            'searchBy' => $searchBy
        ]);
    }


    public function getSlaMemberInfo(Request $request)
    {
        $table = 'q_sla_kepesertaan';
        $primaryKey = 'kd_Karyawan';
        
        $arr = [];

        $kd_Karyawan = $request->kd_Karyawan;

        if (is_int($kd_Karyawan)){
            $slaInfo = DB::table($table)
            ->select(implode(",", Common::$tableColumns[$table]))
            ->where($primaryKey, $kd_Karyawan)
            ->get();

            if ($slaInfo){
                $arr['error'] = 0;
                $arr['slaInfo'] = $slaInfo;
            } else {
                $arr['error'] = 1;
                $arr['message'] = 'INVALID_QUERY';
            }
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INPUT_REQUIRE_NUMERIC_VALUE';
        }

        return response()->json($arr);
    }    
}
