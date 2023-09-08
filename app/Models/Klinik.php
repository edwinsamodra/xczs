<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Klinik extends Model
{
    use HasFactory;

    // custom table name?
    protected $table = 'mt_klinik';

    // custom ID field?
    protected $primaryKey = 'id_mt_klinik';
    
    // disallow mass assignment to these fields
    protected $guarded = ['id_mt_klinik'];

    // allow mass-assignment to these fields
    // protected $fillable = [];

    // turn off autoincrementing ?
    // public $incrementing = false;
    
    // primary key is not an integer ?
    // protected $keyType = 'string';

    // model will use created_at and updated_at ?
    public $timestamps = false;

    // custom field name?
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    public $fieldnames = [
        'id_mt_klinik',
        'kode_klinik',
        'nama_perusahaan',
        'nama_singkat',
        'nama_aplikasi',
        'alamat',
        'kota',
        'propinsi',
        'kode_pos',
        'telpon',
        'fax',
        'nama_pimpinan',
        'kontak_person',
        'keterangan',
        'logo',
        'logo_small',
        'html_title',
        'tgl_registrasi',
        'jenis_klinik',
        'kelas_klinik',
        'penyelenggara_klinik',
        'notelp_humas',
        'website',
        'luas_tanah',
        'luas_bangunan',
        'surat_izin',
        'nomor_izin',
        'tanggal_izin',
        'oleh_izin',
        'sifat_izin',
        'masa_berlaku',
        'status_penyelenggara',
        'akreditas_rs',
        'pentahapan_akreditas',
        'status_akreditas',
        'tanggal_akreditas',
        'jumlah_tt',
        'perinatologi',
        'kelas_vvip',
        'kelas_vip',
        'kelas_i',
        'kelas_ii',
        'kelas_iii',
        'icu',
        'picu',
        'nicu',
        'hcu',
        'iccu',
        'ruang_isolasi',
        'ruang_ugd',
        'ruang_bersalin',
        'email',
        'id_dc_kelurahan',
        'id_dc_kecamatan',
        'id_dc_kota',
        'id_dc_negara',
        'id_dc_propinsi',
        'id_dd_paket',
        'jenis_app',
        'nomer_hp',
        'jenis_pklu',
        'tgl_input'
    ];


    /**
     * Print list of field names
     * 
     * @return string
     */
    public function get_str_field_names()
    {
        $str = "";
        foreach($this->fieldnames as $fieldname){
            $str .=  '$this->table' . " .'." . $fieldname . " AS " . $fieldname . "'," . '<br>';
        }

        return substr($str,0,strlen($str)-1);
    }


    public function get_field_names()
    {
        $str = "";
        foreach($this->fieldnames as $fieldname){
            $str .=  "'" . $fieldname . "'," . '<br>';
        }

        return substr($str,0,strlen($str)-1);
    }


    public function get_klinik($kodeKlinik)
    {
        $fieldnames = $this->get_str_field_names();

        $klinik = DB::table($this->table)
            ->select(
                $this->table .'.id_mt_klinik AS id_mt_klinik',
                $this->table .'.kode_klinik AS kode_klinik',
                $this->table .'.nama_perusahaan AS nama_perusahaan',
                $this->table .'.nama_singkat AS nama_singkat',
                $this->table .'.nama_aplikasi AS nama_aplikasi',
                $this->table .'.alamat AS alamat',
                $this->table .'.kota AS kota',
                $this->table .'.propinsi AS propinsi',
                $this->table .'.kode_pos AS kode_pos',
                $this->table .'.telpon AS telpon',
                $this->table .'.fax AS fax',
                $this->table .'.nama_pimpinan AS nama_pimpinan',
                $this->table .'.kontak_person AS kontak_person',
                $this->table .'.keterangan AS keterangan',
                $this->table .'.logo AS logo',
                $this->table .'.logo_small AS logo_small',
                $this->table .'.html_title AS html_title',
                DB::raw("date($this->table.tgl_registrasi) AS tgl_registrasi"),
                $this->table .'.jenis_klinik AS jenis_klinik',
                $this->table .'.kelas_klinik AS kelas_klinik',
                $this->table .'.penyelenggara_klinik AS penyelenggara_klinik',
                $this->table .'.notelp_humas AS notelp_humas',
                $this->table .'.website AS website',
                $this->table .'.luas_tanah AS luas_tanah',
                $this->table .'.luas_bangunan AS luas_bangunan',
                $this->table .'.surat_izin AS surat_izin',
                $this->table .'.nomor_izin AS nomor_izin',
                DB::raw("date($this->table.tanggal_izin) AS tanggal_izin"),
                $this->table .'.oleh_izin AS oleh_izin',
                $this->table .'.sifat_izin AS sifat_izin',
                $this->table .'.masa_berlaku AS masa_berlaku',
                $this->table .'.status_penyelenggara AS status_penyelenggara',
                $this->table .'.akreditas_rs AS akreditas_rs',
                $this->table .'.pentahapan_akreditas AS pentahapan_akreditas',
                $this->table .'.status_akreditas AS status_akreditas',
                DB::raw("date($this->table.tanggal_akreditas) AS tanggal_akreditas"),
                DB::raw("IFNULL($this->table.jumlah_tt, 0) AS jumlah_tt"),
                DB::raw("IFNULL($this->table.perinatologi, 0) AS perinatologi"),
                DB::raw("IFNULL($this->table.kelas_vvip, 0) AS kelas_vvip"),
                DB::raw("IFNULL($this->table.kelas_vip, 0) AS kelas_vip"),
                DB::raw("IFNULL($this->table.kelas_i, 0) AS kelas_i"),
                DB::raw("IFNULL($this->table.kelas_ii, 0) AS kelas_ii"),
                DB::raw("IFNULL($this->table.kelas_iii, 0) AS kelas_iii"),
                DB::raw("IFNULL($this->table.icu, 0) AS icu"),
                DB::raw("IFNULL($this->table.picu, 0) AS picu"),
                DB::raw("IFNULL($this->table.nicu, 0) AS nicu"),
                DB::raw("IFNULL($this->table.hcu, 0) AS hcu"),
                DB::raw("IFNULL($this->table.iccu, 0) AS iccu"),
                DB::raw("IFNULL($this->table.ruang_isolasi, 0) AS ruang_isolasi"),
                DB::raw("IFNULL($this->table.ruang_ugd, 0) AS ruang_ugd"),
                DB::raw("IFNULL($this->table.ruang_bersalin, 0) AS ruang_bersalin"),
                $this->table .'.email AS email',
                $this->table .'.id_dc_kelurahan AS id_dc_kelurahan',
                $this->table .'.id_dc_kecamatan AS id_dc_kecamatan',
                $this->table .'.id_dc_kota AS id_dc_kota',
                $this->table .'.id_dc_negara AS id_dc_negara',
                $this->table .'.id_dc_propinsi AS id_dc_propinsi',
                DB::raw("IFNULL($this->table.id_dd_paket, 0) AS id_dd_paket"),
                $this->table .'.jenis_app AS jenis_app',
                $this->table .'.nomer_hp AS nomer_hp',
                $this->table .'.jenis_pklu AS jenis_pklu',
                DB::raw("date($this->table.tgl_input) AS tgl_input"),
                'dc_kelurahan.nama_kelurahan AS nama_kelurahan',
                'dc_kecamatan.nama_kecamatan AS nama_kecamatan',
                'dc_kota.nama_kota AS nama_kota',
                'dc_propinsi.nama_propinsi AS nama_propinsi')
            ->join('dc_kelurahan','dc_kelurahan.id_dc_kelurahan', '=', $this->table . '.id_dc_kelurahan')
            ->join('dc_kecamatan','dc_kecamatan.id_dc_kecamatan', '=', $this->table . '.id_dc_kecamatan')
            ->join('dc_kota','dc_kota.id_dc_kota', '=', $this->table . '.id_dc_kota')
            ->join('dc_propinsi','dc_propinsi.id_dc_propinsi', '=', $this->table . '.id_dc_propinsi')
            ->where($this->table . '.kode_klinik', $kodeKlinik)->first();

        if ($klinik){
            return $klinik;
        } else {
            return false;
        }
    }
}
