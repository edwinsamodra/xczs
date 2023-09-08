<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    use HasFactory;

    protected $table = 'dc_propinsi';
    protected $primaryKey = 'id_dc_propinsi';


    public static function get_all()
    {
        $areas = Propinsi::select(
            'id_dc_propinsi as id',
            'nama_propinsi as nama'
        )->orderBy('nama_propinsi', 'asc')->get();
        return $areas;
    }
}
