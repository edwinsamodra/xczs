<!--modal Input-->
<input type="hidden" id="frmDataProvider_action">
<input type="hidden" id="frmDataProvider_id">
<div class="modal fade" id="modalTambahDataProvider" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
          <h5 class="modal-title text-white" id="modalInputLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="card mb-2">
            <div class="card-body">
            <div class="mb-3 row">
                <label for="txtNama" class="col-md-3 col-form-label">Provider</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Nama Provider" id="txtNama" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="txtAlamat" class="col-md-3 col-form-label">Alamat</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Alamat" id="txtAlamat" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="txtNomorTelepon" class="col-md-3 col-form-label">Nomor Telepon</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Nomor Telepon" id="txtNomorTelepon" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="txtContactPerson" class="col-md-3 col-form-label">Contact Person</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" placeholder="Contact Person" id="txtContactPerson" />
                </div>
              </div>
              <div class="mb-3 row">
                <label for="lstPartnershipScheme" class="col-md-3 col-form-label">Skema Kerjasama</label>
                <div class="col-md-9">
                  <select class="form-control" id="lstPartnershipScheme">
                    <option value="0">-- Pilih Skema Kerjasama --</option>
                    @foreach($partnershipSchemes as $partnershipScheme)
                      <option value="{{ $partnershipScheme->id }}">{{ $partnershipScheme->name }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>
              <div class="mb-2 row">
                <label for="lstProviderCategory" class="col-md-3 col-form-label">Kategori Provider</label>
                <div class="col-md-9">
                  <select class="form-control" id="lstProviderCategory">
                    <option value="0">-- Pilih Kategori Provider --</option>
                    @foreach($providerCategories as $providerCategory)
                      <option value="{{ $providerCategory->id }}">{{ $providerCategory->name }}</option>
                    @endforeach 
                  </select>
                </div>
              </div>              
              <div class="form-check row d-flex">
                <div class="col-md-3">&nbsp;</div>
                <div class="col-md-2">
                  <input class="form-check-input" type="checkbox" id="chkIsActive">
                  <label class="form-check-label" for="flexCheckDefault">
                    Activate
                  </label>
                </div>
              </div>
              
            </div>
          </div>      
        <!--end content-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="btnNewProviderSubmit" style="background: #0c5795; border-radius:5px;">Tambah Provider</button>
        </div>
      </div>
    </div>
  </div>