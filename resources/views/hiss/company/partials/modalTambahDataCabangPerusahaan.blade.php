
<!--modal Input-->
<form id="formcabangperusahaan">
<input type="hidden" id="frmDataCabangPerusahaan_action">
<input type="hidden" id="frmDataCabangPerusahaan_id">
<div class="modal fade" id="modalTambahDataCabangPerusahaan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
                <h5 class="modal-title text-white pb-3" id="modalInputLabelcabang"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xxl">
                      <div class="card shadow-none">
                        <div class="card-header shadow-none d-flex align-items-center justify-content-between">
                          <h5 class="mb-0">Cabang Perusahaan</h5>
                          <small class="text-muted float-end"></small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                              <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama Cabang Perusahaan</label>
                              <div class="col-sm-12">
                                <input type="text" class="form-control" id="txtNamaCabangPerusahaan" style="border: 1px solid #0c5795;"/>
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-sm-5 col-form-label" for="inpEditProfile_namaAsuransi">Nama Pemimpin</label>
                              <div class="col-sm-12">
                                <input
                                  type="text"
                                  class="form-control"
                                  id="txtPimpinan" style="border: 1px solid #0c5795;" 
                                />
                              </div>
                            </div>
                            <div class="row mb-3">
                              <label class="col-form-label" for="trix-alamat">Alamat</label>
                              <div class="col-sm-12">
                                <textarea
                                  id="txtAlamat"
                                  style=" border: 1px solid #0c5795;"
                                  class="form-control"
                                  aria-describedby="basic-icon-default-message2"
                                ></textarea>
                              </div>
                            </div>
                            <div class="row row-cols-2  mb-3">
                              <div class="col">
                                <div class="m-1">
                                  <label class="col-form-label" for="inpEditProfile_kelurahan">Kelurahan</label>
                                  <input type="text" class="form-control" style="border: 1px solid #0c5795;" id="txtKelurahan">
                                  <input type="hidden" class="form-control"  id="txtidkelurahan">
                                  <div id="kelurahan-list"></div >
                                  <div id="list-container" style="display:none;"></div>
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label"  for="inpEditProfile_kecamatan">Kecamatan</label>
                                  <input type="text" class="form-control" style="border: 1px solid #0c5795;" id="txtKecamatan">
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label" for="inpEditProfile_kota">Kota</label>
                                  <input type="text" class="form-control" style="border: 1px solid #0c5795;" id="txtKota">
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label" for="inpEditProfile_kodepos">Kode POS</label>
                                  <input type="text" class="form-control" style=" border: 1px solid #0c5795;" id="txtKodePos">
                                </div>
                              </div>
                              <div class="col-12">
                                  <div class="m-1">
                                    <label class=" col-form-label" for="inpEditProfile_tglNIB">Kode Perusahaan</label>
                                    <input
                                    style=" border: 1px solid #0c5795;"
                                    class="form-control"
                                    type="text"
                                    id="txtKodePerusahaan"
                                    disabled>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- end Perusahaan Asuransi -->
                        <!-- start Kontak -->
                      
                    </div>
                     <!-- end Kontak -->
                    <!-- start Detail Perusahaan -->
                    <div class="col-xxl">
                      <div class="card mb-4 shadow-none">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h5 class="mb-0">Kontak</h5>
                          <small class="text-muted float-end"></small>
                        </div>
                        <div class="card-body shadow-none">
                            <div class="row row-cols-2 mb-3">
                              
                              <div class="col" hidden>
                                  <div class="m-1">
                                    <label class="col-form-label" for="inpEditProfile_tglNIB">Kode Asuransi</label>
                                    <input
                                    style="border: 1px solid #0c5795;"
                                    class="form-control"
                                    type="text"
                                    value="{{ session('user')['kode_user'] }}">
                                  </div>
                                </div>
                            </div>
                            <div class="row row-cols-2  mb-3">
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label"  for="inpEditProfile_telepon1">Telepon 1</label>
                                  <input type="text" class="form-control"style=" border: 1px solid #0c5795;" id="txtTelepon1">
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label" for="inpEditProfile_telepon2">Telepon 2</label>
                                  <input type="text" class="form-control" style=" border: 1px solid #0c5795;" id="txtTelepon2">
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label" for="inpEditProfile_kontakPerson1">Kontak Person 1</label>
                                  <input type="text" class="form-control" style=" border: 1px solid #0c5795;" id="txtKontakPerson1">
                                </div>
                              </div>
                              <div class="col">
                                <div class="m-1">
                                  <label class=" col-form-label" for="inpEditProfile_kontakPerson2">Kontak Person 2</label>
                                  <input type="text" class="form-control" style=" border: 1px solid #0c5795;" id="txtKontakPerson2">
                                </div>
                              </div>
                              <div class="col-12">
                            <div class="col mb-3">
                            <label class=" col-form-label" for="inpEditProfile_hp">Hp</label>
                            <input type="text" class="form-control" style=" border: 1px solid #0c5795;" id="txtHP">
                          </div>
                          </div>
                          </div>
                        </div>
                      </div>
                    <!--end Detail Perusahaan -->
                  </div>
                <!--end content-->
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnNewCabangMitraSubmit" style="background: #0c5795; border-radius:5px;">Simpan</button>
            </div>
        </div>
    </div>
</div>
</form>
