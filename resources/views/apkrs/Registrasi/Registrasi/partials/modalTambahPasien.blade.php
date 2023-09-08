
<input type="hidden" id="frmDialogTambahPasien_action">
<input type="hidden" id="frmDialogTambahPasien_id">
<!--modal Input-->
<div class="modal fade" id="modalTambahPasien" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#0c5795;  padding-bottom:1.2em;">
        <h5 class="modal-title text-white mb-2" id="modalInputLabel">Daftar Pasien Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalTambahPasien_content">
        <div class="row row-cols-2">
          <div class="col">
            <h4>Data Pasien</h4>
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="namaPasien">Nama Pasien</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="namaPasien" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <h4>Detail Pasien</h4>
            <div class="row row-cols-2">
                <label class="col-12 col-form-label" for="TipeSubmitPasien">Tipe Submit Pasien</label>
                <div class="col">
                    <div class="col-sm-12">
                        <button class="form-control btn btn-md text-white" id="take" style="background-color: #0c5795">Ambil Foto</button>
                    </div>
                </div>
                <div class="col">
                    <div class="col-sm-12">
                        <button class="form-control btn btn-md text-white" style="background-color: #0c5795">Unggah Foto</button>
                    </div>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="genderPasien">Jenis Kelamin</label>
                <select name="gender" class="form-control" id="listgenderPasien" style="border: 1px solid #0c5795;">
                    <option value="0">-- Jenis Kelamin --</option>
                    @foreach ($gender as $genders)
                    <option value="{{ $genders->id_dc_gender }}">{{ $genders->gender }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="jenisPasien">Jenis Pasien</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="jenisPasien" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row row-cols-2">
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="tempatLahirPasien">Tempat Lahir</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="tempatLahirPasien" style="border: 1px solid #0c5795;"/>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="tanggalLahirPasien">Tanggal Lahir</label>
                        <div class="col-sm-12">
                          <input type="date" class="form-control" id="tanggalLahirPasien" style="border: 1px solid #0c5795;"/>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
                <label class="col-sm-5 col-form-label" for="tittlePasien">Tittle</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="tittlePasien" style="border: 1px solid #0c5795;"/>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
                <label class="col-sm-5 col-form-label" for="namaKeluargaPasien">Nama Keluarga</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="namaKeluargaPasien" style="border: 1px solid #0c5795;"/>
                </div>
            </div>
          </div>
          
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="statusPernikahaPasien">Status Pernikahan</label>
                <select name="kawin" class="form-control" id="liststatusPernikahaPasien" style="border: 1px solid #0c5795;">
                    <option value="0">-- Status Pernikahan --</option>
                    @foreach ($kawin as $kawins)
                    <option value="{{ $kawins->id_dc_kawin }}">{{ $kawins->kawin }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          <div class="col">
            <div class="row row-cols-2">
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="noKTPPasien">No. KTP/No. KTA</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" id="noKTPPasien" style="border: 1px solid #0c5795;"/>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="agamaPasien">Agama</label>
                        <select name="agama" class="form-control" id="listagamaPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Agama --</option>
                            @foreach ($agama as $agamas)
                            <option value="{{ $agamas->id_dc_agama }}">{{ $agamas->agama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="hpPasien">No Hp</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="hpPasien" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col" style="">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="alamatPasien">Alamat</label>
              <div class="col-sm-12">
                <textarea type="text" class="form-control" id="alamatPasien" style="border: 1px solid #0c5795; height:7.2rem;"></textarea>
              </div>
            </div>
          </div>
          <div class="col" style="">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="pekerjaanPasien">Pekerjaan</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="pekerjaanPasien" style="border: 1px solid #0c5795;">
              </div>
            </div>
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="emailPasien">Email</label>
              <div class="col-sm-12">
                <input type="email" class="form-control" id="emailPasien" style="border: 1px solid #0c5795;">
              </div>
            </div>
          </div>
          <div class="col">
            <div class="row row-cols-2">
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="provinsiPasien">Provinsi</label>
                        <select name="provinsi" class="form-control" id="listprovinsiPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Provinsi --</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="kotaPasien">Kota</label>
                        <select name="kota" class="form-control" id="listkotaPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Kota --</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="kecamatanPasien">Kecamatan</label>
                        <select name="kecamatan" class="form-control" id="listkecamatanPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Kecamatan --</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="m-1">
                        <label class="col-sm-5 col-form-label" for="kelurahanPasien">Kelurahan</label>
                        <select name="kelurahan" class="form-control" id="listkelurahanPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Kelurahan --</option>
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
                <label class="col-sm-5 col-form-label" for="jabatan">Golongan Darah</label>
                <select name="kd_perusahaan" class="form-control" id="listgoldarah" style="border: 1px solid #0c5795;">
                    <option value="0">-- Golongan Darah --</option>
                    @foreach ($goldarah as $goldarahs)
                    <option value="{{ $goldarahs->id_dc_gol_darah }}">{{ $goldarahs->golongan_darah }}</option>
                    @endforeach
                </select>
            </div>
            <div style="margin: 0.5rem 0.25rem 0.25rem 0.25rem !important;">
                <label class="col-sm-5 col-form-label" for="alergiPasien">Alergi</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="alergiPasien" style="border: 1px solid #0c5795;"/>
                </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="kodePosPasien">Kode Pos</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="kodePosPasien" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
                <label class="col-sm-5 col-form-label" for="namaPasien">Nama Pasien</label>
                <div class="col-sm-12">
                  <input type="file" class="form-control" id="takenamaPasien" style="border: 1px solid #0c5795;"/>
                </div>
              </div>
          </div>
        </div>
        
        <!--end Detail Perusahaan -->
      </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn" style="background: #0c5795; border-radius:5px;">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
      <!--end content-->
      </div>
    </div>
  </div>
</div>