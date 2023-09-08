<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class MemberRelative extends Model
{
    use HasFactory;

    protected $table = 'mt_keluarga_karyawan_perusahaan';
    protected $primaryKey = 'kd_keluarga_karyawan';
    protected $guarded = ['kd_keluarga_karyawan'];
    public $timestamps = false;

    public function get_num_peserta_istri($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
        ->select(DB::raw('COUNT(*) AS total'))
        ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
        ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
        ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
        ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
        ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
        ->where($this->table . '.kd_perusahaan', $kodeUser)
        ->where($this->table . '.id_dc_kawin', 1)
        ->when($keyword, function($query, $keyword){
            $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
        })->get();

        if ($queryCounts){
            return $queryCounts[0]->total;
        } else {
            return false;
        }
    }

}
