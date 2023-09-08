<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubunganKeluarga extends Model
{
    use HasFactory;

    protected $table = 'dc_status_keluarga';

    // define primary key
    protected $primaryKey = 'id_dc_stat_keluarga';

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
        $hubungankeluarga = HubunganKeluarga::select(
            'id_dc_stat_keluarga as id_dc_stat_keluarga',
            'hubungan_keluarga as hubungan_keluarga'

        )->orderBy('hubungan_keluarga', 'asc')->get();
        return $hubungankeluarga;
    }
}
