<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Disease extends Model
{
    use HasFactory;

    // define table name
    protected $table = 'mt_penyakit';

    // define primary key
    protected $primaryKey = 'ID1';

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    protected $fillable = [
        'Nama_Penyakit',
        'IcdX',
        'Class',
        'Lama_Rawat',
        'GKlinis',
        'Penyebab',
        'P_Lab',
        'Differential',
        'Pengobatan',
        'Prognosis',
        'Remark',
        'Diagnosa_Icdx',
        'pre_existing'
    ];

}
