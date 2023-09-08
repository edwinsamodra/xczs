<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawin extends Model
{
    use HasFactory;
    protected $table = 'dc_kawin';

    // define primary key
    protected $primaryKey = 'id_dc_kawin';

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
        $kawin = Kawin::select(
            'id_dc_kawin as id_dc_kawin',
            'kawin as kawin'

        )->orderBy('kawin', 'asc')->get();
        return $kawin;
    }
}
