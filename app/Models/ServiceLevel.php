<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLevel extends Model
{
    use HasFactory;

    public $table = 'q_sla_kepesertaan';
    public $primaryKey = 'kd_Karyawan';    
}
