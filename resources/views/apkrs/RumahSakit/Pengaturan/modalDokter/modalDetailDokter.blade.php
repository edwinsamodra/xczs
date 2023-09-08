<!-- Modal -->
<div class="modal fade" id="detailDokter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style=" margin-top: 5em;">
        <button type="button" class="mb-2 btn" style="background: #FFFFFF">
            <P class="modal-title" id="staticBackdropLabel" style="color: #777777        ;">Detail Dokter : dr Indah
                Trisnawaty, Sp.PA || Spesialisasi : Laboratorium</P>
        </button>
        <div class="modal-content">

            <div class="modal-header main-menu-area" style="background-color: #0c5795;">
                <ul class="nav nav-tabs  notika-menu-wrap menu-it-icon-pro" style="margin-top: -1em">
                    <li class="px-3">
                        <a href="#jadwalDokter" id="JadwalDokter" data-toggle='tab' class="pmenu-active">
                            Jadwal Dokter
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="Praktek" href='#praktek' class='pmenu'>
                            Praktek
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="Pendidikan" href='#pendidikan' class='pmenu'>
                            Pendidikan
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="Jabatan" href='#jabatan' class='pmenu'>
                            Jabatan
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="Keluarga" href='#keluarga' class='pmenu'>
                            Keluarga
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="CV" href='#cv' class='pmenu'>
                            CV
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="KontrakDokter" href='#kontrakDokter' class='pmenu'>
                            Kontrak Dokter
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="NoteDokter" href='#noteDokter' class='pmenu'>
                            Note Dokter
                        </a>
                    </li>
                    <li class='px-3'>
                        <a data-toggle='tab' id="Tugas" href='#tugas' class='pmenu'>
                            Tugas
                        </a>
                    </li>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                    <div class="tab-content custom-menu-content" style="padding: 0">
                        <div id='jadwalDokter' class='tab-pane in active'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Jadwal Dokter</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah Jadwal</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;">Hari</td>
                                                <td style="color: #697a8d;font-weight: bold;">Jadwal Mulai</td>
                                                <td style="color: #697a8d;font-weight: bold;">Jam Terakhir</td>
                                                <td style="color: #697a8d;font-weight: bold;">Interval</td>
                                                <td style="color: #697a8d;font-weight: bold;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td valign="top">1.</td>
                                                <td style="color: #697a8d;">
                                                    <ul>
                                                        <li>Senin</li>
                                                        <li>Selasa</li>
                                                        <li>Rabu</li>
                                                        <li>Kamis</li>
                                                        <li>Jumat</li>
                                                    </ul>
                                                </td>
                                                <td style="color: #697a8d;">08:00</td>
                                                <td style="color: #697a8d;">12:00</td>
                                                <td style="color: #697a8d;">60</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a role="button" class="btn btn-sm mb-3 text-white"
                                                                data-bs-toggle="modal" data-id=""
                                                                data-bs-target="#editPegawai"
                                                                style="color: #697a8d; background-color: #0c5795; width:5em"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a role="button" class="btn btn-sm text-white"
                                                                data-bs-toggle="modal" data-id=""
                                                                data-bs-target="#editPegawai"
                                                                style="color: #697a8d; background-color: #0c5795; width:5em"></i>Hapus</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        </tbody>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td valign="top">2.</td>
                                                <td style="color: #697a8d;">
                                                    <ul>
                                                        <li>Senin</li>
                                                        <li>Selasa</li>
                                                        <li>Rabu</li>
                                                        <li>Kamis</li>
                                                        <li>Jumat</li>
                                                    </ul>
                                                </td>
                                                <td style="color: #697a8d;">08:00</td>
                                                <td style="color: #697a8d;">12:00</td>
                                                <td style="color: #697a8d;">60</td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a role="button" class="btn btn-sm mb-3 text-white"
                                                                data-bs-toggle="modal" data-id=""
                                                                data-bs-target="#editPegawai"
                                                                style="color: #697a8d; background-color: #0c5795; width:5em"></i>Edit</a>
                                                        </li>
                                                        <li>
                                                            <a role="button" class="btn btn-sm text-white"
                                                                data-bs-toggle="modal" data-id=""
                                                                data-bs-target="#editPegawai"
                                                                style="color: #697a8d; background-color: #0c5795; width:5em"></i>Hapus</a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='praktek' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Riwayat Praktek</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah Riwayat
                                        Praktek</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;">Nomor Izin Praktek</td>
                                                <td style="color: #697a8d;font-weight: bold;">Provinsi</td>
                                                <td style="color: #697a8d;font-weight: bold;">Kota</td>
                                                <td style="color: #697a8d;font-weight: bold;">Status</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='pendidikan' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Riwayat Pendidikan</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah Riwayat
                                        Pendidikan</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;">Nama Instansi</td>
                                                <td style="color: #697a8d;font-weight: bold;">Tahun Mulai</td>
                                                <td style="color: #697a8d;font-weight: bold;">Jurusan</td>
                                                <td style="color: #697a8d;font-weight: bold;">Gelar</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='jabatan' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Riwayat Jabatan</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah Riwayat
                                        Jabatan</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;"> Instansi</td>
                                                <td style="color: #697a8d;font-weight: bold;">Spesialisasi</td>
                                                <td style="color: #697a8d;font-weight: bold;">Tahun jabatan</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='keluarga' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Riwayat Keluarga</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah Keluarga</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;"> Nama Keluarga</td>
                                                <td style="color: #697a8d;font-weight: bold;">Status Keluarga</td>
                                                <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='cv' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">CV Dokter</h6>
                                </div>
                            </div>
                            <div class="row justify-content-center" style="margin-bottom: 4em">
                                <div class="col-11">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="card" style=" margin-right: 2em">
                                                <h6 class="m-2">Profile</h6>
                                                <ul>
                                                    <li class=" d-flex justify-content-center"> <img src="assets/images/default-logo.png" width="300" height="300" alt="" srcset=""></li>
                                                </ul>
                                             </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="card">
                                                <h6 class="m-2">Profile Dokter Hisehat</h6>
                                                <ul class="p-2 m-3" style="line-height: 3em; ">
                                                    <li>Nama Lengkap : </li>
                                                    <li>Email        : </li>
                                                    <li>Hp           : </li>
                                                    <li style="margin-bottom: 4.8em">Alamat       : </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="row mt-5">
                                    <h6 class="p-3">Riwayat Praktek</h6>
                                    <div class="table-responsive text-nowrap p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                    <td style="color: #697a8d;font-weight: bold;"> Nomor Izin Praktek</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Provinsi</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Kota</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Status</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="row mt-5">
                                    <h6 class="p-3">Perjanjian Dokter</h6>
                                    <div class="table-responsive text-nowrap p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                    <td style="color: #697a8d;font-weight: bold;"> Nomor STR</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Nomor Kontrak</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Masa Berlaku</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="row mt-5">
                                    <h6 class="p-3">Riwayat Pendidikan</h6>
                                    <div class="table-responsive text-nowrap p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                    <td style="color: #697a8d;font-weight: bold;"> Nama Instansi</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Tahun Mulai</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Tahun Lulus</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Jurusan</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Gelar</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="row mt-5">
                                    <h6 class="p-3">Riwayat Jabatan</h6>
                                    <div class="table-responsive text-nowrap p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                    <td style="color: #697a8d;font-weight: bold;"> Instansi</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Spesialisasi</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Tahun Jabatan</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="row mt-5">
                                    <h6 class="p-3">Riwayat Keluarga</h6>
                                    <div class="table-responsive text-nowrap p-3">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                    <td style="color: #697a8d;font-weight: bold;"> Nama Keluarga</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Status Keluarga</td>
                                                    <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <tr>
                                                    <td>1.</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
    
                                                </tr>
    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div id='kontrakDokter' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Kontrak Dokter</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;"> Nomor STR</td>
                                                <td style="color: #697a8d;font-weight: bold;">Nomor Kontrak</td>
                                                <td style="color: #697a8d;font-weight: bold;">Masa Berlaku</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='noteDokter' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Note Dokter</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;"> Tanggal </td>
                                                <td style="color: #697a8d;font-weight: bold;">Keterangan</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div id='tugas' class='tab-pane'>
                            <div class="row d-flex justify-content-between">
                                <div class="col-6">
                                    <h6 class="m-3">Tugas</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a role="button" class="m-3  btn btn-sm text-white"
                                        style="color: #697a8d; background-color: #0c5795"></i>Tambah</a>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-end">
                                <div class="col-4" style=" margin-right: 1em">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari...">
                                        <span class="input-group-text"
                                            style="background-color: #0c5795; color: #fff">cari</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="table-responsive text-nowrap p-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <td style="color: #697a8d;font-weight: bold; width:10%">No. </td>
                                                <td style="color: #697a8d;font-weight: bold;"> Unit</td>
                                                <td style="color: #697a8d;font-weight: bold;">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>1.</td>
                                                <td></td>
                                                <td>
                                                    <a class="btn" style="background-color: #0c5795; color: #fff" href="">Delete</a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
               
            </div>
        </div>
       
    </div>
</div>
</div>
