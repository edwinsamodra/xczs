<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'dc_agama';

    // define primary key
    protected $primaryKey = 'id_dc_agama';

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
        $agama = Agama::select(
            'id_dc_agama as id_dc_agama',
            'agama as agama'

        )->orderBy('agama', 'asc')->get();
        return $agama;
    }
}
