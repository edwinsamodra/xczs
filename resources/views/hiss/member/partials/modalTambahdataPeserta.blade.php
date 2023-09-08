
<input type="hidden" id="frmDialogTambahDataPeserta_action">
<input type="hidden" id="frmDialogTambahDataPeserta_id">
<!--modal Input-->
<div class="modal fade" id="modalTambahDataMember" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#0c5795;  padding-bottom:1.2em;">
        <h5 class="modal-title text-white mb-3" id="modalInputLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalTambahDataPeserta_content">
        <div class="row row-cols-2">
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="nama_peserta">Nama</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nama_peserta" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="ktp">No Ktp</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="noktp" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="perusahaan">Perusahaan</label>
              <select name="perushaan" class="form-control" id="listperusahaa" disabled style="border: 1px solid #0c5795;">
                <option value="0">-- Pilih Perusahaan --</option>
                @foreach ($perusahaan as $perusahaans)
                <option value="{{ $perusahaans->kd_perusahaan }}">{{ $perusahaans->nama_perusahaan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="polis">No Polis</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="nopolis" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="jabatan">Jabatan</label>
              <select name="jabatan" class="form-control" id="listjabatan" style="border: 1px solid #0c5795;">
                <option value="0">-- Pilih Jabatan --</option>
                @foreach ($tbljabatan as $tbljabatans)
                <option value="{{ $tbljabatans->kd_jabatan }}">{{ $tbljabatans->nama_jabatan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="tgllahir">Tanggal Lahir</label>
              <div class="col-sm-12">
                <input type="date" class="form-control" id="txtTanggalLahir" style="border: 1px solid #0c5795;"/>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="kawin">Status Pernikahan</label>
              <select name="pernikahan" class="form-control" id="listkawin" style="border: 1px solid #0c5795;">
                <option value="0">-- Status Pernikahan --</option>
                @foreach ($kawin as $kawins)
                <option value="{{ $kawins->id_dc_kawin }}">{{ $kawins->kawin }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="status">Status</label>
              <select name="status" class="form-control" id="liststatus" style="border: 1px solid #0c5795;">
                <option value="0">-- Status --</option>
               
                <option value="Berkeluarga">Berkeluarga</option>
                <option value="Perorangan">Perorangan</option>
              
              </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="kelas">Kelas</label>
              <select name="kelas" class="form-control" id="listkelas" style="border: 1px solid #0c5795;">
                <option value="0">-- Kelas --</option>
                @foreach ($layanan as $layanans)
                <option value="{{ $layanans->kd_kls_asuransi }}">{{ $layanans->nama_layanan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="jabatan">Jenis Kelamin</label>
              <select name="kd_perusahaan" class="form-control" id="listgender" style="border: 1px solid #0c5795;">
                <option value="0">-- Jenis Kelamin --</option>
                      @foreach ($gender as $genders)
                          <option value="{{ $genders->id_dc_gender }}">{{ $genders->gender }}</option>
                      @endforeach
                  </select>
              </select>
              
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="jabatan">Golongan Darah</label>
              <select name="goldarah" class="form-control" id="listgoldarah" style="border: 1px solid #0c5795;">
                <option value="0">-- Golongan Darah --</option>
                      @foreach ($goldarah as $goldarahs)
                          <option value="{{ $goldarahs->id_dc_gol_darah }}">{{ $goldarahs->golongan_darah }}</option>
                      @endforeach
                  </select>
              </select>
              
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="jabatan">Agama</label>
              <select name="agama" class="form-control" id="listagama" style="border: 1px solid #0c5795;">
                <option value="0">-- Agama --</option>
                      @foreach ($agama as $agamas)
                          <option value="{{ $agamas->id_dc_agama }}">{{ $agamas->agama }}</option>
                      @endforeach
                  </select>
              </select>
              
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label class="col-sm-5 col-form-label" for="txtAlergi">Alergi</label>
              <div class="col-sm-12">
                <input type="text" class="form-control" id="txtAlergi" style="border: 1px solid #0c5795;"/>
              </div>
              
            </div>
          </div>
          <div class="col">
            <div class="m-1">
              <label for="fileLogo" class="col-sm-5 col-form-label">Foto</label>
              <div class="col-sm-12">
                  <input name="logo" class="form-control" type="file" style="border: 1px solid #0c5795;" placeholder="File logo" id="logo" />
                  
              </div>
              
            </div>
          </div>
        </div>
        
        <!--end Detail Perusahaan -->
      </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnSimpanDataPeserta" style="background: #0c5795; border-radius:5px;">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
      <!--end content-->
      </div>
    </div>
  </div>
</div>