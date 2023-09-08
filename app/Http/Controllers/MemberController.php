<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\{Member, MemberRelative, FamilyRelationship, Agama, Jabatan, 
                GolDarah, Kelurahan, KaryawanPerusahaan,Kawin, Gender, HubunganKeluarga, tbl_jabatan, Perusahaan, KelasAsuransi};

use Nette\Utils\Json;
use App\Http\Controllers\CommonController as Common;

// MEMBER

class MemberController extends Controller
{
    //
    public $searchColumn;
    public $keyword;
    public $table = 'mt_master_karyawan_perusahaan';

    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $keyword = $request->keyword;

        $companies = DB::table('mt_perusahaan')
            ->select(
                'mt_perusahaan.id_perusahaan as company_id',
                'mt_perusahaan.kode_perusahaan as company_kode',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'mt_perusahaan.nama_pimpinan_perusahaan as nama_pimpinan_perusahaan',
                'mt_perusahaan.id_dc_kelurahan as id_dc_kelurahan',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota'
            )->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
             ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            ->when($keyword, function($query, $keyword){
                $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_perusahaan', 'desc')
            ->paginate(5);


        // $provinces = Propinsi::get_all();
        return view('hiss/member/indexperusahaan',[
            'companies' => $companies,
            'keyword' => $keyword,


        ]);
    }


    public function pesertaPerusahaan(Request $request)
    {
        // $kodeUser = $request->session()->get('user')->kode_user;
        $kode_perusahaan = $request->id;

        // $membershipType = $request->membershipType;
        $keyword = $request->keyword;

        // DB::enableQueryLog();

        $members = DB::table('mt_kepesertaan')
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
                // 'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'mt_kelas_asuransi.nama_layanan as nama_layanan',
                'mt_kepesertaan.status as status',
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            // ->join('mt_kepesertaan', 'mt_kepesertaan.kode_perusahaan', '=', 'mt_jatah_klas.kd_perusahaan')
            ->join('mt_kelas_asuransi', 'mt_kelas_asuransi.kd_kls_asuransi', '=', 'mt_kepesertaan.kd_sla')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_kepesertaan.kd_perusahaan', $kode_perusahaan)
            
            // ->where('mt_kepesertaan.kd_perusahaan', '=', 'P00001')
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            // ->distinct('mt_kepesertaan.nama_Karyawan')

            ->orderBy('kd_Karyawan', 'asc')
            ->paginate(5);

            // dd(DB::getQueryLog());

            $mtperusahaan = DB::table('mt_perusahaan')
            ->select(
                'nama_perusahaan as nama_perusahaan',
                'kode_perusahaan as kode_perusahaan',
                'nama_pimpinan_perusahaan as nama_pimpinan_perusahaan',
                'alamat as alamat',
                'kota as kota',
                'kodepos as kodepos',
                'telpon1 as telpon1',
                'telpon2 as telpon2',
                'kontakperson as kontakperson1',
                'kontakperson2 as kontakperson2',
                'fax as fax',
                'nomer_nib as nomer_nib',
                DB::raw('date(mt_perusahaan.tgl_nib) as tgl_nib'),
                DB::raw('date(mt_perusahaan.tgl_daftar) as tgl_daftar'),
                'jenis_perusahaan as jenis_perusahaan',
                'jenis_kerjasama as jenis_kerjasama',
                'kode_group as kode_group',
                'alamat_tagihan as alamat_tagihan',
                'logo_perusahaan as logo',
                'nama_kelurahan as nama_kelurahan',
                'nama_kecamatan as nama_kecamatan')
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->where('mt_perusahaan.kode_perusahaan', $kode_perusahaan)            
            ->first();


            $perusahaan = Perusahaan::get_all();
            $agama = Agama::get_all();
            $gender = Gender::get_all();
            $goldarah = GolDarah::get_all();
            $kawin = Kawin::get_all();
            $tbljabatan = tbl_jabatan::get_all();
            $layanan = KelasAsuransi::get_all();
        // dd($members);
        return view('hiss/member/index',[
            'perusahaan' => $perusahaan,
            'members' => $members,
            'agama' => $agama,
            'gender' => $gender,
            'goldarah' => $goldarah,
            'kawin' => $kawin,
            'tbljabatan' => $tbljabatan,
            'mtperusahaan' => $mtperusahaan,
            'layanan' => $layanan,
        ]);
    }

    // member type 1=corporate member 2=personal member
    public function getMember(Request $request  )
    {

        // $kodeUser = $request->session()->get('user')->kode_user;
        $kd_Karyawan = $request->id;

        $members = DB::table('mt_kepesertaan')
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
            ->where('kd_Karyawan', $kd_Karyawan)
            ->first();

        return response()->json($members);

    }


    // public function getMembersumum(Request $request, $type='all')
    // {

    //     $kodeUser = $request->session()->get('user')->kode_user;

    //     $membersumum = DB::table('members')
    //     ->select(
    //         'members.id as member_id',
    //         'members.company_id as company_id',
    //         'members.nomor_polis as nomor_polis',
    //         'members.nama as nama_member',
    //         'members.alamat as alamat_member',
    //         'members.id_dc_kawin as tanggal_lahir',
    //         'members.jenis_kelamin as jenis_kelamin')
    //     ->where('members.kode_user', $kodeUser)
    //     ->where('members.company_id', '>', 0)
    //     ->get();

    //     $arr = [];
    //     if ($membersumum){
    //         $arr['error'] = 0;
    //         $arr['members'] = $members;
    //     } else {
    //         $arr['error'] = 1;
    //         $arr['message'] = 'Invalid Query';
    //     }

    //     return response()->json($arr);

    // }

    // public function getMemberUmum(Request $request)
    // {
    //     // if ($request->ajax()) {
    //         $kodeUser = $request->session()->get('user')->kode_user;
    
    //         $members = DB::table('members')
    //         ->select(
    //             'members.id as member_id',
    //             'members.company_id as company_id',
    //             'members.nomor_polis as nomor_polis',
    //             'members.nama as nama_member',
    //             'members.alamat as alamat_member',
    //             'members.tanggal_lahir as tanggal_lahir',
    //             'members.jenis_kelamin as jenis_kelamin')
    //         ->where('members.kode_user', $kodeUser)
    //         ->where('members.company_id', '=', 0)
    //         ->where('members.id', '>', 1644950)
    //         ->orderBy('id', 'desc')

    //         ->get();

    //         return DataTables::of($members)->addIndexColumn()->make(true);
    //     // }
    // }

    public function indexkeluarga(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $keyword = $request->keyword;

        $companies = DB::table('mt_perusahaan')
            ->select(
                'mt_perusahaan.id_perusahaan as company_id',
                'mt_perusahaan.kode_perusahaan as company_kode',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'mt_perusahaan.nama_pimpinan_perusahaan as nama_pimpinan_perushaan',
                'mt_perusahaan.id_dc_kelurahan as id_dc_kelurahan',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota'
            )->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_perusahaan', 'desc')
            ->paginate(5);


        // $provinces = Propinsi::get_all();
        return view('hiss/keluarga/indexperusahaan',[
            'companies' => $companies,
            'keyword' => $keyword,


        ]);
    }

    public function keluargapesertaPerusahaan(Request $request)
    {
        // $kodeUser = $request->session()->get('user')->kode_user;
        $kode_perusahaan = $request->id;

        // $membershipType = $request->membershipType;
        $keyword = $request->keyword;

        $members = DB::table('mt_kepesertaan')
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
                // 'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'mt_kelas_asuransi.nama_layanan as nama_layanan',
                DB::raw("CASE mt_kepesertaan.id_dc_kawin WHEN 1 THEN 'Perorangan' ELSE 'Berkeluarga' END AS status"))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            // ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            // ->join('mt_kepesertaan', 'mt_kepesertaan.kode_perusahaan', '=', 'mt_jatah_klas.kd_perusahaan')
            ->join('mt_kelas_asuransi', 'mt_kelas_asuransi.kd_kls_asuransi', '=', 'mt_kepesertaan.kd_sla')
            
            // ->join('mt_kelas_asuransi', 'mt_kelas_asuransi.kd_kls_asuransi', '=', 'mt_jatah_klas.kd_kls_asuransi')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            
            ->where('mt_kepesertaan.kd_perusahaan', $kode_perusahaan)
            ->where('mt_kepesertaan.status', '=', 'Berkeluarga')
            
            // ->where('mt_kepesertaan.kd_perusahaan', '=', 'P00001')
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            // ->distinct('mt_kepesertaan.nama_Karyawan')

            ->orderBy('kd_Karyawan', 'asc')
            ->paginate(5);

            $mtperusahaan = DB::table('mt_perusahaan')
            ->select(
                'nama_perusahaan as nama_perusahaan',
                'kode_perusahaan as kode_perusahaan',
                'nama_pimpinan_perusahaan as nama_pimpinan_perusahaan',
                'alamat as alamat',
                'kota as kota',
                'kodepos as kodepos',
                'telpon1 as telpon1',
                'telpon2 as telpon2',
                'kontakperson as kontakperson1',
                'kontakperson2 as kontakperson2',
                'fax as fax',
                'nomer_nib as nomer_nib',
                DB::raw('date(mt_perusahaan.tgl_nib) as tgl_nib'),
                DB::raw('date(mt_perusahaan.tgl_daftar) as tgl_daftar'),

                'jenis_perusahaan as jenis_perusahaan',
                'jenis_kerjasama as jenis_kerjasama',
                'kode_group as kode_group',
                'alamat_tagihan as alamat_tagihan',
                'logo_perusahaan as logo',
                'nama_kelurahan as nama_kelurahan',
                'nama_kecamatan as nama_kecamatan',

            )
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->where('mt_perusahaan.kode_perusahaan', $kode_perusahaan)
            
            ->get()[0];


            $perusahaan = Perusahaan::get_all();
            $agama = Agama::get_all();
            $gender = Gender::get_all();
            $goldarah = GolDarah::get_all();
            $kawin = Kawin::get_all();
            $tbljabatan = tbl_jabatan::get_all();
            $hubungankeluarga = HubunganKeluarga::get_all();     
            $karyawanperusahaan = KaryawanPerusahaan::get_all(); 
        // dd($members);
        return view('hiss/keluarga/index',[
            'perusahaan' => $perusahaan,
            'members' => $members,
            'agama' => $agama,
            'gender' => $gender,
            'goldarah' => $goldarah,
            'kawin' => $kawin,
            'tbljabatan' => $tbljabatan,
            'mtperusahaan' => $mtperusahaan,
            'hubungankeluarga' => $hubungankeluarga,
            'karyawanperusahaan' => $karyawanperusahaan
        ]);
    }

