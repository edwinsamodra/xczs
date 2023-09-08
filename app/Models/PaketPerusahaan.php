<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPerusahaan extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'tc_paket_asuransi';

    // define primary key
    protected $primaryKey = 'id_tc_paket_asuransi';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    protected $fillable = ['kode_perusahaan', 'kode_asuransi', 'no_kontrak', 'tgl_kontrak'];
}
