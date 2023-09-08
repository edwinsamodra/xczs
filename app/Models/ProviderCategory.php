<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderCategory extends Model
{
    use HasFactory;

    protected $table = 'provider_categories';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;


    public static function get_all()
    {
        $providerCategories = ProviderCategory::select(
            'id as id',
            'name as name'
        )->orderBy('id', 'asc')->get();
        return $providerCategories;
    }
}
