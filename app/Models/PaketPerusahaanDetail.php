<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketPerusahaanDetail extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'tc_paket_asuransi_det';

    // define primary key
    protected $primaryKey = 'id_tc_paket_asuransi_det';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    protected $fillable = ['id_tc_paket_asuransi', 'kl_paket'];
}
