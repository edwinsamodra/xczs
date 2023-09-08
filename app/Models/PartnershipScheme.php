<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnershipScheme extends Model
{
    use HasFactory;

    protected $table = 'partnership_schemes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;


    public static function get_all()
    {
        $partnershipSchemes = PartnershipScheme::select(
            'id as id',
            'name as name'
        )->orderBy('id', 'asc')->get();
        return $partnershipSchemes;
    }
}
