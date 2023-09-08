<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_jabatan extends Model
{
    use HasFactory;

    protected $table = 'tbl_jabatan';

    // define primary key
    protected $primaryKey = 'kd_jabatan';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    // public $timestamps = true;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';


    public static function get_all()
    {
        $tbljabatan = tbl_jabatan::select(
            'kd_jabatan as kd_jabatan',
            'kd_perusahaan as kd_perusahaan',
            'nama_jabatan as nama_jabatan'


        )
        ->where('kd_perusahaan','=','P00001')
        ->orderBy('nama_jabatan', 'asc')->get();
        return $tbljabatan;
    }
    
}
