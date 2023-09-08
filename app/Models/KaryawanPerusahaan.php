<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanPerusahaan extends Model
{
    use HasFactory;
    

    protected $table = 'mt_kepesertaan';

    // define primary key
    protected $primaryKey = 'kd_Karyawan';

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
        $karyawanperusahaan = KaryawanPerusahaan::select(
            'kd_Karyawan as kd_Karyawan',
            'nama_Karyawan as nama_Karyawan'

        )->orderBy('nama_Karyawan', 'asc')->get();
        return $karyawanperusahaan;
    }
}
