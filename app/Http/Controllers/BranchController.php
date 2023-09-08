<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

// use Yajra\Datatables\Datatables;

use App\Models\{Asuransi, Branch, Propinsi, Kota, Kecamatan, Kelurahan};


// CABANG

class BranchController extends Controller
{
    //
    public $table = 'mt_cabang_asuransi';

    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $keyword = $request->keyword;

        $branches = DB::table('mt_cabang_asuransi')
            ->select(
                'mt_cabang_asuransi.id_cabang_asuransi as branch_id',
                'mt_cabang_asuransi.logo_asuransi as logo',
                'mt_cabang_asuransi.nama_pimpinan_cabang as kepala_cabang',
                'mt_cabang_asuransi.nama_cabang_asuransi as nama_cabang',
                'mt_cabang_asuransi.alamat as alamat',
                'mt_cabang_asuransi.kontakperson as contact_person',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota',
                'mt_asuransi.nama_asuransi as nama_asuransi')
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->join('mt_asuransi', 'mt_asuransi.kode_asuransi', '=', 'mt_cabang_asuransi.kode_asuransi')
            ->where('mt_cabang_asuransi.kode_asuransi', $kodeUser)
            ->when($keyword, function ($query, $keyword) {
                $query->where('mt_cabang_asuransi.nama_cabang_asuransi', 'like', '%' . $keyword . '%');
            })
            ->orderBy('id_cabang_asuransi', 'desc')
            ->paginate(5);

