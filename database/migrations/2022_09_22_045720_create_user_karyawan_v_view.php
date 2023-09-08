<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUserKaryawanVView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `user_karyawan_v` AS select `dev_dmcare_db_2022_09_22`.`dd_user`.`id_dd_user` AS `id_dd_user`,`dev_dmcare_db_2022_09_22`.`dd_user`.`username` AS `username`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`nama_pegawai` AS `nama_pegawai`,`dev_dmcare_db_2022_09_22`.`mt_bagian`.`nama_bagian` AS `nama_bagian`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`no_induk` AS `no_induk`,`dev_dmcare_db_2022_09_22`.`dd_user_group`.`nama_group` AS `nama_group`,`dev_dmcare_db_2022_09_22`.`dd_user`.`id_dd_user_group` AS `id_dd_user_group`,`dev_dmcare_db_2022_09_22`.`dd_user`.`status` AS `status`,`dev_dmcare_db_2022_09_22`.`dd_user`.`ko_wil` AS `ko_wil`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`kode_jabatan` AS `kode_jabatan`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`kode_dokter` AS `kode_dokter`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`status` AS `Expr1`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`no_mr` AS `no_mr`,`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`kode_rs` AS `kode_rs` from (((`dev_dmcare_db_2022_09_22`.`dd_user` join `dev_dmcare_db_2022_09_22`.`mt_karyawan` on(`dev_dmcare_db_2022_09_22`.`dd_user`.`no_induk` = `dev_dmcare_db_2022_09_22`.`mt_karyawan`.`no_induk`)) join `dev_dmcare_db_2022_09_22`.`dd_user_group` on(`dev_dmcare_db_2022_09_22`.`dd_user`.`id_dd_user_group` = `dev_dmcare_db_2022_09_22`.`dd_user_group`.`id_dd_user_group`)) left join `dev_dmcare_db_2022_09_22`.`mt_bagian` on(`dev_dmcare_db_2022_09_22`.`mt_karyawan`.`kode_bagian` = `dev_dmcare_db_2022_09_22`.`mt_bagian`.`kode_bagian`))");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS `user_karyawan_v`");
    }
}
