<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\{Propinsi, Kota, Kecamatan, Kelurahan};

class WilayahController extends Controller
{
    // list data wilayah
    public function list(Request $request, $scope)
    {
        switch ($scope) {
            case 'propinsi':
                $areas = Propinsi::select(
                    'id_dc_propinsi as id',
                    'nama_propinsi as nama'
                )->orderBy('nama_propinsi', 'asc')->get();
                return response()->json($areas);
                break;
            case 'kota':
                $areas = Kota::select(
                    'id_dc_kota as id',
                    'nama_kota as nama'
                )->orderBy('nama_kota', 'asc')->get();
                return response()->json($areas);
                break;
            case 'kecamatan':
                $areas = Kecamatan::select(
                    'id_dc_kecamatan as id',
                    'nama_kecamatan as nama'
                )->orderBy('nama_kecamatan', 'asc')->get();
                return response()->json($areas);
                break;
            case 'kelurahan':
                $areas = Kelurahan::select(
                    'id_dc_kelurahan as id',
                    'nama_kelurahan as nama'
                )->orderBy('nama_kelurahan', 'asc')->get();
                return response()->json($areas);
                break;
        }        
    }


    // list data wilayah by parent id
    public function listBy(Request $request, $scope, $id)
    {
        switch ($scope) {
            case 'kota':
                $areas = Kota::select(
                    'id_dc_kota as id',
                    'nama_kota as nama'
                )->where('id_dc_propinsi', $id)->orderBy('nama_kota', 'asc')->get();
                return response()->json($areas);
                break;
            case 'kecamatan':
                $areas = Kecamatan::select(
                    'id_dc_kecamatan as id',
                    'nama_kecamatan as nama'
                )->where('id_dc_kota', $id)->orderBy('nama_kecamatan', 'asc')->get();
                return response()->json($areas);
                break;
            case 'kelurahan':
                $areas = Kelurahan::select(
                    'id_dc_kelurahan as id',
                    'nama_kelurahan as nama',
                    'kode_pos as kode_pos'
                )->where('id_dc_kecamatan', $id)->orderBy('nama_kelurahan', 'asc')->get();
                return response()->json($areas);
                break;            
        } 
    }


    public function update(Request $request, $scope, $id)
    {
        switch ($scope) {
            case 'propinsi':
                return ':: update :: you are accessing propinsi';
                break;
            case 'kota':
                return ':: update :: you are accessing kota';
                break;
            case 'kecamatan':
                return ':: update :: you are accessing kecamatan';
                break;
            case 'kelurahan':
                return ':: update :: you are accessing kelurahan';
                break;
        } 
    }


    public function delete(Request $request, $scope, $id)
    {
        switch ($scope) {
            case 'propinsi':
                return ':: delete :: you are accessing propinsi';
                break;
            case 'kota':
                return ':: delete :: you are accessing kota';
                break;
            case 'kecamatan':
                return ':: delete :: you are accessing kecamatan';
                break;
            case 'kelurahan':
                return ':: delete :: you are accessing kelurahan';
                break;
        } 
    }
    
}
