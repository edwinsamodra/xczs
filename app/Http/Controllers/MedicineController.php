<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        return view('medicine/webSearch');
    }

    public function getDetail(Request $request)
    {
        $medicineId = $request->route('id');

        $medicines = DB::table('mt_barang_2022')->select('mt_barang_2022.nama_brg AS merk',
        'mt_generik_2022.nama_generik AS generik',
        'mt_barang_2022.detail AS detail',
        'mt_sub_golongan_2022.nama_sub_golongan AS nama_sub_golongan',
        'mt_golongan_2022.nama_golongan AS nama_golongan',
        'mt_pabrik_obat_2022.nama_pabrik AS nama_pabrik',
        'mt_kemasan_2022.KEMASAN AS kemasan',
        'mt_barang_2022.kandungan AS kandungan',
        'mt_barang_2022.harga_jual AS harga')
        ->distinct()
        ->leftjoin('mt_generik_2022','mt_generik_2022.kode_generik', '=', 'mt_barang_2022.kode_generik')
        ->leftjoin('mt_sub_golongan_2022','mt_sub_golongan_2022.kode_sub_gol', '=', 'mt_barang_2022.kode_sub_golongan')
        ->leftjoin('mt_golongan_2022', 'mt_golongan_2022.kode_golongan', '=', 'mt_barang_2022.kode_golongan')
        ->leftjoin('mt_pabrik_obat_2022', 'mt_pabrik_obat_2022.id_pabrik', '=', 'mt_barang_2022.id_pabrik')
        ->leftjoin('mt_kemasan_2022', 'mt_kemasan_2022.id_kemasan_PK', '=', 'mt_barang_2022.k_kemasan')
        ->where('mt_barang_2022.id_rekap_brg', '=', $medicineId)->get();

        if (count($medicines) > 0)
        {
            $arr = [
                'status' => 'OK',
                'medicines' => $medicines
            ];
        } else {
            $arr = [
                'status' => 'ERROR',
                'message' => 'NO DATA FOUND'
            ];
        }

        return response()->json($arr);
    }


    public function search(Request $request)
    {
        $keyword = $request->get('keyword');

        $medicines = DB::table('mt_master_rekap_brg')->select('id_brg AS id_barang', 'nama_brg AS nama_barang')->where('nama_brg', 'like', '%' . $keyword .'%')->get();

        if (count($medicines) > 0)
        {
            $html = '';
            foreach($medicines as $medicine){
                $html .= '<div class="list-item" data-id="' . $medicine->id_barang . '">' . $medicine->nama_barang . '</div>';
            }

            $arr = [
                'status' => 'OK',
                'content' => $html
            ];
        } else {               
            $arr = [
                'status' => 'ERROR',
                'message' => 'NO DATA FOUND'
            ];
        }

        return response()->json($arr);
    }
}
