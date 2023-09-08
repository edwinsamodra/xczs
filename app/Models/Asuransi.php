<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asuransi extends Model
{
    use HasFactory;

    protected $table = 'mt_asuransi';

    // define primary key
    protected $primaryKey = 'id_asuransi';

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
        $asuransi = Asuransi::select(
            'kode_asuransi as kode_asuransi',
            'nama_asuransi as nama_asuransi'
        )->orderBy('nama_asuransi', 'asc')->get();
        return $asuransi;
        // return response()->json($asuransi);
    }
}
