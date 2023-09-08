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
<div class="modal fade" id="modalEditProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                <h1 class="modal-title fs-5 text-white pb-3" id="staticBackdropLabel">Data Perusahaan Asuransi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #FFFFFF;">
                <form id="frmEditProfile">
                    <input type="hidden" id="inpEditProfile_kodeAsuransi" value="{{ session('user')['kode_user'] }}">
                    <!-- Perusahaan Asuransi -->
                    <div class="row">
                        <div class="col-xxl">
                            <div class="card shadow-none">
                                <div class="card-header shadow-none d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Perusahaan Asuransi</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama
                                            Asuransi</label>
                                        <div class="col-sm-12">
                                            <input id="inpEditProfile_namaAsuransi" type="text" class="form-control"
                                                style="border: 1px solid #0c5795; line" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="inpEditProfile_namaPimpinan">Nama
                                            Pemimpin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="inpEditProfile_namaPimpinan"
                                                style=" border: 1px solid #0c5795; line"" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label" for="trix-alamat">Alamat</label>
                                        <div class="col-sm-12">
                                            <textarea id="inpEditProfile_alamat" style=" border: 1px solid #0c5795; line" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row row-cols-2  mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label"
                                                    for="inpEditProfile_kelurahan">Kelurahan</label>
                                                <input type="text" class="form-control"
                                                    style=" border: 1px solid #0c5795; line"
                                                    id="inpEditProfile_kelurahan">
                                                <div id="kelurahan-list"></div>
                                                <div id="list-container" style="display:none;"></div>
                                                <input type="hidden" class="form-control"
                                                    style=" border: 1px solid #0c5795; line"
                                                    id="inpEditProfile_idkelurahan">
                                            </div>
                                        </div>
                                        
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label"
                                                    for="inpEditProfile_kecamatan">Kecamatan</label>
                                                <input id="inpEditProfile_kecamatan" type="text" class="form-control"
                                                    style=" border: 1px solid #0c5795; line">
                                                <input id="inpEditProfile_idkecamatan" type="hidden"
                                                    class="form-control" style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kota">Kota</label>
                                                <input id="inpEditProfile_kota" type="text" class="form-control"
                                                    style=" border: 1px solid #0c5795; line">
                                                <input id="inpEditProfile_idkota" type="hidden" class="form-control"
                                                    style=" border: 1px solid #0c5795; line">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kodepos">Kode
                                                    POS</label>
                                                <input id="inpEditProfile_kodepos" type="text" class="form-control"
                                                    style=" border: 1px solid #0c5795; line">
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
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_telepon1">Telepon 1</label>
                                                    <input id="inpEditProfile_telepon1" type="text"
                                                        class="form-control"style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_telepon2">Telepon 2</label>
                                                    <input id="inpEditProfile_telepon2" type="text"
                                                        class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson1">Kontak Person 1</label>
                                                    <input id="inpEditProfile_kontakPerson1" type="text"
                                                        class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson2">Kontak Person 2</label>
                                                    <input id="inpEditProfile_kontakPerson2" type="text"
                                                        class="form-control" style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_hp">HP</label>
                                                    <input id="inpEditProfile_hp" type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795; line">
                                                </div>
                                            </div>
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
                                    <div class="col  mb-3">
                                        <label class=" col-form-label" for="inpEditProfile_noSuratKontrak">Nomor Surat Kontrak</label><input id="inpEditProfile_noSuratKontrak" type="text" class="form-control" style=" border: 1px solid #0c5795; line" disabled>
                                    </div>
                                    <div class="row row-cols-2 mb-3">
                                      <div class="col">
                                        <div class="m-1">
                                            <label class="col-form-label" for="inpEditProfile_tglKontrak">Tanggal
                                                Kontrak</label>
                                            <input id="inpEditProfile_tglKontrak" class="form-control"
                                                type="date" style=" border: 1px solid #0c5795; line" disabled>
                                        </div>
                                      </div>

                                      <div class="col">
                                        <div class="m-1">
                                            <label class="col-form-label" for="inpEditProfile_tglExpired">Tanggal
                                                Expired</label>
                                            <input id="inpEditProfile_tglExpired" class="form-control"
                                                type="date" style=" border: 1px solid #0c5795; line" disabled>
                                        </div>
                                    </div>                                      

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tglNIB">Tanggal
                                                    NIB</label>
                                                <input id="inpEditProfile_tglNIB"
                                                    style=" border: 1px solid #0c5795; line" class="form-control"
                                                    type="date">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tglDaftar">Tanggal
                                                    Daftar</label>
                                                <input style=" border: 1px solid #0c5795; line" class="form-control"
                                                    type="date" id="inpEditProfile_tglDaftar">
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="col-12">
                                                <div class="m-1">
                                        <label class=" col-form-label" for="inpEditProfile_alamatTagihan">Alamat
                                            Tagihan</label>
                                        <input id="inpEditProfile_alamatTagihan" type="text" class="form-control"
                                            style=" border: 1px solid #0c5795; line">
                                    </div>
                                    </div>
                                    <div class="col-12">
                                                <div class="m-1">
                                        <label class=" col-form-label" for="inpEditProfile_jenisKerjasama">Jenis
                                            Kerjasama</label>
                                        <input id="inpEditProfile_jenisKerjasama" type="text"
                                            class="form-control" style=" border: 1px solid #0c5795; line">
                                    </div>
                                    </div>
                                    <div class="col-12">
                                                <div class="m-1">
                                        <label for="inpEditProfile_logo" class="form-label">Logo</label>
                                        <input id="inpEditProfile_logo" type="file" class="form-control"
                                            style="border: 1px solid #0c5795; background-color:#FFFFFF">
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
                <button type="button" class="btn btn-primary" id="btnEditProfile_save"
                    style="background: #0c5795; border-radius:5px;">Simpan</button>
            </div>
            </div><!-- /.modal-body -->
           
        </div>
    </div>
</div>
