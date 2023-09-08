<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasAsuransi extends Model
{
    use HasFactory;
    protected $table = 'mt_kelas_asuransi';

    // define primary key
    protected $primaryKey = 'kd_kls_asuransi';

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
        $layanan = KelasAsuransi::select(
            'kd_kls_asuransi as kd_kls_asuransi',
            'nama_layanan as nama_layanan'

        )->orderBy('nama_layanan', 'asc')->get();
        return $layanan;
    }
}