    public function membershipIndex(Request $request)
    {
        // $kodeUser = $request->session()->get('user')->kode_user;

        $keyword = $request->keyword;
        $searchColumn = $request->searchColumn;

        $this->searchColumn = $request->searchColumn;

        // membershipType==1 <- corporate members
        $members = DB::table('mt_keluarga_karyawan_perusahaan')
        ->select(
            'mt_keluarga_karyawan_perusahaan.kd_keluarga_karyawan as kd_keluarga_karyawan',
            'mt_keluarga_karyawan_perusahaan.nama_keluarga_karyawan as nama_keluarga_karyawan',
            DB::raw('date(mt_keluarga_karyawan_perusahaan.tgl_lahir) as tgl_lahir'),
            'mt_keluarga_karyawan_perusahaan.id_dc_gender as id_dc_gender',
            'mt_keluarga_karyawan_perusahaan.id_dc_agama as id_dc_agama',
            'mt_keluarga_karyawan_perusahaan.id_dc_gol_darah as id_dc_gol_darah',
            'mt_keluarga_karyawan_perusahaan.id_dc_stat_keluarga as id_dc_stat_keluarga',
            'mt_keluarga_karyawan_perusahaan.kd_karyawan as kd_karyawan',
            'mt_keluarga_karyawan_perusahaan.alergi as alergi',
            'dc_agama.agama as agama',
            'dc_gender.gender as gender',
            'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
            'dc_status_keluarga.hubungan_keluarga as hubungan_keluarga',
            'dc_golongan_darah.golongan_darah as golongan_darah')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_gol_darah')
            ->join('mt_kepesertaan', 'mt_kepesertaan.kd_karyawan', '=', 'mt_keluarga_karyawan_perusahaan.kd_karyawan')
            ->join('dc_status_keluarga', 'dc_status_keluarga.id_dc_stat_keluarga', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_stat_keluarga')
            ->when($keyword, function($query, $keyword){
                $query->where('mt_keluarga_karyawan_perusahaan.nama_keluarga_karyawan', 'LIKE', '%' . $keyword . '%');
        })  ->orderBy('kd_keluarga_karyawan', 'asc')
            ->paginate(5);   
            // $perusahaan = Perusahaan::get_all();
            $agama = Agama::get_all();
            $gender = Gender::get_all();
            $goldarah = GolDarah::get_all();
            $kawin = Kawin::get_all();
            $hubungankeluarga = HubunganKeluarga::get_all();     
            $karyawanperusahaan = KaryawanPerusahaan::get_all();     

        return view ('kepesertaan.keluarga-peserta', [
            'members' => $members,
            'agama' => $agama,
            'gender' => $gender,
            'goldarah' => $goldarah,
            'kawin' => $kawin,
            'hubungankeluarga' => $hubungankeluarga,
            'karyawanperusahaan' => $karyawanperusahaan
        ]);
    }


    public function keluargapeserta(Request $request)
    {
        // $kodeUser = $request->session()->get('user')->kode_user;

        $keyword = $request->keyword;
        $kodeKaryawan = $request->id;
        $searchColumn = $request->searchColumn;

        $this->searchColumn = $request->searchColumn;

        // membershipType==1 <- corporate members
        $members = DB::table('mt_keluarga_karyawan_perusahaan')
        ->select(
            'mt_keluarga_karyawan_perusahaan.kd_keluarga_karyawan as kd_keluarga_karyawan',
            'mt_keluarga_karyawan_perusahaan.nama_keluarga_karyawan as nama_keluarga_karyawan',
            DB::raw('date(mt_keluarga_karyawan_perusahaan.tgl_lahir) as tgl_lahir'),
            'mt_keluarga_karyawan_perusahaan.id_dc_gender as id_dc_gender',
            'mt_keluarga_karyawan_perusahaan.id_dc_agama as id_dc_agama',
            'mt_keluarga_karyawan_perusahaan.id_dc_gol_darah as id_dc_gol_darah',
            'mt_keluarga_karyawan_perusahaan.id_dc_stat_keluarga as id_dc_stat_keluarga',
            'mt_keluarga_karyawan_perusahaan.kd_karyawan as kd_karyawan',
            'mt_keluarga_karyawan_perusahaan.alergi as alergi',
            'dc_status_keluarga.hubungan_keluarga as hubungan_keluarga',
            'mt_kepesertaan.Nama_karyawan as Nama_karyawan',
            'dc_gender.gender as gender',

            )
            // ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_gender')
            // ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_gol_darah')
            ->join('mt_kepesertaan', 'mt_kepesertaan.kd_karyawan', '=', 'mt_keluarga_karyawan_perusahaan.kd_karyawan')
            ->join('dc_status_keluarga', 'dc_status_keluarga.id_dc_stat_keluarga', '=', 'mt_keluarga_karyawan_perusahaan.id_dc_stat_keluarga')
            ->where('mt_keluarga_karyawan_perusahaan.kd_Karyawan', $kodeKaryawan)
            
            ->when($keyword, function($query, $keyword){
                $query->where('mt_keluarga_karyawan_perusahaan.nama_keluarga_karyawan', 'LIKE', '%' . $keyword . '%');
        })  ->orderBy('kd_keluarga_karyawan', 'asc')
            ->paginate(5);   
            // $perusahaan = Perusahaan::get_all();
            // $agama = Agama::get_all();
            // $gender = Gender::get_all();
            // $goldarah = GolDarah::get_all();
            // $kawin = Kawin::get_all();
            // $hubungankeluarga = HubunganKeluarga::get_all();     
            // $karyawanperusahaan = KaryawanPerusahaan::get_all();     

        return response()->json($members);
    }


    // ajax: get member relatives by member id
    public function getMemberRelatives(Request $request)
    {
        $memberId = $request->id;

        $memberRelatives = DB::table('member_relatives')
        ->select(
            'member_relatives.id as mr_id',
            'member_relatives.nama as nama_member',
            'hub_keluarga.hubungan_keluarga as hubungan_keluarga',
            'member_relatives.tanggal_lahir as tanggal_lahir',
            DB::raw('(CASE WHEN member_relatives.jenis_kelamin = "L" THEN "Laki-laki" WHEN member_relatives.jenis_kelamin="P" THEN "Perempuan" ELSE "" END) AS jenis_kelamin'))
        ->leftJoin('hub_keluarga', 'hub_keluarga.id_hub_keluarga', '=', 'member_relatives.id_dd_hub_keluarga') 
        ->where('member_relatives.member_id', $memberId)
        ->orderBy('id_dd_hub_keluarga', 'asc')
        ->get();

        $arr = [];

        if ($memberRelatives)
        {
            $arr['error'] = 0;
            $arr['member_relatives'] = $memberRelatives;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR_INVALID_QUERY';
        }

        return response()->json($arr);
    }


    public function getFamilyRelationships(Request $request)
    {
        $excludedItems = $request->excludedItems;

        if (!empty($excludedItems)){
            $arrItems = explode(",", $excludedItems);
            $familyRelationships = FamilyRelationship::whereNotIn('id_dc_stat_keluarga', $arrItems)->get();
        } else {
            $familyRelationships = FamilyRelationship::all();
        }

        $arr = [];

        if ($familyRelationships)
        {
            $arr['error'] = 0;
            $arr['family_relationships'] = $familyRelationships;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR_INVALID_QUERY';
        }

        return response()->json($arr);        
    }


    public function storeMemberRelative(Request $request)
    {
        $id = $request->id;
        $nama_keluarga = $request->nama_keluarga;
        $id_dc_stat_keluarga = $request->id_dc_stat_keluarga;
        $kd_Karyawan = $request->kd_Karyawan;
        $tgl_lahir = $request->tgl_lahir;
        $alergi = $request->alergi;
        $tgl_lahir = $request->tgl_lahir;
        $id_dc_gol_darah = $request->id_dc_gol_darah;
        $id_dc_gender = $request->id_dc_gender;
        $id_dc_agama = $request->id_dc_agama;

        $memberRelative = new MemberRelative;
        
        // $memberRelative->member_id = $id;
        $memberRelative->Nama_keluarga_karyawan = $nama_keluarga;
        $memberRelative->kd_Karyawan = $kd_Karyawan;
        $memberRelative->id_dc_stat_keluarga = $id_dc_stat_keluarga;
        $memberRelative->tgl_lahir = $tgl_lahir;
        $memberRelative->id_dc_gol_darah = $id_dc_gol_darah;
        $memberRelative->alergi = $alergi;
        $memberRelative->id_dc_gender = $id_dc_gender;
        $memberRelative->id_dc_agama = $id_dc_agama;

        if ($memberRelative->save())
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
    
    public function blank()
    {
        $arr = [
            'error' => 0,
            'message' => 'Data telah disimpan'
        ];
        return response()->json($arr);
    }

    public function store(Request $request)
    {
        $id = $request->frmDialogTambahDataPeserta_id;

        if ($id == 0)
        {
            $member = new Member;
        } else {
            $member = Member::find($id);
        }

        // $noImage = $request->no_image;

        // if ($noImage == 1){
        //     $member->image_file = '';
        // } else {        
        //     $file = $request->file('image_file');
        //     $targetFolder = 'uploads/members';
            
        //     if ($file)
        //     {
        //         Log::debug('Nama file sebelum dipindah: ' . $file);

        //         if ($file->move($targetFolder, $file->getClientOriginalName())){
        //             Log::debug('Nama file asli: ' . $file->getClientOriginalName());
        //             $member->image_file = $file->getClientOriginalName();
        //         } else {
        //             $member->image_file = '';
        //         }
        //     }
        // }        

        // $member->kd_Karyawan =  $request->id;
        $member->Nama_karyawan     = $request->nama_peserta;
        $member->no_ktp            = $request->no_ktp;
        $member->kd_perusahaan     = $request->kd_perusahaan;
        $member->no_polis          = $request->no_polis;
        $member->kd_jabatan        = $request->kd_jabatan;
        $member->nama_jabatan      = $request->nama_jabatan;
        $member->tgl_lahir         = $request->tgl_lahir;
        $member->id_dc_kawin       = $request->id_dc_kawin;
        $member->status            = $request->status;
        $member->id_dc_gender      = $request->id_dc_gender;
        $member->kd_sla            = $request->kd_kls_asuransi;
        $member->id_dc_gol_darah   = $request->id_dc_gol_darah;
        $member->id_dc_agama       = $request->id_dc_agama;
        $member->alergi            = $request->alergi;

        $file = $request->file('foto');
        // dd($branch->alamat_tagihan);
        $targetFolder = 'fotokaryawan';
        if ($file)
        {
            $originalFilename = $file->getClientOriginalName();
            if ($file->move($targetFolder, $originalFilename)){
                $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;

                $member->foto=$filePath;

                if ($member->save())
        {
            $array = [
                'error' => 0,
                'message' => 'Data telah disimpan'
            ];
        } else {
            $array = [
                'error' => 1,
                'message' => 'Data gagal disimpan'
            ];
        }
            } else {
                $error = 1;
                $code = 'FAILED_MOVING_FILE';
            }
        } else {
            $error = 1;
            $code = 'FAILED_UPLOADING_FILE';
        }

        return response()->json($array);
    }


    // public function getMember(Request $request)
    // {
    //     $idmember = $request->id;
    //     $member = Member::find($idmember);
    //     return response()->json($member);
    // }


    public function getFamilyMembers(Request $request)
    {
        $idmember = $request->id;
        $member = Member::find($idmember);
        
        $arr = [];
        
        if ($member)
        {
            $arr['error'] = 0;
            $arr['member'] = $member;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR_INVALID_QUERY';
        }

        return response()->json($arr);
    }        


    public function deleteMember(Request $request)
    {
        $idMember = $request->id;
        $member = Member::find($idMember);
        $arr = [];
        if ($member->delete() > 0)
        {
            $arr['error'] = 0;
            $arr['message'] = 'Data telah sukses dihapus';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal dihapus';
        }
        return response()->json($arr);
    }


    public function uploadMemberData(Request $request, Member $member)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $table = 'mt_kepesertaan';

        $file = $request->file('member_data');
        $targetFolder = 'uploads';
        
        if ($file)
        {
            $originalFilename = $file->getClientOriginalName();
            if ($file->move($targetFolder, $originalFilename)){
                $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;
                
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $reader->setReadDataOnly(false);
                $spreadsheet = $reader->load($filePath);

                $arrSheet = $spreadsheet->getSheet(0)->toArray();
                // $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $hitung = 1;
                unset($arrSheet[0]);

                foreach ($arrSheet as $item) { 
                    $Nama_karyawan   = $item[0];
                    $kd_perusahaan         = $item[1];
                    $kd_jabatan       = $item[2];
                    $timeStamp      = $item[3];
                    $nama_jabatan = $item[4];
                    $id_dc_kawin = $item[5];
                    $id_dc_gender = $item[6];
                    $id_dc_agama = $item[7];
                    $Keterangan = $item[10];
                    $id_dc_gol_darah = $item[8];
                    $alergi = $item[9];

                    // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDate($value);
                    $tgl_lahir = date( "Y-m-d", strtotime($timeStamp));

                    $tableColumns = Common::$tableColumns[$table];

                    if ($member->isExist($tableColumns) == false){
                        DB::table($table)->insert($tableColumns);
                    }

                    DB::table($table)->insert([
                        'Nama_karyawan' => $Nama_karyawan,
                        'kd_perusahaan' => $kd_perusahaan,
                        'kd_jabatan' => $kd_jabatan,
                        'tgl_lahir' => $tgl_lahir,
                        'nama_jabatan' => $nama_jabatan,
                        'id_dc_kawin' => $id_dc_kawin,
                        'id_dc_gender' => $id_dc_gender,
                        'id_dc_agama' => $id_dc_agama,
                        'Keterangan' => $Keterangan,
                        'id_dc_gol_darah' => $id_dc_gol_darah,
                        'alergi' => $alergi
                    ]);
    
                    $hitung++;
                }

                $error = 0;
                $code = 'OK';

            } else {
                $error = 1;
                $code = 'FAILED_MOVING_FILE';
            }
        } else {
            $error = 1;
            $code = 'FAILED_UPLOADING_FILE';
        }
        
        $arr = [];

        $arr['error'] = $error;
        $arr['code'] = $code;

        return response()->json($arr);
    }


    // jumlah peserta perusahaan
    public function ajaxMembers_corporateCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $count = DB::table($this->table)
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', $this->table . '.kd_perusahaan')
            ->where('id_dc_kawin', [2,3,4])
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->count();

        $arr = [];

        if ($count){
            $arr['error'] = 0;
            $arr['count'] = $count;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }


    // jumlah peserta umum
    public function ajaxMembers_personalCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $count = DB::table($this->table)
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', $this->table . '.kd_perusahaan')
            ->where('id_dc_kawin', 1)
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->count();

        $arr = [];

        if ($count){
            $arr['error'] = 0;
            $arr['count'] = $count;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }
}
