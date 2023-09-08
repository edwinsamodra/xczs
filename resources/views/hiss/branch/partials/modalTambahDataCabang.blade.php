
<form id="formcabangasuransi">

    <input type="hidden" id="frmDataCabang_action" />
    <input type="hidden" id="frmDataCabang_id" />

    <div class="modal fade" id="modalTambahdataCabang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                    <h1 class="modal-title fs-5 text-white pb-3" id="modalInputLabel">Tambah Data Cabang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #FFFFFF;">
                    <!-- Perusahaan Asuransi -->
                    <div class="row">
                        <div class="col-xxl">
                            <div class="card shadow-none">
                                <div class="card-header shadow-none d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Cabang Asuransi</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="card-body">

                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="nama_cabang">Nama Cabang</label>
                                        <div class="col-sm-12">
                                            <input name="nama_cabang" class="form-control" type="text"
                                                placeholder="Nama cabang" id="txtNamaCabang"
                                                style="border: 1px solid #0c5795; line" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama
                                            Pemimpin Cabang</label>
                                        <div class="col-sm-12">
                                            <input name="nama_pimpinan" type="text" placeholder="Nama pimpinan"
                                                class="form-control" id="txtNamaPimpinan"
                                                style=" border: 1px solid #0c5795; line" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-form-label" for="trix-alamat">Alamat</label>
                                        <div class="col-sm-12">
                                            <textarea name="alamat" id="txtAlamat" placeholder="Alamat" style=" border: 1px solid #0c5795;" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row row-cols-2  mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label"
                                                    for="inpEditProfile_kelurahan">Kelurahan</label>
                                                <input type="text" name="kelurahan" placeholder="Kelurahan"
                                                    id="txtKelurahan" class="form-control"
                                                    style=" border: 1px solid #0c5795; line" />
                                                <input name="idkelurahan" data-id="" class="form-control"
                                                    type="hidden" id="txtidkelurahan" />
                                                    <div id="kelurahan-list"></div >
                                                    <div id="list-container" style="display:none;"></div>                      
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label"
                                                    for="inpEditProfile_kecamatan">Kecamatan</label>
                                                <input type="text" name="kota" placeholder="Kecamatan"
                                                    class="form-control" style=" border: 1px solid #0c5795; line"
                                                    id="txtKecamatan" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kota">Kota</label>
                                                <input type="text" name="kota" class="form-control"
                                                    placeholder="Kota" style=" border: 1px solid #0c5795; line"
                                                    id="txtKota" />
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_kodepos">Kode
                                                    POS</label>
                                                <input type="text" name="kode_pos" placeholder="Kode pos" class="form-control"
                                                    style=" border: 1px solid #0c5795; line" id="txtKodePos" />
                                            </div>
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
                                                    <input type="text" name="telepon1"
                                                        class="form-control"style=" border: 1px solid #0c5795; line"
                                                        placeholder="Telepon 1" id="txtTelepon1" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_telepon2">Telepon 2</label>
                                                    <input type="text" name="telepon2" class="form-control"
                                                        placeholder="Telepon 2"
                                                        style=" border: 1px solid #0c5795; line" id="txtTelepon2" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson1">Kontak Person 1</label>
                                                    <input type="text" name="kontakperson1" class="form-control"
                                                        placeholder="Kontak person 1"
                                                        style=" border: 1px solid #0c5795; line"
                                                        id="txtKontakPerson1" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="m-1">
                                                    <label class=" col-form-label"
                                                        for="inpEditProfile_kontakPerson2">Kontak Person 2</label>
                                                    <input type="text" class="form-control"
                                                        style=" border: 1px solid #0c5795; line"
                                                        name="kontakperson2"
                                                        placeholder="Kontak Person 2" id="txtKontakPerson2" />
                                                </div>
                                            </div>
                                        <div class="col-12">
                                        <div class="m-1">
                                            <label class=" col-form-label" for="inpEditProfile_hp">Hp</label>
                                            <input type="text" class="form-control" name="hp"
                                                placeholder="Hp" style=" border: 1px solid #0c5795; line"
                                                id="txtHP" />
                                                </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="col mb-3">
                                            <label class=" col-form-label" for="inpEditProfile_hp">Alamat Tagihan</label>
                                            <textarea class="form-control" name="alamattagihan"
                                                placeholder="Alamat Tagihan" style="border: 1px solid #0c5795; line"
                                                id="txtAlamatTagihan"></textarea>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Kontak -->
                        <!-- start Detail Perusahaan -->
                        <!-- div class="col-xxl">
                            <div class="card mb-4 shadow-none">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0">Detail Perusahaan</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="card-body shadow-none">
                                    <div class="row row-cols-2 mb-3">
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tglNIB">Tanggal
                                                    Daftar</label>
                                                <input name="tanggalDaftar" style=" border: 1px solid #0c5795; line"
                                                    class="form-control" type="date" id="txtTglDaftar"
                                                    placeholder="Tanggal daftar" />
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class=" col-form-label" for="inpEditProfile_tglNIB">Tanggal
                                                    NIB</label>
                                                <input name="tanggalnib" style=" border: 1px solid #0c5795; line" class="form-control"
                                                    type="date" id="txtTglNIB" placeholder="Tanggal NIB">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="inpEditProfile_tglNIB">Nomor
                                                    NIB</label>
                                                <input class="form-control" type="text"
                                                    name="txtNomorNIB"
                                                    style=" border: 1px solid #0c5795; line" id="txtTglNIB"
                                                    placeholder="Nomor NIB" />
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="txtJenisAsuransi">Jenis
                                                    Asuranasi</label>
                                                <input class="form-control" type="text"
                                                    name="jenisasuransi"
                                                    style=" border: 1px solid #0c5795; line" id="txtJenisAsuransi"
                                                    placeholder="Jenis asuransi" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="txtKodeGroup">Kode Group</label>
                                                <input class="form-control" type="text"
                                                    name="kodegroup"
                                                    style=" border: 1px solid #0c5795; line" id="txtKodeGroup"
                                                    placeholder="Kode group" />
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="m-1">
                                                <label class="col-form-label" for="txtJenisKerjasama">Jenis
                                                    Kerjasama</label>
                                                <input class="form-control" type="text"
                                                    name="jeniskerjasama"
                                                    style=" border: 1px solid #0c5795; line" id="txtJenisKerjasama"
                                                    placeholder="Jenis Kerjasama" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label class=" col-form-label" for="txtAlamatTagihan">Alamat Tagihan</label>
                                        <textarea type="text" name="alamattagihan" class="form-control" placeholder="Alamat tangihan" style=" border: 1px solid #0c5795; line"
                                            id="txtAlamatTagihan"></textarea>
                                    </div>
                                    <div class="colmb-3">
                                        <label for="logo" class="form-label">Logo</label>
                                        <input type="file" class="form-control"
                                            name="jeniskerjasama"
                                            style="border: 1px solid #0c5795; background-color:#FFFFFF;"
                                            placeholder="Pilih" id="logo" />
                                    </div>
                                </div>
                            </div>
                        </div -->
                        <!--end Detail Perusahaan -->

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnNewBranchSubmit" style="background: #0c5795; border-radius:5px;">Simpan</button>
                </div>
                </div><!-- /.modal-body -->
              
            </div>
        </div>
    </div>
</form>
