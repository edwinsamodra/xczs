<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Branch;
use App\Models\Member;
use App\Models\Asuransi;

use App\Http\Controllers\CommonController;

class ProfileController extends Controller
{
    private $kodeUser;
    private $keyword='';
    private $limit=5;
    private $page;
    private $offset;
    private $numPages;
    private $numRecords;
    private $prev;
    private $next;

    public function __construct(Request $request)
    {        
        if ($request->has('keyword')) {
            $this->keyword  = $request->keyword;
        }

        if ($request->has('limit')) {
            $this->limit = $request->limit;
        }

        if ($request->has('page'))
        {
            $this->page = $request->page;

            if ($this->page <= 0) $this->page = 1;
        } else {
            $this->page = 1;
        }        
    }


    public function getCurrentProfile(Request $request)
    {
        $this->kodeUser = $request->session()->get('user')->kode_user;

        $profile = Asuransi::select(
                'id_asuransi',
                'kode_asuransi',

                'nama_asuransi',
                'alamat',
                'kota',
                'kodepos',
                'telpon1',
                'telpon2',
                'kontakperson',
                'fax',
                'kontakperson2',
                'hp',
                'nomer_nib',
                'jenis_perusahaan',
                'kode_group',
                'alamat_tagihan',
                'jenis_kerjasama',
                'logo_asuransi',
                'no_surat_kontrak',
                'pimpinan',
                'url_asuransi',

                'dc_propinsi.nama_propinsi',
                'dc_propinsi.id_dc_propinsi',
                                
                'dc_kota.nama_kota as nama_kota',
                'dc_kota.id_dc_kota AS id_dc_kota',

                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kecamatan.id_dc_kecamatan',

                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.id_dc_kelurahan AS id_dc_kelurahan',

                DB::raw('date(tgl_kontrak) as tgl_kontrak'),
                DB::raw('date(tgl_expired) as tgl_expired'),
                DB::raw('date(tgl_NIB) as tgl_NIB'),                
                DB::raw('date(tgl_daftar) as tgl_daftar'))
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->join('dc_propinsi', 'dc_kota.id_dc_propinsi', '=', 'dc_propinsi.id_dc_propinsi')
            ->where('kode_asuransi', $this->kodeUser)->first();

        $arr = [];

        if ($profile){
            $longFormat = true;
            $withDate = true;

            $profile->tgl_kontrak_full  = CommonController::now($longFormat, $withDate, $profile->tgl_kontrak);
            $profile->tgl_expired_full  = CommonController::now($longFormat, $withDate, $profile->tgl_expired);
            $profile->tgl_NIB_full      = CommonController::now($longFormat, $withDate, $profile->tgl_NIB);
            $profile->tgl_daftar_full   = CommonController::now($longFormat, $withDate, $profile->tgl_daftar);

            $arr['error'] = 0;
            $arr['profile'] = $profile;

        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }


    public function getBranches(Request $request, Branch $branch)
    {
        $this->kodeUser = $request->session()->get('user')->kode_user;
        
        $this->numRecords = $branch->get_num_branches($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        $arr = [];

        if ($branches = $branch->get_branches($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
            $arr['error']       = 0;
            $arr['numrows']     = $this->numRecords;
            $arr['numPages']    = $this->numPages;
            $arr['page']        = $this->page;
            $arr['limit']       = $this->limit;

            $content = '<table class="table table-sm" id="tblBranches">
            <thead>
                <tr>
                    <td style="color: #697a8d;font-weight: bold;">No</td>
                    <td style="color: #697a8d;font-weight: bold;">Nama Cabang</td>
                    <td style="color: #697a8d;font-weight: bold;">Kepala Cabang</td>
                    <td style="color: #697a8d;font-weight: bold;">Kode Pos</td>
                    <td style="color: #697a8d;font-weight: bold;">Kelurahan</td>
                    <td style="color: #697a8d;font-weight: bold;">Kecamatan</td>
                    <td style="color: #697a8d;font-weight: bold;">Kota</td>
                </tr>
            </thead>';
            
            foreach($branches as $branch){
                $content .= '<tr><td>' . $this->offset+1 . '</td><td>' .
                    $branch->nama_cabang . '</td><td>' . 
                    $branch->kepala_cabang . '</td><td>' . 
                    $branch->kode_pos . '</td><td>' . 
                    $branch->nama_kelurahan . '</td><td>' . 
                    $branch->nama_kecamatan . '</td><td>' . 
                    $branch->nama_kota . '</td></tr>';
                $this->offset++;
            }

            $content .= '</table>';

            $arr['content'] = $content;

            $url = '';

            // 2023-01-07
            $pagination = CommonController::getPagination($this->page, $this->numPages, $url);

            $arr['pagination'] = $pagination;

        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR:INVALID_QUERY';
        }
        
        return response()->json($arr);
    }


    public function getPesertaUmum(Request $request, Member $member)
    {
        $this->kodeUser = $request->session()->get('user')->kode_user;

        $numPesertaUmum = $member->get_num_peserta_umum($this->kodeUser, $this->keyword);

        $offset = ($this->page-1) * $this->limit; 
        $numPages = ceil($numPesertaUmum / $this->limit);

        $members = $member->get_peserta_umum($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members){
            $arr['error'] = 0;
            $arr['numrows'] = $this->numRecords;
            $arr['numPages'] = $this->numPages;
            $arr['page'] = $this->page;

            $content = '<table class="table table-sm" id="tblBranches">
            <thead>
                <tr>
                <td style="color: #697a8d;font-weight: bold;">No</td>
                <td style="color: #697a8d;font-weight: bold;">Nama</td>
                <td style="color: #697a8d;font-weight: bold;">Jabatan</td>
                <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                <td style="color: #697a8d;font-weight: bold;">Status Perkawinan</td>
                <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                <td style="color: #697a8d;font-weight: bold;">Agama</td>
                <td style="color: #697a8d;font-weight: bold;">Gol Darah</td>
                <td style="color: #697a8d;font-weight: bold;">Alergi</td>
                </tr>
            </thead>';

            foreach($members as $member){
                $content .= '<tr><td>' . $offset+1 . '</td><td>' . 
                $member->Nama_Karyawan . '</td><td>' .    
                $member->nama_jabatan . '</td><td>' .    
                $member->tgl_lahir . '</td><td>' .
                $member->kawin . '</td><td>' . 
                $member->gender . '</td><td>' . 
                $member->agama . '</td><td>' . 
                $member->golongan_darah . '</td><td>' . 
                $member->alergi . '</td><tr>';
                $offset++;
               
            }

            $content .= '</table>';

            $arr['content'] = $content;

            // 2023-01-07
            $pagination = CommonController::getPagination($this->page, $this->numPages, '');  

            $arr['pagination'] = $pagination;

        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR:INVALID_QUERY';
        }
        
        return response()->json($arr);
    }


public function getPesertaPerusahaan(Request $request, Member $member)
    {
        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_perusahaan($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
            $arr['error'] = 0;
            $arr['numrows'] = $this->numRecords;
            $arr['numPages'] = $this->numPages;
            $arr['page'] = $this->page;
            $arr['limit']       = $this->limit;


            $content = '<table class="table table-sm" id="tblBranches">
            <thead>
                <tr>
                <td style="color: #697a8d;font-weight: bold;">No</td>
                <td style="color: #697a8d;font-weight: bold;">Nama</td>
                <td style="color: #697a8d;font-weight: bold;">Perusahaan</td>
                <td style="color: #697a8d;font-weight: bold;">Jabatan</td>
                <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                <td style="color: #697a8d;font-weight: bold;">Status Perkawinan</td>
                <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                <td style="color: #697a8d;font-weight: bold;">Agama</td>
                <td style="color: #697a8d;font-weight: bold;">Gol Darah</td>
                <td style="color: #697a8d;font-weight: bold;">Alergi</td>
                </tr>
            </thead>';

            foreach($members as $member){
                $content .= '<tr><td>' . $this->offset+1 . '</td><td>' . 
                $member->Nama_Karyawan . '</td><td>' .    
                $member->nama_perusahaan . '</td><td>' .    
                $member->nama_jabatan . '</td><td>' .    
                $member->tgl_lahir . '</td><td>' .
                $member->kawin . '</td><td>' . 
                $member->gender . '</td><td>' . 
                $member->agama . '</td><td>' . 
                $member->golongan_darah . '</td><td>' . 
                $member->alergi . '</td><tr>';
                $this->offset++;
               
            }

            $content .= '</table>';

            $arr['content'] = $content;
            $url = '';


            // 2023-01-07
            $pagination = CommonController::getPagination($this->page, $this->numPages, $url);  

            $arr['pagination'] = $pagination;

        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR:INVALID_QUERY';
        }
        
        return response()->json($arr);
    }    

    public function getCompanies(Request $request){
        $kodeUser = $request->session()->get('user')->kode_user;
    
        $keyword = $request->keyword;         
    
        $companiesCount = DB::table('mt_perusahaan')
        ->select(DB::raw('COUNT(*) AS total'))
        ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_perusahaan.nama_pimpinan_perusahaan', 'like', '%' . $keyword . '%');
            })  
        ->get();
    
    
        $numRecords = $companiesCount[0]->total;
    
        if ($request->has('limit')) {
            $limit = $request->limit;
        } else {
            $limit = 5;
        }
    
        if ($request->has('page'))
        {
            $page = $request->page;
    
            if ($page <= 0) $page = 1;
        } else {
            $page = 1;
        }
    
        $offset = ($page-1) * $limit; 
        $numPages = ceil($numRecords / $limit);
    
        $prev = $page - 1;
        $next = $page + 1;           
    
        $companies = DB::table('mt_perusahaan')
        ->select(
            'mt_perusahaan.id_perusahaan as company_id',
            'mt_perusahaan.kode_perusahaan as kode_perusahaan',
            'mt_perusahaan.nama_perusahaan as nama_perusahaan',
            'mt_perusahaan.nama_pimpinan_perusahaan as nama_pimpinan_perusahaan',
            'dc_kelurahan.nama_kelurahan as nama_kelurahan',
            'dc_kelurahan.kode_pos as kode_pos',
            'dc_kecamatan.nama_kecamatan as nama_kecamatan',
            'dc_kota.nama_kota as nama_kota'
        )->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_perusahaan.id_dc_kelurahan')
        ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
        ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
        ->where('mt_perusahaan.kode_asuransi', $kodeUser)
        ->when($keyword, function($query, $keyword){
            $query->where('mt_perusahaan.nama_pimpinan_perusahaan', 'like', '%' . $keyword . '%');
        })
            ->orderBy('id_perusahaan', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    
    
            $arr = [];
        if ($companies){
            $arr['error'] = 0;
            $arr['numrows'] = $numRecords;
            $arr['numPages'] = $numPages;
            $arr['limit'] = $limit;
            $arr['page'] = $page;
    
            $content = '<table class="table table-sm" id="tblCompanies">
            <thead>
                <tr>
                <td style="color: #697a8d;font-weight: bold;">No</td>
                <td style="color: #697a8d;font-weight: bold;">Nama Cabang Perusahaan</td>
                <td style="color: #697a8d;font-weight: bold;">Nama Pimpinan Cabang</td>
                <td style="color: #697a8d;font-weight: bold;">Kode Pos</td>
                <td style="color: #697a8d;font-weight: bold;">Kelurahan</td>
                <td style="color: #697a8d;font-weight: bold;">Kecamatan</td>
                <td style="color: #697a8d;font-weight: bold;">Kota</td>
                </tr>
            </thead>';

            foreach($companies as $companie){
                $content .= '<tr><td>' . $offset+1 . '</td><td>' . 
                    $companie->nama_perusahaan .'</td><td>' .
                    $companie->nama_pimpinan_perusahaan .'</td><td>' .
                    $companie->kode_pos . '</td><td>' . 
                    $companie->nama_kelurahan . '</td><td>' . 
                    $companie->nama_kecamatan . '</td><td>' . 
                    $companie->nama_kota . '</td></tr>';
                $offset++;
            }

            $content .= '</table>';
            $arr['content'] = $content;

            // 2023-01-07
            $pagination = CommonController::getPagination($page, $numPages, '');            

            $arr['pagination'] = $pagination;    
    
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR:INVALID_QUERY';
        }
        
        return response()->json($arr);
    }


    public function getProdukRitel(Request $request){
        $kodeUser = $request->session()->get('user')->kode_user;

        $keyword = $request->keyword;         
    
        $produkritelCount = DB::table('mt_paket_asuransi')
        ->select(DB::raw('COUNT(*) AS total'))
        
        ->where('mt_paket_asuransi.kd_asuransi', $kodeUser)
        
        ->when($keyword, function($query, $keyword){
            $query->where('mt_paket_asuransi.nama_paket_asuransi', 'like', '%' . $keyword . '%');
        })   
        ->get();
    
        $numRecords = $produkritelCount[0]->total;
    
        if ($request->has('limit')) {
            $limit = $request->limit;
        } else {
            $limit = 5;
        }
    
        if ($request->has('page'))
        {
            $page = $request->page;
    
            if ($page <= 0) $page = 1;
        } else {
            $page = 1;
        }
    
        $offset = ($page-1) * $limit; 
        $numPages = ceil($numRecords / $limit);
    
        $prev = $page - 1;
        $next = $page + 1;           
    
        $produkritel = DB::table('mt_paket_asuransi')
        ->select(
            'mt_paket_asuransi.kl_paket as product_id',
            'mt_paket_asuransi.nama_paket_asuransi as nama_produk')
        ->where('mt_paket_asuransi.kd_asuransi', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_paket_asuransi.nama_paket_asuransi', 'like', '%' . $keyword . '%');
            }) 
            ->orderBy('kl_paket', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    
    
            $arr = [];
        if ($produkritel){
            $arr['error'] = 0;
            $arr['numrows'] = $numRecords;
            $arr['numPages'] = $numPages;
            $arr['page'] = $page;
    
            $content = '<table class="table table-sm" id="tblCompanies">
            <thead>
                <tr>
                <td style="color: #697a8d;font-weight: bold;">No</td>
                <td style="color: #697a8d;font-weight: bold;">Nama Produk</td>
                </tr>
            </thead>';
    
            
            foreach($produkritel as $produkri){
                $content .= '<tr><td>' . $offset+1 . '</td><td>' . 
                    $produkri->nama_produk .'</td></tr>'   ;
                $offset++;
            }
            $content .= '</table>';
    
            $arr['content'] = $content;
    
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'ERROR:INVALID_QUERY';
        }
        
        return response()->json($arr);
    }
    
}
