
<!--modal Input-->
<form id="formPerusahaan">
    <input type="hidden" id="frmDataPerusahaan_action">
    <input type="hidden" id="frmDataPerusahaan_id">
    <input type="hidden" id="txtKodeAsuransi" value="{{ session('user')['kode_user'] }}">
    <div class="modal fade" id="modalTambahDataPerusahaan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalInputLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                    <h1 class="modal-title fs-5 text-white pb-3" id="modalInputLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #FFFFFF;">
                    <!-- Perusahaan Asuransi -->
                    <div class="row">
                        <div class="col-xxl">
                            <div class="card shadow-none">
                                <div class="card-header shadow-none d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Perusahaan</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama
                                            Perusahaan</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="txtNamaPerusahaan"
                                                style="border: 1px solid #0c5795;" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama
                                            Pemimpin</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="txtPimpinan"
                                                style="border: 1px solid #0c5795;" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label" for="trix-alamat">Alamat</label>
                                        <div class="col-sm-12">
                                            <textarea id="txtAlamat" style=" border: 1px solid #0c5795;" class="form-control"
                                                aria-describedby="basic-icon-default-message2"></textarea>
                                        </div>
                                    </div>
                                    <div class="row row-cols-2  mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label"
                                                    for="inpEditProfile_kelurahan">Kelurahan</label>
                                                <input type="text" class="form-control"
                                                    style="border: 1px solid #0c5795;" id="txtKelurahan">
                                                <input type="hidden" class="form-control" id="txtidkelurahan">

                                                <div id="kelurahan-list"></div>
                                                <div id="list-container" style="display:none;"></div>

                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label"
                                                    for="inpEditProfile_kecamatan">Kecamatan</label>
                                                <input type="text" class="form-control"
                                                    style="border: 1px solid #0c5795;" id="txtKecamatan">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kota">Kota</label>
                                                <input type="text" class="form-control"
                                                    style="border: 1px solid #0c5795;" id="txtKota">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kodepos">Kode
                                                    POS</label>
                                                <input type="text" class="form-control"
                                                    style=" border: 1px solid #0c5795;" id="txtKodePos">
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
                                                    <input type="text"
                                                        class="form-control"style=" border: 1px solid #0c5795;"
                                                        id="txtTelepon1">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_telepon2">Telepon 2</label>
                                                    <input type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795;" id="txtTelepon2">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson1">Kontak Person 1</label>
                                                    <input type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795;" id="txtKontakPerson1">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson2">Kontak Person 2</label>
                                                    <input type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795;" id="txtKontakPerson2">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="m-1">
                                                    <label class=" col-form-label" for="inpEditProfile_hp">Hp</label>
                                                    <input type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795;" id="txtHP">
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
                                    <div class="col">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_kodePerusahaan">Kode
                                                Perusahaan</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="text" id="txtKodePerusahaan">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="m-1">
                                            <label class="col-form-label" for="inpEditProfile_kodeAsuransi" hidden>Kode
                                                Asuransi</label>
                                            <input style="border: 1px solid #0c5795;" class="form-control"
                                                type="hidden" id="txtKodeAsuransi"
                                                value="{{ session('user')['kode_user'] }}">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_tglNIB">Tanggal
                                                NIB</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="date" id="txtTglNIB">
                                        </div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="m-1">
                                            <label class="col-form-label" for="inpEditProfile_tglDaftar">Tanggal
                                                Daftar</label>
                                            <input style="border: 1px solid #0c5795;" class="form-control"
                                                type="date" id="txtTglDaftar">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_nomorKontrak">No Kontrak</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="text" id="txtNoKontrak">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_tglKontrak">Tanggal Kontrak</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="date" id="txtTglKontrak">
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_alamatTagihan">Alamat
                                                Tagihan</label>
                                            <input type="text" class="form-control"
                                                style=" border: 1px solid #0c5795;" id="txtAlamatTagihan">
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_jenis_kerjasama">Jenis
                                                Kerjasama</label>
                                            <input type="text" class="form-control"
                                                style=" border: 1px solid #0c5795;" id="txtJenisKerjasama">
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <div class="m-1">
                                            <label for="inpEditProfile_logo" class="form-label"><a data-image="" href="#" id="lnk_modalTambahDataPerusahaan_previewLogo">Logo</a></label>
                                            <input type="file" class="form-control"
                                                style="border: 1px solid #0c5795; background-color:#FFFFFF" 
                                                id="logo">
                                        </div>
                                    </div>

                                  

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end Detail Perusahaan -->
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnNewCompanySubmit"
                        style="background: #0c5795; border-radius:5px;">Simpan</button>
                </div>

            </div>
        </div>
    </div>
    </div>
</form>