        $kota = Kota::get_all();
        $kelurahan = Kelurahan::get_all();
        $asuransi = Asuransi::get_all();
        // $kecamatan = Kecamatan::get_all();
        return view('hiss/branch/index', [
            'branches' => $branches,
            // 'kota' => $kota,
            'kelurahan' => $kelurahan,
            'asuransi' => $asuransi,
            // 'kecamatan' => $kecamatan,
            'keyword' => $keyword

        ]);
    }



    public function detail(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $id = $request->id;

        $branches = DB::table('mt_cabang_asuransi')
            ->select(
                'mt_cabang_asuransi.id_cabang_asuransi as branch_id',                
                'mt_cabang_asuransi.nama_pimpinan_cabang as kepala_cabang',
                'mt_cabang_asuransi.nama_cabang_asuransi as nama_cabang',
                'mt_cabang_asuransi.alamat as alamat',
                'mt_cabang_asuransi.id_dc_kelurahan as id_dc_kelurahan',
                'mt_cabang_asuransi.kontakperson as kontakperson',
                'mt_cabang_asuransi.kontakperson2 as kontakperson2',
//                'mt_cabang_asuransi.kota as kota',
                'mt_cabang_asuransi.telpon1 as nomor_telepon_1',
                'mt_cabang_asuransi.telpon2 as nomor_telepon_2',
                // 'mt_cabang_asuransi.fax as fax',
                'mt_cabang_asuransi.hp as nomor_hp',
                'mt_cabang_asuransi.alamat_tagihan as alamat_tagihan',
                'mt_asuransi.alamat AS alamat_perusahaan_induk',
                'mt_asuransi.fax AS fax',
                'mt_asuransi.logo_asuransi as logo_asuransi',                
                'mt_asuransi.nomer_nib as nomer_nib',
                DB::raw('date(mt_asuransi.tgl_nib) as tgl_nib'),
                DB::raw('date(mt_asuransi.tgl_daftar) as tgl_daftar'),
                'mt_asuransi.jenis_perusahaan as jenis_perusahaan',
                'mt_asuransi.kode_group as kode_group',
                'mt_asuransi.jenis_kerjasama as jenis_kerjasama',                
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota',
                'mt_cabang_asuransi.kode_asuransi as kode_asuransi')
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->join('mt_asuransi', 'mt_asuransi.kode_asuransi', '=', 'mt_cabang_asuransi.kode_asuransi')
            ->where('mt_cabang_asuransi.id_cabang_asuransi', $id)
            ->first();

        // $kota = Kota::get_all();
        // $kelurahan = Kelurahan::get_all();
        // $asuransi = Asuransi::get_all();

        return response()->json($branches);
    }

    public function profileasuransi(Request $request)
    {
        $kode_user = $request->session()->get('user')['kode_user'];
        $profile = Asuransi::where('kode_asuransi', $kode_user)->get()[0];



        return response()->json($profile);
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
        $idBranch = $request->frmDataCabang_id;
        $kodeUser = $request->session()->get('user')->kode_user;

        if ($idBranch == 0) {
            $branch = new Branch;
        } else {
            $branch = Branch::find($idBranch);
        }

        $branch->nama_cabang_asuransi = $request->nama_cabang_asuransi;
        $branch->kode_asuransi = $kodeUser;
        $branch->nama_pimpinan_cabang    = $request->nama_pimpinan_cabang;
        $branch->id_dc_kelurahan     = $request->id_dc_kelurahan;
        $branch->alamat     = $request->alamat;
        
        // $branch->kota     = $request->kota;
        
        $branch->kodepos     = $request->kodepos;
        $branch->telpon1     = $request->telpon1;
        $branch->telpon2     = $request->telpon2;
        $branch->kontakperson     = $request->kontakperson;
        $branch->kontakperson2     = $request->kontakperson2;
        $branch->hp     = $request->hp;
        
        // $branch->fax     = $request->fax;
        // $branch->tgl_daftar     = $request->tgl_daftar;
        // $branch->tgl_nib     = $request->tgl_nib;
        // $branch->nomer_nib     = $request->nomer_nib;
        // $branch->jenis_asuransi     = $request->jenis_asuransi;
        // $branch->kode_group     = $request->kode_group;
        
        $branch->alamat_tagihan     = $request->alamat_tagihan;
        
        // $branch->jenis_kerjasama = $request->jenis_kerjasama;
        // $file = $request->file('logo_asuransi');
        // dd($branch->alamat_tagihan);
        // $targetFolder = 'cabangperusahaan';
        // if ($file) {
        //     $originalFilename = $file->getClientOriginalName();
        //     if ($file->move($targetFolder, $originalFilename)) {
        //         $filePath = $targetFolder . DIRECTORY_SEPARATOR  . $originalFilename;

        //         $branch->logo_asuransi = $filePath;

        //         if ($branch->save()) {
        //             $array = [
        //                 'error' => 0,
        //                 'message' => 'Data telah disimpan'
        //             ];
        //         } else {
        //             $array = [
        //                 'error' => 1,
        //                 'message' => 'Data gagal disimpan'
        //             ];
        //         }
        //     } else {
        //         $error = 1;
        //         $code = 'FAILED_MOVING_FILE';
        //     }
        // } else {
        //     $error = 1;
        //     $code = 'FAILED_UPLOADING_FILE';
        // }

        $arr = [];

        if ($branch->save()) {
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


    public function getBranch(Request $request)
    {
        $idBranch = $request->id;
        // dd($idBranch);

        $branch = Branch::select(
                'kode_asuransi',
                'nama_cabang_asuransi',
                'nama_pimpinan_cabang',
                'alamat',
                'kode_pos', 
                'dc_kelurahan.id_dc_kelurahan',
                'dc_kelurahan.nama_kelurahan',
                'dc_kecamatan.id_dc_kecamatan',
                'dc_kecamatan.nama_kecamatan',
                'dc_kota.id_dc_kota',
                'dc_kota.nama_kota',
                'telpon1',
                'telpon2',
                'kontakperson',
                'kontakperson2',
                'hp',
                'alamat_tagihan')
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('id_cabang_asuransi', $idBranch)
            ->first();

        return response()->json($branch);
    }


    public function deleteBranch(Request $request)
    {
        $idBranch = $request->id;
        $branch = Branch::find($idBranch);
        $arr = [];
        if ($branch->delete() > 0) {
            $arr['error'] = 0;
            $arr['message'] = 'Data telah sukses dihapus';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal dihapus';
        }
        return response()->json($arr);
    }


    public function ajaxBranchesCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        
        $count = DB::table($this->table)
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->join('mt_asuransi', 'mt_asuransi.kode_asuransi', '=', 'mt_cabang_asuransi.kode_asuransi')
            ->where($this->table . '.kode_asuransi', $kodeUser)            
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
