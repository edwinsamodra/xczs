<!-- Modal Edit Profile -->
{{-- <style>
  .modal-xl{
    width: 2000px !important;

  }
  .box:hover .inner_box {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
}

body>div.content {

width: 100%;
height: 100%;
display: block;
position: absolute;
top: 0;
z-index: 2;
}
body.modal-open>div.bg,
.modal-backdrop.fade.show {
  z-index: 1;
  -webkit-filter: blur(5px);
  filter: blur(5px);
    background-color: #e8e8e8d9;
}
.modalblur {
  margin: 20px;
  border-radius: 4px;
  background-color: rgba(255, 255, 255, 0.5);
  border: 1px solid rgba(255, 255, 255, 0.5);
  box-shadow: 2px 2px 0px 2px rgba(255, 255, 255, 0.6);
}
</style> --}}
<div class="modal fade" id="modalEditProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                <h1 class="modal-title fs-5 text-white pb-3" id="modalEditProfileLabel">Data Rumah Sakit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #FFFFFF;">
                <form id="frmEditProfile">
                    <input type="hidden" id="inpEditProfile_id_mt_klinik">
                    <input type="hidden" id="inpEditProfile_kode_klinik">
                    <input type="hidden" id="inpEditProfile_propinsi">
                    <input type="hidden" id="inpEditProfile_id_dc_propinsi">
                    <input type="hidden" id="inpEditProfile_id_dc_negara" value="62">
                    <input type="hidden" id="inpEditProfile_tgl_input">
                    <input type="hidden" id="inpEditProfile_id_dd_paket">
                    <input type="hidden" id="inpEditProfile_html_title">
                    <input type="hidden" id="inpEditProfile_logo_small" value="">

                    <!-- Perusahaan Asuransi -->
                    <div class="row">
                        <div class="col-xxl">
                            <div class="card shadow-none">
                                <div class="card-header shadow-none d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Data Rumah Sakit</h5>
                                </div>
                                <div class="card-body">

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-sm-5 col-form-label" for="inpEditProfile_nama_perusahaan">Nama Rumah Sakit</label>
                                                <div class="col-sm-12">
                                                    <input id="inpEditProfile_nama_perusahaan" type="text" class="form-control" style="border: 1px solid #0c5795; line" />
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-sm-5 col-form-label" for="inpEditProfile_nama_singkat">Nama Singkat</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inpEditProfile_nama_singkat" style="border: 1px solid #0c5795;" />
                                                </div>
                                            </div>                                            
                                        </div>                                        
                                    </div>                                    

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_nama_pimpinan">Nama Pimpinan</label>
                                                <input id="inpEditProfile_nama_pimpinan" type="text" class="form-control" style=" border: 1px solid #0c5795; line">                                                
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_website">Website</label>
                                                <input id="inpEditProfile_website" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <label class="col-form-label" for="inpEditProfile_alamat">Alamat</label>
                                            <div class="col-sm-12">
                                                <textarea id="inpEditProfile_alamat" style=" border: 1px solid #0c5795; line" class="form-control"></textarea>
                                            </div>
                                        </div>                                                                                
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelurahan">Kelurahan</label>
                                                <input type="text" class="form-control" style=" border: 1px solid #0c5795; line" id="inpEditProfile_kelurahan">
                                                <div id="kelurahan-list"></div>
                                                <div id="list-container" style="display:none;"></div>
                                                <input type="hidden" class="form-control" style=" border: 1px solid #0c5795; line" id="inpEditProfile_id_dc_kelurahan">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kecamatan">Kecamatan</label>
                                                <input id="inpEditProfile_kecamatan" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                <input id="inpEditProfile_id_dc_kecamatan" type="hidden" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kota">Kota</label>
                                                <input id="inpEditProfile_kota" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                <input id="inpEditProfile_id_dc_kota" type="hidden" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kode_pos">Kode POS</label>
                                                <input id="inpEditProfile_kode_pos" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- end Perusahaan Asuransi -->
                            <!-- start Kontak -->
                            <div class="col-xxl">
                                <div class="card mb-4 shadow-none">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="mb-0">Kontak</h5>
                                        <small class="text-muted float-end"></small>
                                    </div>
                                    <div class="card-body shadow-none">
                                        <div class="row row-cols-2  mb-3">
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_kontak_person">Kontak Person</label>
                                                    <input id="inpEditProfile_kontak_person" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_nomer_hp">Nomor HP</label>
                                                    <input id="inpEditProfile_nomer_hp" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_telpon">Nomor Telepon</label>
                                                    <input id="inpEditProfile_telpon" type="text" class="form-control"style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_fax">Nomor Fax</label>
                                                    <input id="inpEditProfile_fax" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_email">Email</label>
                                                    <input id="inpEditProfile_email" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>                                            

                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_notelp_humas">Nomor Telepon HUMAS</label>
                                                    <input id="inpEditProfile_notelp_humas" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>                                            
                                        </div>
                                        <div class="col-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Kontak -->
                        <!-- start Detail Perusahaan -->
                        <div class="col-xxl">
                            <div class="card mb-4 shadow-none">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Detail Perusahaan</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="card-body shadow-none">

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="inpEditProfile_tgl_registrasi">Tanggal Registrasi</label>
                                                <input id="inpEditProfile_tgl_registrasi" class="form-control" type="date" style="border: 1px solid #0c5795;">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_penyelenggara_klinik">Penyelenggara Klinik</label>
                                                <input id="inpEditProfile_penyelenggara_klinik" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_jenis_klinik">Jenis Klinik</label>
                                                <input id="inpEditProfile_jenis_klinik" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_klinik">Kelas Klinik</label>
                                                <input id="inpEditProfile_kelas_klinik" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_luas_tanah">Luas Tanah</label>
                                                <input id="inpEditProfile_luas_tanah" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_luas_bangunan">Luas Bangunan</label>
                                                <input id="inpEditProfile_luas_bangunan" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="col-12 mt-5">
                                        <h5>Perijinan</h5>
                                    </div>                                    

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_surat_izin">Surat Izin</label>
                                                <input id="inpEditProfile_surat_izin" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_nomor_izin">Nomor Izin</label>
                                                <input id="inpEditProfile_nomor_izin" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tanggal_izin">Tanggal Izin</label>
                                                <input id="inpEditProfile_tanggal_izin" type="date" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_masa_berlaku">Masa Berlaku</label>
                                                <input id="inpEditProfile_masa_berlaku" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_oleh_izin">Pemberi Izin</label>                                                
                                                <input id="inpEditProfile_oleh_izin" type="text" class="form-control" style=" border: 1px solid #0c5795; line">                                           
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_sifat_izin">Sifat Izin</label>
                                                <input id="inpEditProfile_sifat_izin" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_status_penyelenggara">Status Penyelenggara</label>
                                                <input id="inpEditProfile_status_penyelenggara" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="col-12 mt-5">
                                        <h5>Akreditas</h5>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_akreditas_rs">Akreditas RS</label>
                                                <input id="inpEditProfile_akreditas_rs" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_pentahapan_akreditas">Pentahapan Akreditas</label>
                                                <input id="inpEditProfile_pentahapan_akreditas" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_status_akreditas">Status AKreditas</label>
                                                <input id="inpEditProfile_status_akreditas" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tanggal_akreditas">Tanggal Akreditas</label>
                                                <input id="inpEditProfile_tanggal_akreditas" type="date" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_jumlah_tt">Jumlah Tempat Tidur</label>
                                                <input id="inpEditProfile_jumlah_tt" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_perinatologi">Ruang Perinatologi</label>
                                                <input id="inpEditProfile_perinatologi" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>                                        
                                    </div>

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_vvip">Kelas VVIP</label>
                                                <input id="inpEditProfile_kelas_vvip" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_vip">Kelas VIP</label>
                                                <input id="inpEditProfile_kelas_vip" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-3 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_i">Kelas I</label>
                                                <input id="inpEditProfile_kelas_i" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_ii">Kelas II</label>
                                                <input id="inpEditProfile_kelas_ii" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kelas_iii">Kelas III</label>
                                                <input id="inpEditProfile_kelas_iii" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row row-cols-3 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_ruang_isolasi">Ruang Isolasi</label>
                                                <input id="inpEditProfile_ruang_isolasi" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_ruang_ugd">Ruang UGD</label>
                                                <input id="inpEditProfile_ruang_ugd" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_ruang_bersalin">Ruang Bersalin</label>
                                                <input id="inpEditProfile_ruang_bersalin" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                    </div>                                    

                                    <div class="row row-cols-5 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_icu">ICU</label>
                                                <input id="inpEditProfile_icu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_picu">PICU</label>
                                                <input id="inpEditProfile_picu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_nicu">NICU</label>
                                                <input id="inpEditProfile_nicu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_hcu">HCU</label>
                                                <input id="inpEditProfile_hcu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_iccu">ICCU</label>
                                                <input id="inpEditProfile_iccu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-sm-5 col-form-label" for="inpEditProfile_nama_aplikasi">Nama Aplikasi</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inpEditProfile_nama_aplikasi" style="border: 1px solid #0c5795;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_jenis_app">Jenis Aplikasi</label>
                                                <input id="inpEditProfile_jenis_app" type="text" class="form-control" style=" border: 1px solid #0c5795; line">                                                
                                            </div>
                                        </div>                          
                                    </div>                                    

                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_jenis_pklu">Jenis PKLU</label>
                                                <input id="inpEditProfile_jenis_pklu" type="text" class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>                                            
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="inpEditProfile_keterangan">Keterangan</label>
                                                <input id="inpEditProfile_keterangan" type="text" class="form-control" style="border: 1px solid #0c5795; line">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="m-1">
                                            <label for="inpEditProfile_logo" class="form-label">Logo</label>
                                            <input id="inpEditProfile_logo" type="file" class="form-control" style="border: 1px solid #0c5795; background-color:#FFFFFF">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--end Detail Perusahaan -->
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnEditProfile_save" style="background: #0c5795; border-radius:5px;">Simpan</button>
            </div>
        </div><!-- /.modal-body -->

    </div>
</div>
</div>
