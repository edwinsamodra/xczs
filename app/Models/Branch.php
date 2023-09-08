<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Branch extends Model
{
    use HasFactory;

    // custom table name?
    protected $table = 'mt_cabang_asuransi';

    // custom ID field?
    protected $primaryKey = 'id_cabang_asuransi';
    
    // disallow mass assignment to these fields
    protected $guarded = ['id_cabang_asuransi'];

    // allow mass-assignment to these fields
    // protected $fillable = [];

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // custom field name?
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';


    public function get_num_branches($kodeUser, $keyword)
    {
        $branchesCount = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('mt_cabang_asuransi.kode_asuransi', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_cabang_asuransi.nama_pimpinan_cabang', 'like', '%' . $keyword . '%');
            })  
            ->get();
        
        if ($branchesCount){
            return $branchesCount[0]->total;
        } else {
            return false;
        }
        
    }


    public function get_branches($kodeUser, $keyword, $offset, $limit, $orderBy = 'branch_id', $sort='asc')
    {
        $branches = DB::table($this->table)
            ->select('mt_cabang_asuransi.id_cabang_asuransi as branch_id',
                'mt_cabang_asuransi.logo_asuransi as logo',
                'mt_cabang_asuransi.nama_pimpinan_cabang as kepala_cabang',
                'mt_cabang_asuransi.nama_cabang_asuransi as nama_cabang',
                'mt_cabang_asuransi.alamat as alamat',
                'mt_cabang_asuransi.kontakperson as contact_person',
                'dc_kelurahan.nama_kelurahan as nama_kelurahan',
                'dc_kelurahan.kode_pos as kode_pos',
                'dc_kecamatan.nama_kecamatan as nama_kecamatan',
                'dc_kota.nama_kota as nama_kota')
            ->join('dc_kelurahan', 'dc_kelurahan.id_dc_kelurahan', '=', 'mt_cabang_asuransi.id_dc_kelurahan')
            ->join('dc_kecamatan', 'dc_kecamatan.id_dc_kecamatan', '=', 'dc_kelurahan.id_dc_kecamatan')
            ->join('dc_kota', 'dc_kota.id_dc_kota', '=', 'dc_kecamatan.id_dc_kota')
            ->where('mt_cabang_asuransi.kode_asuransi', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_cabang_asuransi.nama_pimpinan_cabang', 'like', '%' . $keyword . '%');
                $query->orWhere('mt_cabang_asuransi.nama_cabang_asuransi', 'like', '%' . $keyword . '%');
            })  
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($branches){
            return $branches;
        } else {
            return false;
        }
    }
}
