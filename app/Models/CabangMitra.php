<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabangMitra extends Model
{
    use HasFactory;

    protected $table = 'mt_cabang_perusahaan';
    protected $primaryKey = 'id_cabang_perusahaan';
    protected $guarded = ['id_cabang_perusahaan'];
    public $timestamps = false;
}
