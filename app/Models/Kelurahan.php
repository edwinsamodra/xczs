<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'dc_kelurahan';

    // define primary key
    protected $primaryKey = 'id_dc_kelurahan';

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
        $areas = Kelurahan::select(
            'id_dc_kelurahan as id',
            'nama_kelurahan as nama',
            'kode_pos as kode_pos'

        )->orderBy('nama_kelurahan', 'asc')->get();
        return $areas;
    }
}
