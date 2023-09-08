<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class PaketAsuransi extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'mt_paket_asuransi';

    // define primary key
    protected $primaryKey = 'kl_paket';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';


    public static function get_all($orderBy='kl_paket', $sort='asc')
    {   
        $kodeuser=Session::get("user")->kode_user;
        $areas = PaketAsuransi::select(
            'kl_paket as kl_paket',
            'nama_paket_asuransi as nama_paket_asuransi'
        )
        ->where('kd_asuransi', $kodeuser)
        ->orderBy($orderBy, $sort)->get();
        return $areas;
    }
}
