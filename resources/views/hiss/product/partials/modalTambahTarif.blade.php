<!--modal Input-->
<input type="hidden" id="frmDataTarif_action">
<input type="hidden" id="frmDataTarif_id">
<div class="modal fade" id="modalTambahTarif" tabindex="-1" aria-labelledby="modalInputLabelTarif" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
                <h5 class="modal-title text-white" id="modalInputLabelTarif"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                    <div class="card-body">                        
                        <div class="mb-3 row">
                            <label for="txtBagian" class="col-md-2 col-form-label">Bagian</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Bagian" id="txtBagian" />
                            </div>
                        </div>                                               
                        <div class="mb-3 row">
                            <label for="txtTarif" class="col-md-2 col-form-label">Tarif</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Tarif" id="txtTarif" />
                            </div>
                        </div>                                               
                        <div class="mb-3 row">
                            <label for="txtKlinik" class="col-md-2 col-form-label">Klinik</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Klinik" id="txtKlinik" />
                            </div>
                        </div>                                               
                        <div class="mb-3 row">
                            <label for="txtDokter" class="col-md-2 col-form-label">Dokter</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" placeholder="Dokter" id="txtDokter" />
                            </div>
                        </div>                                               
                    </div>
                </div>
                <!--end content-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" id="btnNewTarifSubmit" class="btn btn-primary" style="background: #0c5795; border-radius:5px;"></button>
            </div>
        </div>
    </div>
</div>
