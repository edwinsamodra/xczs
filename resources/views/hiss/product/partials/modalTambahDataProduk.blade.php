<!--modal Input-->
<input type="hidden" id="frmDataProduk_action">
<input type="hidden" id="frmDataProduk_id">
<div class="modal fade" id="modalTambahDataProduk" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
                <h5 class="modal-title text-white" id="modalInputLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                    <div class="card-body">                        
                        <div class="mb-3 row">
                            <label for="txtNamaProduk" class="col-md-2 col-form-label">Nama Produk</label>
                            <div class="col-md-10">
                                <input name="nama_produk" class="form-control" type="text" placeholder="Nama Produk" id="txtNamaProduk" />
                            </div>
                        </div>                                               
                    </div>
                </div>
                <!--end content-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btnNewProductSubmit" style="background: #0c5795; border-radius:5px;">Simpan</button>
            </div>
        </div>
    </div>
</div>
