<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    protected $table = 'dc_gender';

    // define primary key
    protected $primaryKey = 'id_dc_gender';

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
        $gender = Gender::select(
            'id_dc_gender as id_dc_gender',
            'gender as gender'

        )->orderBy('gender', 'asc')->get();
        return $gender;
    }
}
