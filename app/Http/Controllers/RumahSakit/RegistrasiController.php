<?php

namespace App\Http\Controllers\RumahSakit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Member, MemberRelative, FamilyRelationship, Agama, Jabatan, 
    GolDarah, Kelurahan, KaryawanPerusahaan,Kawin, Gender, HubunganKeluarga, tbl_jabatan, Perusahaan};
use Illuminate\Support\Facades\DB;
use App\Models\Disease;
use Carbon\Carbon;
use App\Http\Controllers\CommonController;



class RegistrasiController extends Controller
{
    //
    public function index(Request $request)
    {

        $agama = Agama::get_all();
        $gender = Gender::get_all();
        $goldarah = GolDarah::get_all();
        $kawin = Kawin::get_all();
        $tbljabatan = tbl_jabatan::get_all();
        
        return view('apkrs.Registrasi.Registrasi.index',[
            'agama' => $agama,
            'gender' => $gender,
            'goldarah' => $goldarah,
            'kawin' => $kawin,
            'tbljabatan' => $tbljabatan,

        ]);
    }

    public function cariPasien(Request $request)
    {
        $keyword = $request->get('keyword');
        $format = $request->get('format');

        $pasien = Member::where('Nama_karyawan', 'like', '%' . $keyword .'%')->get();

        if (count($pasien) > 0)
        {
            if ($format == 'json')
            {
                $arr = [
                    'status' => 'OK',
                    'pasien' => $pasien
                ];
                return response()->json($arr);
            } else {                
                $html = '';
                foreach($pasien as $disease)
                {
                    $html .= '<div class="list-item" data-id="' . $disease->kd_Karyawan . '">' . $disease->Nama_karyawan . '</div>';
                }                
                return $html;
            }            
        } else {
            if ($format == 'json')
            {
                $arr = [
                    'status'  => 'ERROR',
                    'message' => 'Tidak ditemukan nama penyakit yang mengandung kata ' . $keyword
                ];
                return response()->json($arr);
            } else {
                return 'Tidak ditemukan nama penyakit yang mengandung kata ' . $keyword;
            }      
        } 

    }
    public function indexpasien(Request $request)
    {
        $idPasien = $request->keyword;

        $pasien = DB::table('mt_kepesertaan')
        ->select(
            'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
            'mt_kepesertaan.Nama_karyawan as Nama_karyawan',
            'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
            'mt_kepesertaan.kd_jabatan as kd_jabatan',
            DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
            'mt_kepesertaan.nama_jabatan as nama_jabatan',
            'mt_kepesertaan.alergi as alergi',
            'mt_kepesertaan.no_polis as no_polis',
            'mt_kepesertaan.no_ktp as no_ktp',
            'mt_kepesertaan.status as status',
            'dc_kawin.kawin as kawin',
            'mt_kepesertaan.id_dc_kawin as id_dc_kawin',
            'dc_agama.agama as agama',
            'mt_kepesertaan.id_dc_agama as id_dc_agama',
            'mt_kepesertaan.id_dc_gender as id_dc_gender',
            'mt_kepesertaan.Keterangan as Keterangan',
            'mt_kepesertaan.foto as foto',
            'dc_gender.gender as gender',
            'tbl_jabatan.nama_jabatan as nama_jabatan',
            'dc_golongan_darah.golongan_darah as golongan_darah',
            'mt_kepesertaan.id_dc_gol_darah as id_dc_gol_darah',
            'mt_kepesertaan.kd_perusahaan as kd_perusahaan',
            'mt_perusahaan.nama_perusahaan as nama_perusahaan',
            'mt_kelas_asuransi.nama_layanan as nama_layanan',
            'mt_kepesertaan.status as status',
            'mt_sla_2022.presmi_per_bulan_perorangan AS presmi_per_bulan_perorangan',
            'mt_sla_2022.Premi_per_tahun_perorangan AS Premi_per_tahun_perorangan',
            'mt_sla_2022.presmi_per_bulan_keluarga AS presmi_per_bulan_keluarga',
            'mt_sla_2022.Premi_per_tahun_keluarga AS Premi_per_tahun_keluarga',
            'mt_sla_2022.pagu_perorangan AS pagu_perorangan',
            'mt_sla_2022.pagu_perorangan_keluarga AS pagu_perorangan_keluarga',
            'mt_sla_2022.tarif_rs_permalam AS tarif_rs_permalam'
            )
        ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
        ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
        ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
        ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
        ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
        ->join('mt_jatah_klas', 'mt_jatah_klas.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
        ->join('mt_kelas_asuransi', 'mt_kelas_asuransi.kd_kls_asuransi', '=', 'mt_jatah_klas.kd_kls_asuransi')
        ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
        ->join('mt_sla_2022','mt_jatah_klas.kd_kls_asuransi','=','mt_sla_2022.kl_kls')
        ->where('kd_Karyawan', $idPasien)->first();
        // $arr=[];
        // $
        $longFormat = true;
        $withDate = true;
        $pasien->format_tgl_lahir  = CommonController::now($longFormat, $withDate, $pasien->tgl_lahir);

        $pasien->usia = Carbon::parse($pasien->tgl_lahir)->age;
        $dataPasien = ['pasien' => $pasien];
        // dd($dataPasien);
        return view('apkrs.Registrasi.Registrasi.indexpasien', $dataPasien);
    }
    public function tambah(Request $request)
    {
        $agama = Agama::get_all();
        $gender = Gender::get_all();
        $goldarah = GolDarah::get_all();
        $kawin = Kawin::get_all();
        $tbljabatan = tbl_jabatan::get_all();
        return view('apkrs.Registrasi.Registrasi.indextambahpasien',[
            'agama' => $agama,
            'gender' => $gender,
            'goldarah' => $goldarah,
            'kawin' => $kawin,
            'tbljabatan' => $tbljabatan,

        ]);
        // return view('apkrs.Registrasi.Registras  i.indextambahpasien');
    }
}
