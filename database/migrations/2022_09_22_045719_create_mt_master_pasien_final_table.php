<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtMasterPasienFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_master_pasien_final', function (Blueprint $table) {
            $table->integer('id_mt_master_pasien');
            $table->string('no_mr', 50)->nullable();
            $table->string('no_mr_lama', 50)->nullable();
            $table->string('hubungan', 50)->nullable();
            $table->integer('no_urutan')->nullable();
            $table->string('kode_login', 10)->nullable();
            $table->string('kota')->nullable();
            $table->string('nama_pasien', 100)->nullable();
            $table->string('nama_panggilan', 100)->nullable();
            $table->string('nama_kel_pasien', 100)->nullable();
            $table->string('no_ktp', 100)->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('tgl_lhr', 27)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->integer('umur_pasien')->nullable();
            $table->string('almt_ttp_pasien')->nullable();
            $table->string('tlp_kode_area', 50)->nullable();
            $table->string('tlp_almt_ttp', 100)->nullable();
            $table->string('jen_kelamin', 10)->nullable();
            $table->string('status_perkaw', 100)->nullable();
            $table->string('suku', 10)->nullable();
            $table->integer('kode_agama')->nullable();
            $table->string('kebangsaan', 15)->nullable();
            $table->string('alamat_lokal')->nullable();
            $table->string('tlp_almt_lkl', 30)->nullable();
            $table->string('nama_kel_ter', 100)->nullable();
            $table->string('nama_almt_kel', 225)->nullable();
            $table->integer('hubungan_kel')->nullable();
            $table->string('tlp_kel', 30)->nullable();
            $table->integer('kode_pendidikan')->nullable();
            $table->integer('kode_kelompok')->nullable();
            $table->integer('kode_perusahaan')->nullable();
            $table->string('kd_bgn', 50)->nullable();
            $table->string('prosedur_rs', 18)->nullable();
            $table->string('nama_almt_kantor')->nullable();
            $table->string('jabatan', 15)->nullable();
            $table->string('gol_darah', 3)->nullable();
            $table->string('alergi', 20)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->integer('umur_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->integer('umur_ibu')->nullable();
            $table->string('pekerjaan_ibu', 100)->nullable();
            $table->string('no_askes', 150)->nullable();
            $table->string('nm_inst_askes', 20)->nullable();
            $table->string('tgl_ctk_kartu', 27)->nullable();
            $table->integer('jth_kelas')->nullable();
            $table->dateTime('masa_mulai')->nullable();
            $table->dateTime('masa_selesai')->nullable();
            $table->string('flag_member', 1)->nullable();
            $table->string('jam_lahir', 50)->nullable();
            $table->string('berat_badan', 50)->nullable();
            $table->string('panjang_badan', 50)->nullable();
            $table->string('warna_kulit', 50)->nullable();
            $table->string('no_gelang', 50)->nullable();
            $table->string('pemberi_no', 50)->nullable();
            $table->string('mr_ibu', 50)->nullable();
            $table->string('dok_penolong', 100)->nullable();
            $table->string('user_id', 50)->nullable();
            $table->string('penanggung', 100)->nullable();
            $table->integer('kode_klas')->nullable();
            $table->string('milik', 100)->nullable();
            $table->smallInteger('status_meninggal')->nullable();
            $table->string('tgl_input', 27)->nullable();
            $table->string('jatah_ruang', 50)->nullable();
            $table->integer('id_dc_kota')->nullable();
            $table->integer('id_dc_kecamatan')->nullable();
            $table->integer('id_dc_kelurahan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_mr_barcode', 13)->nullable();
            $table->string('url_foto_pasien', 150)->nullable();
            $table->integer('id_dc_propinsi')->nullable();
            $table->integer('id_dc_kawin')->nullable();
            $table->integer('id_dc_agama')->nullable();
            $table->double('id_master_backlog')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('title', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->integer('id_dc_pekerjaan')->nullable();
            $table->integer('id_dc_pekerjaan_ayah')->nullable();
            $table->integer('id_dc_pekerjaan_ibu')->nullable();
            $table->integer('id_dc_negara')->nullable();
            $table->integer('id_dc_pendidikan')->nullable();
            $table->integer('id_dc_suku')->nullable();
            $table->integer('id_dd_hub_keluarga')->nullable();
            $table->longText('note')->nullable();
            $table->longText('note_url')->nullable();
            $table->string('nip', 21)->nullable();
            $table->string('nip_penanggung', 21)->nullable();
            $table->string('departemen', 150)->nullable();
            $table->string('posisi_pekerjaan', 150)->nullable();
            $table->string('lama_kerja', 150)->nullable();
            $table->string('nik', 100)->nullable();
            $table->integer('status_bpjs')->nullable();
            $table->integer('id_mt_unit_usaha')->nullable();
            $table->integer('status_karyawan')->nullable();
            $table->integer('hambatan_fisik')->nullable();
            $table->integer('id_dd_departement')->nullable();
            $table->string('no_bpjs', 25)->nullable();
            $table->string('url_foto', 200)->nullable();
            $table->tinyInteger('flag_entrypasien_baru')->nullable();
            $table->integer('id_dd_pangkat')->nullable();
            $table->tinyInteger('jenis_tahanan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mt_master_pasien_final');
    }
}
