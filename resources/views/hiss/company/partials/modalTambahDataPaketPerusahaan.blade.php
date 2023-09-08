
<!--modal Input-->
<form id="formPaketPerusahaan">
    <input type="hidden" id="frmDataPaketPerusahaan_action">
    <input type="hidden" id="frmDataPaketPerusahaan_id">
    <input type="hidden" id="txtKodeAsuransi" value="{{ session('user')['kode_user'] }}">
    <input type="hidden" id="txtKodePerusahaan" value="{{ $kode_perusahaan }}">
    <div class="modal fade" id="modalTambahDataPaketPerusahaan" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalInputLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                    <h1 class="modal-title fs-5 text-white pb-3">Tambah data Paket Asuransi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-color: #FFFFFF;">
                    <div class="row">
                        <div class="col-3">
                            <div class="m-1">
                                <label class=" col-form-label" for="inpEditProfile_nomorKontrak">Pilih Paket</label>

                                <select id="lstPaketAsuransi" class="form-control">
                                    <option value="0">-- Pilih Paket Asuransi --</option>                                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="m-1">
                                <label class=" col-form-label" for="inpEditProfile_nomorKontrak">No Kontrak</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="text" id="txtNoKontrakPaket">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="m-1">
                                <label class=" col-form-label" for="inpEditProfile_tglKontrak">Tanggal Kontrak</label>
                                            <input style=" border: 1px solid #0c5795;" class="form-control"
                                                type="date" id="txtTglKontrakPaket">
                            </div>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <div class="m-1">

                                <button type="button" id="btnTambahPaketPerusahaanmodal" class="form-control text-white" style="background-color: #0c5795; margin-top:33px;"><i class="fa fa-plus"></i>Tambah Paket</button>
                            </div>
                        </div>
                     
                    </div>
                    <div class="row">
                        <table class="mt-3 table table-sm" id="tblDaftarPaketPerusahaan">
                            <thead>
                                <tr>
                                    <th>Nama Paket</th>
                                    <th>No Kontrak</th>
                                    <th>Tanggal Kontrak</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btnNewPaketSubmit"
                        style="background: #0c5795; border-radius:5px;">Simpan</button>
                </div>

            </div>
        </div>
    </div>
   
</form>
