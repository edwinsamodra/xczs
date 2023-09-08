<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Kelurahan;

class ListKelurahanController extends Controller
{
    // list data wilayah
    public function kelurahan(Request $request)
    {
        $id_dc_kelurahan = $request->id;

        $areas = DB::table('dc_kelurahan')
            ->select(
                'dc_kelurahan.id_dc_kelurahan as id',
                'dc_kelurahan.nama_kelurahan as nama',            
                'dc_kelurahan.id_dc_kota as id_dc_kota',
                'dc_kota.nama_kota as nama_kota',
                'dc_kelurahan.id_dc_kecamatan as id_dc_kecamatan',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kelurahan.id_dc_propinsi AS id_dc_propinsi',
                'dc_propinsi.nama_propinsi AS nama_propinsi',
                'dc_kelurahan.kode_pos as kode_pos')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kelurahan.id_dc_kota')
            ->join('dc_propinsi', 'dc_propinsi.id_dc_propinsi', '=', 'dc_kelurahan.id_dc_propinsi')
            ->where('dc_kelurahan.id_dc_kelurahan', $id_dc_kelurahan)->get();

        return response()->json($areas);
    }


    public function getKelurahan(Request $request)
    {
        $id_dc_kelurahan = $request->id;

        $kelurahan = DB::table('dc_kelurahan')
            ->select(
                'dc_kelurahan.id_dc_kelurahan as id',
                'dc_kelurahan.nama_kelurahan as nama',            
                'dc_kelurahan.id_dc_kota as id_dc_kota',
                'dc_kota.nama_kota as nama_kota',
                'dc_kelurahan.id_dc_kecamatan as id_dc_kecamatan',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kelurahan.id_dc_propinsi AS id_dc_propinsi',
                'dc_propinsi.nama_propinsi AS nama_propinsi',
                'dc_kelurahan.kode_pos as kode_pos')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kelurahan.id_dc_kota')
            ->join('dc_propinsi', 'dc_propinsi.id_dc_propinsi', '=', 'dc_kelurahan.id_dc_propinsi')
            ->where('dc_kelurahan.id_dc_kelurahan', $id_dc_kelurahan)->get();

        $arr = [];

        if ($kelurahan){
            $arr['error'] = 0;
            $arr['content'] = $kelurahan;
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'INVALID_QUERY';
        }

        return response()->json($arr);
    }    


    public function list(Request $request)
    {
        
        $id = $request->get('keyword');
        $data = Kelurahan::join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
                            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
                            ->select('id_dc_kelurahan as id',
                                     'nama_kelurahan as nama',
                                     'kode_pos as kode pos',
                                     'nama_kota as nama_kota',
                                     'nama_kecamatan as kecamatan')
                            ->where('nama_kelurahan', 'like', '%' . $id . '%')->paginate(5);
       
        
        if (count($data) > 0)
        {
            $html = '';
            foreach($data as $kelurahan){
                $html .= '<div class="list-item" data-id="' . $kelurahan->id . '">' . $kelurahan->nama . ' - ' . $kelurahan->kecamatan . ' - ' . $kelurahan->nama_kota . '</div>';
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
    // list data wilayah by parent id   
}
