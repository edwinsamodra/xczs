<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'mt_perusahaan';

    // define primary key
    protected $primaryKey = 'id_perusahaan';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';


    public static function get_all()
    {
        $perusahaan = Perusahaan::select(
            'kode_perusahaan as kd_perusahaan',
            'id_perusahaan as id_perusahaan',
            'nama_perusahaan as nama_perusahaan'
        )->orderBy('nama_perusahaan', 'asc')->get();
        return $perusahaan;
    }
}
