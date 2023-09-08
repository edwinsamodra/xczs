<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asuransi;
use App\Models\Member;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommonController;



class KepesertaanController extends Controller
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


    public function index(Request $request)

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
        return view('kepesertaan.index-peserta', $data);
    }

    
    public function getJKP(Request $request, Member $member){

        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_perusahaan($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_kepala_keluarga($this->kodeUser, $this->keyword, $this->offset, $this->limit);

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
    public function getKK(Request $request, Member $member){

        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_kepala_keluarga($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members = $member->get_peserta_kepala_keluarga($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
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
    public function getistri(Request $request, Member $member){

        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_istri($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members = $member->get_peserta_istri($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
            $arr['error'] = 0;
            $arr['numrows'] = $this->numRecords;
            $arr['numPages'] = $this->numPages;
            $arr['page'] = $this->page;
            $arr['limit']  = $this->limit;


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
    public function getanak(Request $request, Member $member){

        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_anak($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members = $member->get_peserta_anak($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
            $arr['error'] = 0;
            $arr['numrows'] = $this->numRecords;
            $arr['numPages'] = $this->numPages;
            $arr['page'] = $this->page;
            $arr['limit']  = $this->limit;


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
    public function getlajang(Request $request, Member $member){

        $this->kodeUser = $request->session()->get('user')->kode_user;

        $this->numRecords = $member->get_num_peserta_lajang($this->kodeUser, $this->keyword);

        $this->offset = ($this->page-1) * $this->limit; 
        $this->numPages = ceil($this->numRecords / $this->limit);

        // $members = $member->get_peserta_perusahaan($this->kodeUser, $this->keyword, $this->offset, $this->limit);

        $arr = [];
        if ($members = $member->get_peserta_lajang($this->kodeUser, $this->keyword, $this->offset, $this->limit)){
            $arr['error'] = 0;
            $arr['numrows'] = $this->numRecords;
            $arr['numPages'] = $this->numPages;
            $arr['page'] = $this->page;
            $arr['limit']  = $this->limit;


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
    public function pendaftaranPeserta()

    {
        return view('kepesertaan.pendaftaranPeserta');
    }
        public function keluargaPeserta()
    {
        return view ('kepesertaan.keluarga-peserta');
    }
}