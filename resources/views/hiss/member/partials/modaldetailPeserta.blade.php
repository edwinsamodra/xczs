  <!--modal Input-->
  <style>
    .modal-xxl{
      max-width: 1300px !important;
    }
  </style>
  <div class="modal fade" id="modalDetailPeserta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl">
      <div class="modal-content modalblur">
        <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
          <h5 class="modal-title text-white mb-3" id="modalInputLabeldetail"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              <div class="card mb-4 shadow-none">
                <div class="card-header">
                  <h4>Profil</h4>
                </div>
                <div class="card-body text-start"style="height: 410px; font-weight:bold;">
                  <img id="imgDetailPesertaContainer">
                  <div class="text-center" style="margin-top: 20px; font-weight:bold;" id="txtnama"></div>
                  <div class="text-center" id="txtno_polis"></div>
                  <div class="row"  style="margin-top: 40px;">
                  <div class="irwancard mb-4" >
                  <table>
                  <tr>
                  <b>Nama Asuransi</b><br>
                  <hr class="mt-1 mb-1 ">
                    <td>
                    <label for="html5-text-input">PT. ASURANSI JASINDO</label><br>
                    </td>
                  </tr>
                </table>
            </div>
          </div>
                  {{-- <hr> --}}
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="irwancard mb-4">
                <div class="card-body"style="height: 410px; font-weight: bold;">
                <h4>Info Karyawan</h4>
                  <div class="row">
                    <label for="html5-text-input"  class="col-md-4">Nama</label>
                    {{-- <div class="col-md-8"> --}}
                    <label for="html5-text-input" id="txtnama1" class="col-md-8">:</label>
                    {{-- </div> --}}
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">No Polis</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtno_polis2" class="col-md-8">:</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">No. KTP</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtno_ktp" class="col-md-8">:</label>

                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Perusahaan</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtnama_perusahaan" class="col-md-8">:</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Jabatan</label>
                    <div class="col-md-8">
                    <label for="html5-text-input"  id="txtnama_jabatan" class="col-md-8">:</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Tanggal Lahir</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txttgl_lahir"class="col-md-8">:</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Jenis Kelamin</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtgender" class="col-md-8">:</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Agama</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtagama" class="col-md-8">:</label>

                    </div>
                  </div>

                  <div class="mb-4 row">
                    <label for="html5-text-input" class="col-md-4">Golongan Darah</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtgolongandarah" class="col-md-8">:</label>

                    </div>
                  </div>
                    <h4>Info Kepesertaan</h4>
                    <div class="mb-1 row">
                      <label for="html5-text-input" class="col-md-4">Kelas</label>
                      <div class="col-md-8">
                      <label for="html5-text-input" id="txtnama_layanan" class="col-md-8">:</label>

                      </div>
                    </div>

                    <div class="mb-1 row">
                      <label for="html5-text-input" class="col-md-4">Pagu</label>
                      <div class="col-md-8">
                      <label for="html5-text-input" id="txtPagu" class="col-md-8">:</label>

                      </div>
                    </div>
                    <div class="mb-1 row">
                      <label for="html5-text-input" class="col-md-4">Sisa</label>
                      <div class="col-md-8">
                      <label for="html5-text-input" id="txtstatus" class="col-md-8">:</label>

                      </div>
                    </div>

                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="card mb-4">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Riwayat Karyawan</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm margin-top: 10px;">
                      <thead>
                        <tr class="text-nowrap">
                        <td>NO.</td>
                          <td>Detail</td>
                          <td>Tanggal Pemeriksaan</td>
                          <td>Dianogsa</td>
                          <td>Tindakan</td>
                          <td>Faskes</td>
                          <td>Bill</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>
                          <a type="button" class="detailriwayat btn btn-sm text-white" style="background-color: #0c5795">
                            <i class="bx bx-detail me-1"></i> <br> Detail
                          </a>
                          </td>
                          <td>01-11-2023 10:45</td>
                          <td>E78.0</td>
                          <td>INJEKSI OBAT TERTENTU</td>
                          <td>RUMAH SAKIT BUDI ASIH</td>
                          <td>500.000</td>
                        </tr>
                        <tr>
                          <!-- <th scope="row">2</th> -->
                          <!-- <td>
                            <a type="button" class="detailriwayat btn btn-sm text-white" style="background-color: #0c5795">
                              <i class="bx bx-detail me-1"></i> <br> Detail
                            </a>
                        </td> -->
                        <!-- <td>01-11-2023 10:45</td>
                          <td>E78.0</td>
                          <td>INJEKSI OBAT TERTENTU</td>
                          <td>RUMAH SAKIT BUDI ASIH</td> -->

                        </tr>
                        <tr>
                          <!-- <th scope="row">3</th> -->
                          <!-- <td>
                            <a type="button" class="detailriwayat btn btn-sm text-white" style="background-color: #0c5795">
                              <i class="bx bx-detail me-1"></i> <br> Detail
                            </a>
                        </td> -->
                        <!-- <td>01-11-2023 10:45</td>
                          <td>E78.0</td>
                          <td>INJEKSI OBAT TERTENTU</td>
                          <td>RUMAH SAKIT BUDI ASIH</td> -->

                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="card mb-4">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Resep</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                      <thead>
                        <tr class="text-nowrap">
                          <th>No.</th>
                          <th>Nama Obat </th>
                          <th>Jumlah</th>
                          <th>Aturan Pakai</th>
                          <th>Note</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>AMOXICILLIN TAB 500 MG</td>
                          <td>10</td>
                          <td>3 x 1</td>
                          <td>-</td>
                          <td>Sesudah Makan</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>PARAMOL TAB 500 MG</td>
                          <td>5</td>
                          <td>3 x 1</td>
                          <td>HABISKAN</td>
                          <td>Sesudah Makan</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="card mb-4">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Laboratorium</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                      <thead>
                        <tr class="text-nowrap">
                          <th>Nama Pemeriksaan</th>
                          <th>Hasil</th>
                          <th>Nilai Rujukan</th>
                          <th>Satuan</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                      </tbody>
                    </table>
                  </div> -->
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
