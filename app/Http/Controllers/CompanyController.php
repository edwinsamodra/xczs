<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\CommonController;

// use Yajra\Datatables\Datatables;

use App\Models\{Company, CabangMitra, Kelurahan, Perusahaan, PaketAsuransi, PaketPerusahaan, PaketPerusahaanDetail};


/* COMPANY
nama_perusahaan
nama_cabang
periode
alamat
nomor_telepon
email
nama_direktur
nama_contact_person
telp_contact_person
nama_produk
*/

class CompanyController extends Controller
{
    private $table = 'mt_perusahaan';

    //
    public function index(Request $request)
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
            ->when($keyword, function ($query, $keyword) {
                $query->where('mt_perusahaan.nama_perusahaan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_perusahaan', 'desc')
            ->paginate(5);


        $paket = PaketAsuransi::get_all();
        return view('hiss/company/index', [
            'companies' => $companies,
            'keyword' => $keyword,
            'paket' => $paket,


        ]);
    }

    public function cabang_perusahaan(Request $request)
    {
        // $kodeUser = $request->session()->get('user')->kode_user;
        $kode_perusahaan = $request->id;
        $keyword = $request->keyword;


        $branchcompanies = DB::table('mt_cabang_perusahaan')
            ->select(
                'mt_cabang_perusahaan.id_cabang_perusahaan as id_cabang_perusahaan',
                'mt_cabang_perusahaan.kode_perusahaan as kode_perusahaan',
                'mt_cabang_perusahaan.nama_cabang_perusahaan as nama_cabang_perusahaan',
                'mt_cabang_perusahaan.nama_pimpinan_cabang as nama_pimpinan_cabang',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                // 'mt_jatah_klas.nama_jabatan as nama_jabatan',
                // 'mt_kelas.nama_layanan as nama_layanan',
            )
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_cabang_perusahaan.kode_perusahaan')
            // ->join('mt_jatah_klas', 'mt_jatah_klas.kd_perusahaan', '=', 'mt_perusahaan.kode_perusahaan')
            // ->join('mt_kelas', 'mt_kelas.kl_klas', '=', 'mt_jatah_klas.kd_kls_asuransi')
            ->where('mt_cabang_perusahaan.kode_perusahaan', $kode_perusahaan)
            ->when($keyword, function ($query, $keyword) {
                $query->where('mt_cabang_perusahaan.nama_cabang_perusahaan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_cabang_perusahaan', 'asc')
            ->paginate(5);

            // dd($branchcompanies);
        $mtperusahaan = DB::table('mt_perusahaan')
            ->select(
                'mt_perusahaan.kode_perusahaan as kode_perusahaan',
                'nama_perusahaan as nama_perusahaan',
                'nama_pimpinan_perusahaan as nama_pimpinan_perusahaan',
                'alamat as alamat',
                'kota as kota',
                'kodepos as kodepos',
                'telpon1 as telpon1',
                'telpon2 as telpon2',
                'kontakperson as kontakperson1',
                'kontakperson2 as kontakperson2',
                'hp as hp',
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
                'no_kontrak as no_kontrak',
                'tgl_kontrak as tgl_kontrak',

            )
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
           
            ->where('mt_perusahaan.kode_perusahaan', $kode_perusahaan)

            ->get()[0];

            $jatahkelas = DB::table('mt_jatah_klas')
            ->select(
                
                'mt_jatah_klas.nama_jabatan as nama_jabatan',
                'mt_kelas.nama_layanan as nama_layanan',
            )
            // ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_jatah_klas.mt_jatah_klas')
            ->join('mt_kelas', 'mt_kelas.kl_klas', '=', 'mt_jatah_klas.kd_kls_asuransi')
            ->where('mt_jatah_klas.kd_perusahaan', $kode_perusahaan)
           
            ->orderBy('mt_jatah_klas.kd_jabatan', 'asc')
            ->get();



            $packages = Company::getCompanyInsurancePackage($kode_perusahaan);

            $perusahaan = Perusahaan::get_all();
            // dd($packages);
                

        return view('hiss/company/indexcabangperusahaan', [
            'branchcompanies' => $branchcompanies,
            'jatahkelas' => $jatahkelas,
            'keyword' => $keyword,
            'perusahaan' => $perusahaan,
            'kode_perusahaan' => $kode_perusahaan,
            'mtperusahaan' => $mtperusahaan,
            'packages' => $packages
        ]);
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
        $idPerusahaan = $request->frmDataPerusahaan_id;
        $kodeUser = $request->session()->get('user')->kode_user;

        if ($idPerusahaan == 0) {
            $company = new Company;
        } else {
            $company = Company::find($idPerusahaan);
        }

        $kodePerusahaan = substr($request->kode_perusahaan, 0, 6);

        $company->nama_perusahaan           = $request->nama_perusahaan;
        $company->kode_perusahaan           = $kodePerusahaan;
        $company->kode_asuransi             = $kodeUser;
        $company->nama_pimpinan_perusahaan  = $request->nama_pimpinan_perusahaan;
        $company->id_dc_kelurahan           = $request->id_dc_kelurahan;
        $company->kodepos                   = $request->kodepos;
        $company->alamat                    = $request->alamat;
        $company->kota                      = $request->kota;
        $company->telpon1                   = $request->telpon1;
        $company->telpon2                   = $request->telpon2;
        $company->kontakperson              = $request->kontakperson;
        $company->kontakperson2             = $request->kontakperson2;
        $company->hp                        = $request->hp;
        $company->tgl_daftar                = $request->tgl_daftar;
        $company->no_kontrak                = $request->no_kontrak;
        $company->tgl_kontrak               = $request->tgl_kontrak;
        $company->tgl_nib                   = $request->tgl_nib;
        $company->alamat_tagihan            = $request->alamat_tagihan;
        $company->jenis_kerjasama           = $request->jenis_kerjasama;

           

        $file = $request->file('logo');
        // dd($branch->alamat_tagihan);
        $targetFolder = 'uploads/company/images/logo/';
        if ($file) {
            $originalFilename = $file->getClientOriginalName();

            if ($file->move($targetFolder, $originalFilename)) {

                // succeed moving file
                $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;

                $company->logo_perusahaan=$filePath;

                if ($company->save())
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
                
            } else {
                $arr = [
                    'error' => 0,
                    'message' => 'FAILED_MOVING_FILE'
                ];

            }
        } else {
            $arr = [
                'error' => 0,
                'message' => 'FAILED_UPLOADING_FILE'
            ];

        }

              

        return response()->json($arr);
    }


    public function getCompany(Request $request)
    {
        $idPerusahaan = $request->id;
        $company = Company::find($idPerusahaan);

        return response()->json($company);
    }


    public function deleteCompany(Request $request)
    {
        $idPerusahaan = $request->id;
        $company = Company::find($idPerusahaan);

        $arr = [];

        if ($company->delete() > 0) {
            $arr['error'] = 0;
            $arr['message'] = 'Data telah sukses dihapus';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal dihapus';
        }

        return response()->json($arr);
    }

    //cabang mitra

    public function getCabangMitra(Request $request)
    {
        $idCabangPerusahaan = $request->id;
        $cabangmitra = CabangMitra::find($idCabangPerusahaan);

        return response()->json($cabangmitra);
    }

    public function storecabangmitra(Request $request)
    {
        $idPerusahaan = $request->frmDataCabangPerusahaan_id;
        // $kodeUser = $request->session()->get('user')->kode_user;


        if ($idPerusahaan == 0) {
            $cabangmitra = new CabangMitra;
        } else {
            $cabangmitra = CabangMitra::find($idPerusahaan);
        }

        $cabangmitra->nama_cabang_perusahaan    = $request->nama_cabang_perusahaan;
        $cabangmitra->kode_perusahaan           = $request->kode_perusahaan;
        $cabangmitra->kode_asuransi             = $request->kode_asuransi;
        $cabangmitra->nama_pimpinan_cabang      = $request->nama_pimpinan_cabang;
        $cabangmitra->id_dc_kelurahan           = $request->id_dc_kelurahan;
        $cabangmitra->alamat                    = $request->alamat;
        $cabangmitra->kota                      = $request->kota;
        $cabangmitra->kodepos                   = $request->kodepos;
        $cabangmitra->telpon1                   = $request->telpon1;
        $cabangmitra->telpon2                   = $request->telpon2;
        $cabangmitra->kontakperson              = $request->kontakperson;
        $cabangmitra->kontakperson2             = $request->kontakperson2;
        $cabangmitra->hp                        = $request->hp;
        $cabangmitra->fax                       = $request->fax;
        $cabangmitra->tgl_daftar                = $request->tgl_daftar;
        $cabangmitra->tgl_nib                   = $request->tgl_nib;
        $cabangmitra->nomer_nib                 = $request->nomer_nib;
        $cabangmitra->jenis_perusahaan          = $request->jenis_perusahaan;
        $cabangmitra->kode_group                = $request->kode_group;
        $cabangmitra->alamat_tagihan            = $request->alamat_tagihan;
        $cabangmitra->jenis_kerjasama           = $request->jenis_kerjasama;

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                // $file = $request->file('logo');
                $targetFolder = 'uploads/images/logo/companies';
                $logoPath = $request->logo->store($targetFolder);
                $cabangmitra->logo_perusahaan = $logoPath;
            }
        }

        $arr = [];

        if ($cabangmitra->save()) {
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


    public function deletemitracabang(Request $request)
    {
        $idPerusahaan = $request->id;
        $cabangmitra = CabangMitra::find($idPerusahaan);

        $arr = [];

        if ($cabangmitra->delete() > 0) {
            $arr['error'] = 0;
            $arr['message'] = 'Data telah sukses dihapus';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal dihapus';
        }

        return response()->json($arr);
    }


    public function ajaxCompaniesCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $count = Company::where('kode_asuransi', $kodeUser)->count();

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


    /**
     * Get list of insurance packages that the  company have (ajax)
     * 
     * @param string $companyCode Kode Perusahaan
     * 
     * @return json
     */
    public function getCompanyInsurancePackages(Request $request)
    {
        $companyCode = $request->companycode;

        $packages = DB::table('tc_paket_asuransi_det')
            ->select(
                'mt_paket_asuransi.kl_paket as kl_paket',
                'mt_paket_asuransi.nama_paket_asuransi as nama_paket_asuransi')
            ->join('tc_paket_asuransi', 'tc_paket_asuransi.id_tc_paket_asuransi', '=', 'tc_paket_asuransi_det.id_tc_paket_asuransi')
            ->join('mt_paket_asuransi', 'mt_paket_asuransi.kl_paket', '=', 'tc_paket_asuransi_det.kl_paket')
            ->where('tc_paket_asuransi.kode_perusahaan', $companyCode)->get();

        $arr = [];

        if ($packages){
            $arr['error'] = 0;
            $arr['content'] = $packages;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }
}
