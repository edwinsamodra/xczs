<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'dc_jabatan';

    // define primary key
    protected $primaryKey = 'id_dc_jabatan';

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
        $jabatan = Jabatan::select(
            'id_dc_jabatan as id_dc_jabatan',
            'jabatan as jabatan'

        )->orderBy('jabatan', 'asc')->get();
        return $jabatan;
    }
}
