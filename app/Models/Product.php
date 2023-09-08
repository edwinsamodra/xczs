<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'mt_paket_asuransi';
    protected $primaryKey = 'kl_paket';

    protected $guarded = ['kl_paket'];
    public $timestamps = false;


}
