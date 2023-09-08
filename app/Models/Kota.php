<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'dc_kota';

    // define primary key
    protected $primaryKey = 'id_dc_kota';

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
        $areas = Kota::select(
            'id_dc_kota as id',
            'nama_kota as nama'
        )->orderBy('nama_kota', 'asc')->get();
        return $areas;
    }
}
