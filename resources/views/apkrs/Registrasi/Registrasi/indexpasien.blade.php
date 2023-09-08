@extends('apkrs.layoutRS.layoutRS')

@section('content')
<div class="row mb-5">
    <div class="row d-flex">
        <a href="/registrasi"><button type="button" class="col-1 btn btn-sm text-white" style="background: #0c5795; border-radius:5px; margin-top: 1rem; margin-left:3rem;">Kembali</button></a>
        <button type="button" class="col-1 btn btn-sm text-white" style="background: #0c5795; border-radius:5px; margin-top: 1rem; position:absolute; right:15rem;">Riwayat</button>
        <button type="button" class="col-1 btn btn-sm text-white" style="background: #0c5795; border-radius:5px; margin-top: 1rem; position:absolute; right:3rem;">Cetak Kartu</button>
    </div>
    <div class="col-4">
        <div class="card h-100" style="margin-top: 2rem; margin-bottom: 3rem; margin-left: 3rem; margin-right: 1rem;">
        <div class="card-header"><h4 class=" text-dark">Profil Pasien</h4></div>
            <div class="container">
                <div class="row justify-content-center">
                    <img src="{{ $pasien->foto }}" alt="" style="width: 10rem; height:auto; margin-top:2rem;">
                    <h4 class="text-center text-dark mt-3">{{ $pasien->Nama_karyawan }}</h4>
                    <p class="text-center text-dark mt-1">{{ $pasien->format_tgl_lahir}}</p>
                    <h6 class="text-center mt-1" style="color: #0c5795">Umum</h6>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            <h6 class="text-dark mt-1">Detail</h6>
                            <p>No Ktp</p>
                            <p>No Polis</p>
                            <p>Umur</p>
                            <p>Golongan Darah</p>
                            <p>Jenis Kelamin</p>
                            <p>Alergi</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <h6 class="text-dark mt-1" style="visibility: hidden">Detail</h6>
                            <p>: {{ $pasien->no_ktp }}</p>
                            <p>: {{ $pasien->no_polis }}</p>
                            <p>: {{ $pasien->usia }} tahun</p>
                            <p>: {{ $pasien->golongan_darah }}</p>
                            <p>: {{ $pasien->gender }}</p>
                            <p>: {{ $pasien->alergi }}</p>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card h-100" style="margin-top: 2rem; margin-right: 3rem; margin-left: 0rem;">
            <div class="row p-1">
                <a data-toggle='tab' id="pasienpoliklinik" href="#PoliklinikPasien" class="pmenu-active col btn btn-sm m-2">
                    <p class="pt-4">
                        <strong>
                        Poliklinik
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienlaboratorium" href='#LaboratoriumPasien' class="pmenu col btn btn-sm m-2">
                    <p class="pt-4">
                        <strong>
                        Laboratorium
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienradiologi" href='#RadiologiPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-4">
                        <strong>
                        Radiologi
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienigd" href='#IGDPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-4">
                        <strong>
                        IGD
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienmcu" href='#MCUPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-4">
                        <strong>
                            MCU
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienodc" href='#ODCPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-4">
                        <strong>
                            ODC
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienfisioterapi" href='#FisioterapiPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-4">
                        <strong>
                            Fisioterapi
                        </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="pasienpenunjang" href='#PenunjangPasien' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-3">
                        <strong>
                            Penunjang Medis Lainnya
                        </strong>
                    </p>
                </a>
            </div>
            
            <div class="container">
                <div class="tab-content custom-menu-content" style="padding: 0">
                    
                    <div id='PoliklinikPasien' class='tab-pane in active'>
                        <div class="row mt-5 justify-content-center">
                            <div class="col-3 m-1">
                                <select name="searchBy" class="col-12 btn" id="caripoliklinik"style="background-color: #EAEAEA; color:#9C9C9C;">
                                    <option value="klinik">Cari Klinik</option>
                                    <option value="dokter">Cari Dokter</option>
                                </select>
                            </div>
                            <div class="col-3 m-1">
                                <select name="searchBy" class="col-12 btn" id="listklinikpasien" style="background-color:#EAEAEA; color:#9C9C9C;">
                                    <option value="klinik1">Klinik 1</option>
                                    <option value="klinik2">Klinik 2</option>
                                </select>
                            </div>
                            
                            <div class="col-1 m-1">
                                <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">No</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Dokter</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Bagian</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Dr Irwan</td>
                                        <td>Poliklinik Kin</td>
                                        <td>123</td>
                                        <td>Kalibata</td>
                                        <td>DR. Chairul Ismail</td>
                                        <td>
                                            <a role="button" class="btn btn-sm text-white" data-id="" style="background-color: #0c5795"></i>Batal</a>
                                        </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>
                    <div id='LaboratoriumPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Laboratorium</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienPoliklinik">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrPoliklinik">No Mr</label>
                                        <input type="text" class="form-control" id="noMrPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienPoliklinik">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark" style="visibility: hidden">a</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterPengirimPoliklinik">Dokter Pengirim</label>
                                        <input type="text" class="form-control" id="dokterPengirimPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisLayananPoliklinik">Jenis Layanan</label>
                                        <input type="text" class="form-control" id="jenisLayananPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="hasilSelesaiPoliklinik">Hasil Selesai</label>
                                        <input type="text" class="form-control" id="hasilSelesaiPoliklinik" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>
                    <div id='RadiologiPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Radiologi</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienRadiologi">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrRadiologi">No Mr</label>
                                        <input type="text" class="form-control" id="noMrRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienRadiologi">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark" style="visibility: hidden">Data Pasien Fisioterapi</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterPengirimRadiologi">Dokter Pengirim</label>
                                        <input type="text" class="form-control" id="dokterPengirimRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisLayananRadiologi">Jenis Layanan</label>
                                        <input type="text" class="form-control" id="jenisLayananRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="hasilSelesaiRadiologi">Hasil Selesai</label>
                                        <input type="text" class="form-control" id="hasilSelesaiRadiologi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>

                    <div id='IGDPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienIGD">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrIGD">No Mr</label>
                                        <input type="text" class="form-control" id="noMrIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienIGD">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="waktuDatangPasienIGD">Waktu Datang</label>
                                        <input type="time" class="form-control" id="waktuDatangPasienIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="waktuInputPasienIGD">Waktu Input</label>
                                        <input type="time" class="form-control" id="waktuInputPasienIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisKejadianPasienIGD">Jenis Kejadian</label>
                                        <input type="text" class="form-control" id="jenisKejadianPasienIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Detail IGD Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="tanggalKejadianIGD">Tanggal Kejadian</label>
                                        <input type="date" class="form-control" id="tanggalKejadianIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="tempatKejadianIGD">Tempat Kejadian*</label>
                                        <input type="text" class="form-control" id="tempatKejadianIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="pengirimIGD">Pengirim</label>
                                        <input type="text" class="form-control" id="pengirimIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="text-dark m-1" for="pengantarIGD">Pengantar</label>
                                            <div class="row" style="margin-right: 5px;">
                                                <input type="text" class="form-control" id="pengantarIGD" style="border: 1px solid #0c5795;"/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="text-dark m-1" for="diantarDenganIGD">Diantar Dengan</label>
                                            <div class="row" style="margin-left: 5px;">
                                                <input type="text" class="form-control" id="diantarDenganIGD" style="border: 1px solid #0c5795;"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="statusDiterimaIGD">Status Diterima*</label>
                                        <input type="text" class="form-control" id="statusDiterimaIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="text-dark m-1" for="rujukanIGD">Rujukan</label>
                                            <div class="row" style="margin-right: 5px;">
                                                <input type="text" class="form-control" id="rujukanIGD" style="border: 1px solid #0c5795;"/>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="text-dark m-1" for="dokterJagaIGD">Dokter Jaga</label>
                                            <div class="row" style="margin-left: 5px;">
                                                <input type="text" class="form-control" id="dokterJagaIGD" style="border: 1px solid #0c5795;"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Keluarga Terdekat</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaKeluargaIGD">Nama</label>
                                        <input type="text" class="form-control" id="namaKeluargaIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noHpKeluargaIGD">No Hp</label>
                                        <input type="text" class="form-control" id="noHpKeluargaIGD" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 style="visibility: hidden;">a</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="alamatKeluargaIGD">Alamat</label>
                                        <textarea type="text" class="form-control" id="alamatKeluargaIGD" style="border: 1px solid #0c5795; height:8.3rem;"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>

                    <div id='MCUPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienMCU">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrMCU">No Mr</label>
                                        <input type="text" class="form-control" id="noMrMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienMCU">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="pengambilMCU">Pengambil</label>
                                        <input type="text" class="form-control" id="pengambilMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Biaya</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="paketTindakanMCU">Paket Tindakan</label>
                                        <input type="text" class="form-control" id="paketTindakanMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterMcuMCU">Dokter MCU</label>
                                        <input type="text" class="form-control" id="dokterMcuMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="hasilSelesaiMCU">Hasil Selesai</label>
                                        <input type="date" class="form-control" id="hasilSelesaiMCU" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>
                    
                    <div id='ODCPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data ODC Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienODC">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrODC">No Mr</label>
                                        <input type="text" class="form-control" id="noMrODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="alamatODC">Alamat</label>
                                        <input type="text" class="form-control" id="alamatODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienODC">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Detail ODC Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="odcODC">ODC</label>
                                        <input type="text" class="form-control" id="odcODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisTindakanODC">Jenis Tindakan</label>
                                        <input type="text" class="form-control" id="jenisTindakanODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterOdcODC">Dokter ODC</label>
                                        <input type="text" class="form-control" id="dokterOdcODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="tindakanPaketODC">Tindakan Paket</label>
                                        <input type="text" class="form-control" id="tindakanPaketODC" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>
                    
                    <div id='FisioterapiPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Fisioterapi Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienFisioterapi">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrFisioterapi">No Mr</label>
                                        <input type="text" class="form-control" id="noMrFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienFisioterapi">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark" style="visibility: hidden">Data Fisioterapi Pasien</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterPengirimFisioterapi">Dokter Pengirim</label>
                                        <input type="text" class="form-control" id="dokterPengirimFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisLayananFisioterapi">Jenis Layanan</label>
                                        <input type="text" class="form-control" id="jenisLayananFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="hasilSelesaiFisioterapi">Hasil Selesai</label>
                                        <input type="text" class="form-control" id="hasilSelesaiFisioterapi" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>
                    <div id='PenunjangPasien' class='tab-pane'>
                        <div class="row">
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark">Data Pasien Penunjang</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="namaPasienPenunjang">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaPasienPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="noMrPenunjang">No Mr</label>
                                        <input type="text" class="form-control" id="noMrPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisPasienPenunjang">Jenis Pasien</label>
                                        <input type="text" class="form-control" id="jenisPasienPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="m-4">
                                    <h4 class="text-dark" style="visibility: hidden">Data Pasien Penunjang</h4>
                                    <div class="row">
                                        <label class="text-dark m-1" for="dokterPengirimPenunjang">Dokter Pengirim</label>
                                        <input type="text" class="form-control" id="dokterPengirimPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="jenisLayananPenunjang">Jenis Layanan</label>
                                        <input type="text" class="form-control" id="jenisLayananPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                                <div class="m-4">
                                    <div class="row">
                                        <label class="text-dark m-1" for="hasilSelesaiPenunjang">Hasil Selesai</label>
                                        <input type="text" class="form-control" id="hasilSelesaiPenunjang" style="border: 1px solid #0c5795;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class="col-2 m-3 btn text-white" style="background: #0c5795; border-radius:5px;">Kirim</button>
                                <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

          
@endsection
