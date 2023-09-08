<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarif extends Model
{
    use HasFactory;
    protected $table = 'mastertarif';
    protected $guarded = ['id'];
    public $timestamps = false;
 
}
