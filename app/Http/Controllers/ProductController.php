<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

// use Yajra\Datatables\Datatables;


use App\Models\{Product, Kota, Kecamatan, Kelurahan, Asuransi};


// PRODUK

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $products = DB::table('mt_paket_asuransi')
            ->select (
                'mt_paket_asuransi.kl_paket as product_id',
                'mt_paket_asuransi.nama_paket_asuransi as nama_produk')
            ->where('mt_paket_asuransi.kd_asuransi', $kodeUser)
            
            // ->distinct('nama_paket_asuransi')
            ->orderBy('kl_paket', 'asc')
            ->paginate(10);
        // $tarif = tarif::get();
        $profile = Asuransi::where('kode_asuransi', $kodeUser)->get()[0];
        
        $data = [
            'profile' => $profile
        ];
        return view('hiss/product/index',[
            'products' => $products,
            'profile' => $profile,
        
            // 'tarif'=>$tarif
        ]);
    }
    public function detail(Request $request)
    {
        $kdPaket = $request->id;
        $detailpaket = DB::table('pt_paket_asuransi_detal')
            ->select(
                'mt_paket_asuransi.kl_paket as product_id',
                'mt_paket_asuransi.kd_asuransi as kd_asuransi',
                'mt_asuransi.nama_asuransi as nama_asuransi',
                'mt_paket_asuransi.nama_paket_asuransi as nama_paket_asuransi',
                'mt_paket_asuransi.Keterangan as Keterangan',
                'pt_paket_asuransi_detal.kd_detal_paket as kd_detal_paket',
                'pt_paket_asuransi_detal.kd_paket as kd_paket',
                'pt_paket_asuransi_detal.SLA as SLA'
                )
                ->join('mt_paket_asuransi', 'mt_paket_asuransi.kl_paket', '=', 'pt_paket_asuransi_detal.kd_paket')
                ->join('mt_asuransi', 'mt_asuransi.kode_asuransi' , '=', 'mt_paket_asuransi.kd_asuransi')
                ->where('pt_paket_asuransi_detal.kd_paket', $kdPaket)
            
            
                ->orderBy('kl_paket', 'asc')
                ->get();

                //dd($detailpaket);
                $data = [];
                $namaPaketasuransi = $detailpaket[0]->nama_paket_asuransi;
                $namaAsuransi = $detailpaket[0]->nama_asuransi;
                $data['nama_asuransi']=$namaAsuransi;
                $data['nama_paket_asuransi'] = $namaPaketasuransi;
                
                $arr = [];
                $hitung = 0;

                foreach ($detailpaket as $value) {
                    $arr[$hitung] = [
                        'id' => $value->kd_detal_paket,
                        'name' => $value->SLA
                    ];
                    $hitung++;
                }

                $data['SLA'] = $arr;


                // $sla = $detailpaket['SLA'];
                // dd(sla);
        // $products = DB::table('mt_paket_asuransi')
                

        //         ->where('mt_paket_asuransi.kl_paket', $kdPaket)
        //         ->get();
        //     $data = [
        //         'products' => $products
        //     ];
            // dd($detailpaket);
        // $tarif = tarif::get();
        return response()->json($data);
    }


    public function detailKelas(Request $request)
    {
        $id = $request->id;

        $kelas = DB::table('pt_paket_asuransi_detal')
            ->select(
                'mt_paket_asuransi.kl_paket as product_id',
                'mt_paket_asuransi.kd_asuransi as kd_asuransi',
                'mt_asuransi.nama_asuransi as nama_asuransi',
                'mt_paket_asuransi.nama_paket_asuransi as nama_paket_asuransi',
                'mt_paket_asuransi.Keterangan as Keterangan',
                'pt_paket_asuransi_detal.kd_detal_paket as kd_detal_paket',
                'pt_paket_asuransi_detal.kd_paket as kd_paket',
                'pt_paket_asuransi_detal.SLA as SLA')
            ->join('mt_paket_asuransi', 'mt_paket_asuransi.kl_paket', '=', 'pt_paket_asuransi_detal.kd_paket')
            ->join('mt_asuransi', 'mt_asuransi.kode_asuransi' , '=', 'mt_paket_asuransi.kd_asuransi')
            ->where('pt_paket_asuransi_detal.kd_detal_paket', $id)
            ->first();

        $data = [];
        $data['kelas'] = $kelas;

        return view('hiss/product/detailKelas', $data);
    }
    

    // public function getProductRitel(Request $request)
    // {
    //     // if ($request->ajax()) {
    //         $kodeUser = $request->session()->get('user')->kode_user;
    
    //         $products = DB::table('products')
    //         ->select(
    //             'products.id as product_id',
    //             'products.nama_produk as nama_produk',
    //         DB::raw('(CASE WHEN products.jenis_produk = 2 THEN "Produk Retail" ELSE "Produk Korporasi" END) AS jenis_produk'),
    //         )
    //         ->where('products.kode_user', $kodeUser)
    //         ->where('products.jenis_produk', '=', 2)
    //         ->get();

    //         return DataTables::of($products)->addIndexColumn()->make(true);
    //     // }
    // }

    public function getProdukKorporasi(Request $request){
        $kodeUser = $request->session()->get('user')->kode_user;
    
        $keyword = $request->keyword;         
    
        $produkkorporasiCount = DB::table('products')
        ->select(DB::raw('COUNT(*) AS total'))
        
            ->where('products.kode_user', $kodeUser)
            ->where('products.jenis_produk', '=', 1)

        ->when($keyword, function($query, $keyword){
            $query->where('products.nama_produk', 'like', '%' . $keyword . '%');
        })   
        ->get();
    
    
        $numRecords = $produkkorporasiCount[0]->total;
    
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
    
        $produkkorporasi = DB::table('products')
            ->select(
                'products.id as product_id',
                'products.nama_produk as nama_produk',
            DB::raw('(CASE WHEN products.jenis_produk = 2 THEN "Produk Retail" ELSE "Produk Korporasi" END) AS jenis_produk'),
            )
            ->where('products.kode_user', $kodeUser)
            ->where('products.jenis_produk', '=', 1)
            ->when($keyword, function($query, $keyword){
                $query->where('products.nama_produk', 'like', '%' . $keyword . '%');
            }) 
            ->orderBy('products.id', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    
    
            $arr = [];
        if ($produkkorporasi){
            $arr['error'] = 0;
            $arr['numrows'] = $numRecords;
            $arr['numPages'] = $numPages;
            $arr['page'] = $page;
    
            $content = '<table class="table table-sm" id="tblCompanies">
            <thead>
                <tr>
                <td style="color: #697a8d;font-weight: bold;">No</td>
                <td style="color: #697a8d;font-weight: bold;">Nama Produk</td>
                <td style="color: #697a8d;font-weight: bold;">Jenis Produk</td>
                </tr>
            </thead>';
    
            
            foreach($produkkorporasi as $produkkor){
                $content .= '<tr><td>' . $offset+1 . '</td><td>' . 
                    $produkkor->nama_produk .'</td><td>' .
                    $produkkor->jenis_produk .'</td><td>'   ;
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

    // public function getProductKorporasi(Request $request)
    // {
    //     // if ($request->ajax()) {
    //         $kodeUser = $request->session()->get('user')->kode_user;
    
    //         $products = DB::table('products')
    //         ->select(
    //             'products.id as product_id',
    //             'products.nama_produk as nama_produk',
    //             DB::raw('(CASE WHEN products.jenis_produk = 2 THEN "Produk Retail" ELSE "Produk Korporasi" END) AS jenis_produk'),

    //         )
    //         ->where('products.kode_user', $kodeUser)
    //         ->where('products.jenis_produk', '=', 1)

    //         ->get();

    //         return DataTables::of($products)->addIndexColumn()->make(true);
    //     // }
    // }

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
        $idProduct = $request->frmDataProduct_id;

        if ($idProduct == 0)
        {
            $product = new Product;
        } else {
            $product = Product::find($idProduct);
        }
        
        $product->nama_produk      = $request->nama_produk;

        if ($product->save())
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


    public function ajaxProducts_corporateCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $count = Product::where('kd_asuransi', $kodeUser)->count();

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


    public function ajaxProducts_retailCount(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $count = Product::where('kd_asuransi', $kodeUser)->count();

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



    public function ajaxGetProducts(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $arr = [];

        $products = Product::where('kd_asuransi', $kodeUser)->get();

        if ($products){
            $arr['error'] = 0;
            $arr['products'] = $products;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }

    // public function storeTarif(Request $request)
    // {
    //     $id = $request->frmDataTarif_id;

    //     if ($id == 0)
    //     {
    //         $record = new tarif();
    //     } else {
    //         $record = tarif::find($id);
    //     }

    //     $record->bagian                     = $request->bagian;
    //     $record->tarif                   = $request->tarif;
    //     $record->klinik            = $request->klinik;
    //     $record->dokter           = $request->dokter;

    //     if ($record->save())
    //     {
    //         $arr = [
    //             'error' => 0,
    //             'message' => 'Data telah disimpan'
    //         ];
    //     } else {
    //         $arr = [
    //             'error' => 1,
    //             'message' => 'Data gagal disimpan'
    //         ];
    //     }

    //     return response()->json($arr);
    // }

    // public function getBranch(Request $request)
    // {
    //     $idBranch = $request->id;
    //     $branch = Branch::find($idBranch);
    //     return response()->json($branch);
    // }
    // public function getTarif(Request $request)
    // {
    //     $idTarif = $request->id;
    //     $tariff = tarif::find($idTarif);
    //     return response()->json($tariff);
    // }
   

    // public function deleteBranch(Request $request)
    // {
    //     $idBranch = $request->id;
    //     $branch = Branch::find($idBranch);
    //     $arr = [];
    //     if ($branch->delete() > 0)
    //     {
    //         $arr['error'] = 0;
    //         $arr['message'] = 'Data telah sukses dihapus';
    //     } else {
    //         $arr['error'] = 1;
    //         $arr['message'] = 'Data gagal dihapus';
    //     }
    //     return response()->json($arr);
    // }
//     public function deleteTarif(Request $request)
//     {
//         $id = $request->id;
//         $tarifff = tarif::find($id);
//         $arr = [];
//         if ($tarifff->delete() > 0)
//         {
//             $arr['error'] = 0;
//             $arr['message'] = 'Data telah sukses dihapus';
//         } else {
//             $arr['error'] = 1;
//             $arr['message'] = 'Data gagal dihapus';
//         }
//         return response()->json($arr);
//     }
}
