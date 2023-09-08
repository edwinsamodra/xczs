<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Disease;

class DiseaseController extends Controller
{

    public function webSearch()
    {
        return view('disease/webSearch');
    }
    public function obat()
    {
        return view('disease/obat');
    }


    public function webUpdate(Request $request)
    {
        $id      = $request->id;
        $field   = $request->field;
        $content = $request->content;

        $disease = Disease::find($id);
        $disease->$field = $content;
        
        if ($disease->save())
        {
            $arr = [
                'error' => 0,
                'message' => 'Data sukses disimpan'
            ];
        } else {
            $arr = [
                'error' => 1,
                'message' => 'Data gagal disimpan'
            ];
        }

        return response()->json($arr);

    }


    public function webInput()
    {
        $diseases = Disease::take(10)->get();
        return view('disease/webInput',['diseases' => $diseases]);
    }


    // AJAX
    public function webSave(Request $request)
    {
        $disease = new Disease;

        $disease->Nama_Penyakit = $request->Nama_Penyakit;
        $disease->IcdX = $request->IcdX;
        $disease->Class = $request->Class;
        $disease->Lama_Rawat = $request->Lama_Rawat;
        $disease->GKlinis = $request->GKlinis;
        $disease->Penyebab = $request->Penyebab;
        $disease->P_Lab = $request->P_Lab;
        $disease->Differential = $request->Differential;
        $disease->Pengobatan = $request->Pengobatan;
        $disease->Prognosis = $request->Prognosis;
        $disease->Remark = $request->Remark;
        $disease->Diagnosa_Icdx = $request->Diagnosa_Icdx;
        $disease->pre_existing = $request->pre_existing;

        if ($disease->save())
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


    public function store(Request $request)
    {
        $disease = new Disease;

        $disease->Nama_Penyakit = $request->Nama_Penyakit;
        $disease->IcdX = $request->IcdX;
        $disease->Class = $request->Class;
        $disease->Lama_Rawat = $request->Lama_Rawat;
        $disease->GKlinis = $request->GKlinis;
        $disease->Penyebab = $request->Penyebab;
        $disease->P_Lab = $request->P_Lab;
        $disease->Pengobatan = $request->Pengobatan;
        $disease->Prognosis = $request->Prognosis;
        $disease->Differential = $request->Differential;
        $disease->Remark = $request->Remark;
        $disease->Diagnosa_Icdx = $request->Diagnosa_Icdx;
        $disease->pre_existing = $request->pre_existing;

        $disease->save();

        return redirect('/diseases/webInput')->with('status', 'Data telah disimpan');
    }

    // API
    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $format = $request->get('format');

        // $diseases = DB::table('mt_penyakit')->where('Nama_Penyakit', 'like', '%' . $keyword .'%')->paginate(5);
        $diseases = Disease::where('Nama_Penyakit', 'like', '%' . $keyword .'%')->get();

        if (count($diseases) > 0)
        {
            if ($format == 'json')
            {
                $arr = [
                    'status' => 'OK',
                    'diseases' => $diseases
                ];
                return response()->json($arr);
            } else {                
                $html = '';
                foreach($diseases as $disease)
                {
                    $html .= '<div class="list-item" data-id="' . $disease->ID1 . '">' . $disease->Nama_Penyakit . '</div>';
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

/*
SELECT 	mt_penyakit.IcdX,
		mt_penyakit.Class,
		mt_klas_penyakit.nama_klas,
		mt_grup_icd_10.nama_icd_10
FROM 	mt_penyakit		
JOIN 	mt_master_icd10 ON mt_master_icd10.icd_10=mt_penyakit.IcdX
JOIN 	mt_grup_icd_10 ON mt_grup_icd_10.kode_icd=mt_penyakit.IcdX
JOIN 	mt_klas_penyakit ON mt_klas_penyakit.kode_klas=mt_penyakit.Class
WHERE 	mt_penyakit.Nama_Penyakit LIKE '%fever%'
*/
    
    // API
    public function detail(Request $request)
    {
        $diseaseId = $request->route('id');
        // $diseases = Disease::where('ID1', '=', $diseaseId)->get();
        // return response()->json($diseases[0]);

        $diseases = DB::table('mt_penyakit')->select(
            'mt_penyakit.ID1 AS id',
            'mt_penyakit.Nama_Penyakit AS nama_penyakit',
            'mt_penyakit.IcdX AS icdx',
            'mt_penyakit.Class AS class',
            'mt_penyakit.Lama_Rawat AS lama_rawat',
            'mt_penyakit.GKlinis AS gklinis',
            'mt_penyakit.Penyebab AS penyebab',
            'mt_penyakit.P_Lab AS p_lab',
            'mt_penyakit.Differential AS differential',
            'mt_penyakit.Pengobatan AS pengobatan',
            'mt_penyakit.Prognosis AS prognosis',
            'mt_penyakit.Remark AS remark',
            'mt_penyakit.Diagnosa_Icdx AS diagnosa_icdx',
            'mt_penyakit.pre_existing AS pre_existing',
            'mt_klas_penyakit.nama_klas AS nama_kelas',
            'mt_grup_icd_10.nama_icd_10 AS nama_kelompok'
        )
        ->leftJoin('mt_master_icd10', 'mt_master_icd10.icd_10', '=', 'mt_penyakit.IcdX')
        ->leftJoin('mt_klas_penyakit', 'mt_klas_penyakit.kode_klas', '=', 'mt_penyakit.Class')
        ->leftJoin('mt_grup_icd_10', 'mt_grup_icd_10.kode_icd', '=', 'mt_master_icd10.group_id')
        ->where('mt_penyakit.ID1', '=', $diseaseId)->get();

        $arr = [];
        if (count($diseases) > 0){
            $arr['status'] = 'OK';
            $arr['diseases'] = $diseases[0];
        } else {
            $arr['status'] = 'ERROR';
            $arr['message'] = 'Data not found';
        }

        return response()->json($arr);

        // dd($diseases);
        // return 'olalla';
    }


    // API
    public function list(Request $request)
    {
        $diseases = Disease::take(20)->get();

        $arr = [
            'status' => 1,
            'message' => 'Get list dmcare successfully',
            'data' => $diseases
        ];

        return response()->json($arr);
    }


    // API
    // id=0 to add new disease
    public function save(Request $request)
    {
        $disease = new Disease;

        $disease->Nama_Penyakit = $request->Nama_Penyakit;
        $disease->IcdX = $request->IcdX;
        $disease->Class = $request->Class;
        $disease->Lama_Rawat = $request->Lama_Rawat;
        $disease->GKlinis = $request->GKlinis;
        $disease->Penyebab = $request->Penyebab;
        $disease->P_Lab = $request->P_Lab;
        $disease->Differential = $request->Differential;
        $disease->Pengobatan = $request->Pengobatan;
        $disease->Prognosis = $request->Prognosis;
        $disease->Remark = $request->Remark;
        $disease->Diagnosa_Icdx = $request->Diagnosa_Icdx;
        $disease->pre_existing = $request->pre_existing;

        if ($disease->save())
        {
            $newId = $disease->ID1;
            $arr = [
                'error' => 0,
                'id' => $newId
            ];
        } else {
            $arr = [
                'error' => 1,
                'message' => 'Data gagal disimpan'
            ];
        }        

        return response()->json($arr);
    }
}
