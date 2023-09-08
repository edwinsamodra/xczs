<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyRelationship extends Model
{
    use HasFactory;

    protected $table = 'dc_status_keluarga';
    protected $primaryKey = 'id_dc_stat_keluarga';
    protected $guarded = ['id_dc_stat_keluarga'];
    protected $fillable = ['hubungan_keluarga', 'keterangan'];

    public $timestamps = false;
}
