<style>
button {
  padding: 1.3em 3em;
  font-size: 12px;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
}

button:hover {
  background-color: #23c483;
  box-shadow: 0px 15px 20px #F6F8FA;
  color: #fff;
  transform: translateY(-7px);
}

button:active {
  transform: translateY(-1px);
}
  </style>


<input type="hidden" id="frmTambahDataKeluarga_member_action">
<input type="hidden" id="frmTambahDataKeluarga_member_id">
<!--modal Input-->
<div class="modal fade" id="modalTambahDataKeluarga" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#0c5795;">
        <h5 class="modal-title text-white pb-3" id="modalInputLabel">Keluarga Peserta Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card mb-4">
          <div class="card-body">
          {{-- <input type="hidden" id="frmTambahDataKeluarga_member_id"> --}}
            <div class="mb-3 row">
              <label for="nama_keluarga" class="col-md-2 col-form-label">Nama Keluarga</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Nama" id="nama_keluarga" />
              </div>
            </div>
            <div class="mb-3 row">
              <label for="listhubungankeluarga" class="col-md-2 col-form-label">Hubungan Keluarga</label>
              <div class="col-md-10">
                  <select name="kd_perusahaan" class="form-control" id="lstHubunganKeluarga"></select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="listkaryawanperusahaan" class="col-md-2 col-form-label">Karyawan Perusahaan</label>
              <div class="col-md-10">
                  <select name="kd_perusahaan" class="form-control" id="listkaryawanperusahaan">
                      <option value="0">-- Karyawan Perusahaan --</option>
                      @foreach ($karyawanperusahaan as $karyawanperusahaans)
                          <option value="{{ $karyawanperusahaans->kd_Karyawan }}">{{ $karyawanperusahaans->nama_Karyawan }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            {{-- <div class="mb-3 row">
              <label for="frmTambahDataKeluarga_hubungan_keluarga" class="col-md-2 col-form-label">Hubungan Keluarga</label>
              <div class="col-md-10">
                <select class="form-control" id="hubungan_keluarga"></select>
              </div>
            </div> --}}
            <!-- div class="mb-3 row">
              <label for="frmTambahDataKeluarga_alamat" class="col-md-2 col-form-label">Alamat</label>
              <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Alamat" id="frmTambahDataKeluarga_alamat" />
              </div>
            </div -->
            <div class="mb-3 row">
              <label for="tanggal_lahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
              <div class="col-md-10">
                <input type="date" class="form-control" id="tanggal_lahir" />
              </div>
            </div>
            
            <div class="mb-3 row">
              <label for="listgender" class="col-md-2 col-form-label">Jenis Kelamin</label>
              <div class="col-md-10">
                  <select name="id_dc_gender" class="form-control" id="listgender">
                      <option value="0">-- Jenis Kelamin --</option>
                      @foreach ($gender as $genders)
                          <option value="{{ $genders->id_dc_gender }}">{{ $genders->gender }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="listagama" class="col-md-2 col-form-label">Agama</label>
              <div class="col-md-10">
                  <select name="id_dc_agama" class="form-control" id="listagama">
                      <option value="0">-- Agama --</option>
                      @foreach ($agama as $agamas)
                          <option value="{{ $agamas->id_dc_agama }}">{{ $agamas->agama }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="listgoldarah" class="col-md-2 col-form-label">Golongan Darah</label>
              <div class="col-md-10">
                  <select name="id_dc_gol_darah" class="form-control" id="listgoldarah">
                      <option value="0">-- Golongan Darah --</option>
                      @foreach ($goldarah as $goldarahs)
                          <option value="{{ $goldarahs->id_dc_gol_darah }}">{{ $goldarahs->golongan_darah }}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="Alergi" class="col-md-2 col-form-label">Alergi</label>
              <div class="col-md-10">
                <input type="text" placeholder="Alergi" class="form-control" id="txtAlergi" />
              </div>
            </div>
          </div>
        </div>      
      <!--end content-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnTambahKeluargaSubmit" style="background: #0c5795; border-radius:5px;">Simpan</button>  
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>