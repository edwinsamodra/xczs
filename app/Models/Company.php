<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'mt_perusahaan';
    protected $primaryKey = 'id_perusahaan';
    protected $guarded = ['id_perusahaan'];
    public $timestamps = false;


    public static function get_all()
    {
        $perusahaan = CabangMitra::select('kode_perusahaan as kode_perusahaan', 'nama_perusahaan as nama_perusahaan')
            ->orderBy('nama_kelurahan', 'asc')->get();

        return $perusahaan;
    }


    /**
     * Get list of company's insurance packages
     * 
     * @param string $companyCode Company code (kode perusahaan)
     * 
     * @return object
     */
    public static function getCompanyInsurancePackage($companyCode)
    {

        $packages = DB::table('tc_paket_asuransi_det')
            ->select(
                'mt_paket_asuransi.kl_paket as kl_paket',
                'mt_paket_asuransi.nama_paket_asuransi as nama_paket_asuransi')
            ->join('tc_paket_asuransi', 'tc_paket_asuransi.id_tc_paket_asuransi', '=', 'tc_paket_asuransi_det.id_tc_paket_asuransi')
            ->join('mt_paket_asuransi', 'mt_paket_asuransi.kl_paket', '=', 'tc_paket_asuransi_det.kl_paket')
            ->where('tc_paket_asuransi.kode_perusahaan', $companyCode)->get();

        return $packages;
    }
}
