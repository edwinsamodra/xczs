<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolDarah extends Model
{
    use HasFactory;

    protected $table = 'dc_golongan_darah';

    // define primary key
    protected $primaryKey = 'id_dc_gol_darah';

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
        $goldarah = GolDarah::select(
            'id_dc_gol_darah as id_dc_gol_darah',
            'golongan_darah as golongan_darah'

        )->orderBy('golongan_darah', 'asc')->get();
        return $goldarah;
    }
}
