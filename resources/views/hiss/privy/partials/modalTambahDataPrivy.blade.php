
<input type="hidden" id="frmDataPrivy_action">
<input type="hidden" id="frmDataPrivy_id">
<!--modal Input-->
<div class="modal fade" id="modalTambahDataPrivy" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#0c5795;">
        <h5 class="modal-title text-white" id="modalInputLabel" style="margin-bottom:0.8em;"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card mb-4">
          <div class="card-body">
            <div class="mb-3 row">
              <label for="txtNama" class="col-md-2 col-form-label">Nama</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Nama" id="txtNama" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="txtNomorPolis" class="col-md-2 col-form-label">No Polis</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="No Polis" id="txtNomorPolis" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="txtAlamat" class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Alamat" id="txtAlamat" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="txtTanggalLahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                {{-- <input class="form-control" placeholder="dd-mm-yyyy" type="text" id="txtTanggalLahir_copy" /> --}}
                <input class="form-control" type="date" placeholder="" id="txtTanggalLahir" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="dlgLstJenisKelamin" class="col-md-2 col-form-label">Jenis Kelamin</label>
              <div class="col-md-10">
                <select class="form-control" id="dlgLstJenisKelamin">
                <option value="0" selected>-- Pilih Jenis Kelamin --</option>
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="dlgLstMembershipType" class="col-md-2 col-form-label">Membership</label>
              <div class="col-md-10">
                <select class="form-control" id="dlgLstMembershipType">
                <option value="0" selected>-- Pilih Membership --</option>
                <option value="1">Personal</option>
                <option value="2">Corporate</option>
                </select>
              </div>
            </div>

          </div>
        </div>
      <!--end content-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="border-radius:5px;" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="btnNewPrivySubmit" style="background-color: #0c5795; border-radius:5px;"></button>
      </div>
    </div>
  </div>
</div>
