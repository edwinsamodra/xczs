<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;

    protected $table = 'mt_kepesertaan';
    protected $guarded = ['kd_Karyawan'];
    protected $primaryKey = 'kd_Karyawan';
    public $timestamps = false;


    // peserta umum = jomblo (id_dc_kawin=1 / belum menikah)
    public function get_num_peserta_umum($kodeUser, $keyword)
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


    // peserta perusahaan = peserta dibawah perusahaan
    public function get_num_peserta_perusahaan($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            // ->whereIn($this->table . '.id_dc_kawin', [2,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })->get();

        if ($queryCounts){
            return $queryCounts[0]->total;
        } else {
            return false;
        }
    }


    public function get_peserta_umum($kodeUser, $keyword, $offset, $limit, $orderBy='', $sort='asc')    
    {
        $pesertaUmum = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',

                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')

            ->where($this->table. '.id_dc_kawin', 1)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy('kd_Karyawan', 'asc')
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaUmum){
            return $pesertaUmum;
        } else {
            return false;
        }
    }


    public function get_peserta_perusahaan($kodeUser, $keyword, $offset, $limit, $orderBy='kd_Karyawan', $sort='asc')    
    {
        $pesertaUmum = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            // ->whereIn($this->table. '.id_dc_kawin', [2,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaUmum){
            return $pesertaUmum;
        } else {
            return false;
        }
    }   
    
    // peserta KK = peserta Kepala Keluarga
    public function get_num_peserta_kepala_keluarga($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->where($this->table . '.id_dc_kawin', [2,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })->get();

        if ($queryCounts){
            return $queryCounts[0]->total;
        } else {
            return false;
        }
    }

    public function get_peserta_kepala_keluarga($kodeUser, $keyword, $offset, $limit, $orderBy='kd_Karyawan', $sort='asc')    
    {
        $pesertaKK = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            ->where($this->table. '.id_dc_kawin', [2,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaKK){
            return $pesertaKK;
        } else {
            return false;
        }
    }   

    // peserta istri = peserta istri
    public function get_num_peserta_istri($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->where($this->table . '.id_dc_kawin', 2)
            ->where($this->table . '.id_dc_gender', 2)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })->get();

        if ($queryCounts){
            return $queryCounts[0]->total;
        } else {
            return false;
        }
    }

    public function get_peserta_istri($kodeUser, $keyword, $offset, $limit, $orderBy='kd_Karyawan', $sort='asc')    
    {
        $pesertaIstri = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            ->where($this->table. '.id_dc_kawin', 2)
            ->where($this->table. '.id_dc_gender', 2)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaIstri){
            return $pesertaIstri;
        } else {
            return false;
        }
    }   
    // peserta istri = peserta anak
    public function get_num_peserta_anak($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
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

    public function get_peserta_anak($kodeUser, $keyword, $offset, $limit, $orderBy='kd_Karyawan', $sort='asc')    
    {
        $pesertaAnak = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            ->where($this->table. '.id_dc_kawin', 1)
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaAnak){
            return $pesertaAnak;
        } else {
            return false;
        }
    }   
    // peserta istri = peserta lajang
    public function get_num_peserta_lajang($kodeUser, $keyword)
    {
        $queryCounts = DB::table($this->table)
            ->select(DB::raw('COUNT(*) AS total'))
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)
            ->where($this->table . '.id_dc_kawin', [1,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })->get();

        if ($queryCounts){
            return $queryCounts[0]->total;
        } else {
            return false;
        }
    }

    public function get_peserta_lajang($kodeUser, $keyword, $offset, $limit, $orderBy='kd_Karyawan', $sort='asc')    
    {
        $pesertaLajang = DB::table($this->table)
            ->select('mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.Nama_Karyawan as Nama_Karyawan',
                'mt_kepesertaan.kd_Karyawan as kd_Karyawan',
                'mt_kepesertaan.kd_jabatan as kd_jabatan',
                DB::raw('date(mt_kepesertaan.tgl_lahir) as tgl_lahir'),
                'mt_kepesertaan.nama_jabatan as nama_jabatan',
                'mt_kepesertaan.alergi as alergi',
                'mt_perusahaan.nama_perusahaan as nama_perusahaan',
                'dc_kawin.kawin as kawin',
                'dc_agama.agama as agama',
                'dc_gender.gender as gender',
                'tbl_jabatan.nama_jabatan as nama_jabatan',
                'dc_golongan_darah.golongan_darah as golongan_darah'
                )
            ->join('dc_kawin', 'dc_kawin.id_dc_kawin', '=', 'mt_kepesertaan.id_dc_kawin')
            ->join('dc_agama', 'dc_agama.id_dc_agama', '=', 'mt_kepesertaan.id_dc_agama')
            ->join('dc_gender', 'dc_gender.id_dc_gender', '=', 'mt_kepesertaan.id_dc_gender')
            ->join('dc_golongan_darah', 'dc_golongan_darah.id_dc_gol_darah', '=', 'mt_kepesertaan.id_dc_gol_darah')
            ->join('tbl_jabatan', 'tbl_jabatan.kd_jabatan', '=', 'mt_kepesertaan.kd_jabatan')
            ->join('mt_perusahaan', 'mt_perusahaan.kode_perusahaan', '=', 'mt_kepesertaan.kd_perusahaan')
            ->where('mt_perusahaan.kode_asuransi', $kodeUser)

            ->where($this->table. '.id_dc_kawin', [1,3,4])
            ->when($keyword, function($query, $keyword){
                $query->where('mt_kepesertaan.Nama_karyawan', 'like', '%' . $keyword . '%');
            })
            ->orderBy($orderBy, $sort)
            ->offset($offset)
            ->limit($limit)
            ->get();

        if ($pesertaLajang){
            return $pesertaLajang;
        } else {
            return false;
        }
    }   
}
