@extends('apkrs.layoutRS.layoutRS')

@section('content')

<style>
    .group {
 display: flex;
 line-height: 28px;
 align-items: center;
 position: relative;
 max-width: 590px;
}

.input {
 width: 100%;
 height: 40px;
 line-height: 28px;
 padding: 0 1rem;
 padding-left: 2.5rem;
 border: 2px solid transparent;
 border-radius: 8px;
 outline: none;
 background-color: #f3f3f4;
 color: #0d0c22;
 transition: .3s ease;
}

.input::placeholder {
 color: #0C5795;
}

.input:focus, input:hover {
 outline: none;
 border-color: rgba(12, 87, 149, 1);
 background-color: #fff;
 box-shadow: 0 0 0 4px rgba(209, 223, 234, 1 / 10%);
}

.icon {
 position: absolute;
 left: 1rem;
 fill: #9e9ea7;
 width: 1rem;
 height: 1rem;
}
.table {
	border-spacing: 0 15px;
	border-collapse: separate;
}
.table thead tr th,
.table thead tr td,
.table tbody tr th,
.table tbody tr td {
	vertical-align: middle;
	border: none;
}
.table thead tr th:nth-last-child(1),
.table thead tr td:nth-last-child(1),
.table tbody tr th:nth-last-child(1),
.table tbody tr td:nth-last-child(1) {
	text-align: center;
}
.table tbody tr {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}
.table tbody tr td {
	background: #fff;
}
.table tbody tr td:nth-child(1) {
	border-radius: 5px 0 0 5px;
}
.table tbody tr td:nth-last-child(1) {
	border-radius: 0 5px 5px 0;
}

.user-info {
	display: flex;
	align-items: center;
}
.user-info__img img {
	margin-right: 15px;
	height: 55px;
	width: 55px;
	border-radius: 45px;
	border: 3px solid #fff;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.active-circle {
	height: 10px;
	width: 10px;
	border-radius: 10px;
	margin-right: 5px;
	display: inline-block;
}
    </style>
<div class="row mb-5">
    <div class="col-4">
        <div class="card h-100" style="margin-top: 3rem; margin-bottom: 3rem; margin-left: 3rem; margin-right: 1rem;">
        <div class="card-header"> <h4>Profil</h4></div>
            <div class="container">
                <div class="row justify-content-center">
                    <img src="/assetsRS/images/user.png" alt="" style="width: 10rem; height:auto; margin-top:2rem;">
                    <h4 class="text-center mt-3">ADMINISTRASI</h4>
                    <h6 class="text-center mt-3">Bagian : Staff</h6>
                    <p class="text-center mt-3">Terakhir Kali Login :</p>
                </div>
            </div>

        </div>
    </div>
    <div class="col-8">
        <div class="card h-100" style="margin-top: 3rem; margin-right: 3rem; margin-left: 0rem;">
            <div class="row p-1">
                <a data-toggle='tab' id="pencarian" href="#Registrasi" class="pmenu-active col btn btn-sm m-2">
                    <p class="pt-3"> <strong>
                        Cari Pasien
                    </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="poliklinik" href="#Poliklinik" class="pmenu col btn btn-sm m-2">
                    <p class="pt-3"> <strong>
                        Antrian Poliklinik
                    </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="radiologi" href='#Radiologi' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-3"> <strong>
                        Antrian Radiologi
                    </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="igd" href='#IGD' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-3"> <strong>
                        Antrian IGD
                    </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="mcu" href='#MCU' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-3"> <strong>
                        Antrian MCU
                    </strong>
                    </p>
                </a>
                <a data-toggle='tab' id="odc" href='#ODC' class='pmenu col btn btn-sm m-2'>
                    <p class="pt-3"> <strong>
                        Antrian ODC
                    </strong>
                    </p>
                </a>
            </div>
            <div class="container">
                <div class="tab-content custom-menu-content" style="padding: 0">

                    <div id='Registrasi' class='tab-pane in active'>
                        <div class="row justify-content-center">
                            <div class="col-6 mt-5">
                            {{--<form method="GET" action="/registrasi/Pasien">
                        <div class="group">
                            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input">
                            </div>
                            </form> --}}
                                <form method="GET" action="/registrasi/Pasien">
                                    <div class="group">
                                        <input 
                                        type="text"
                                        class="input m-2"
                                        placeholder="Cari Pasien"
                                        id="cariPasien"
                                        aria-label="Search..."
                                        aria-describedby="basic-addon-search31"
                                        />
                                        <input name="keyword" 
                                        type="hidden"
                                        class="form-control"
                                        placeholder="Cari Pasien"
                                        id="idPasien"
                                        aria-label="Search..."
                                        aria-describedby="basic-addon-search31"
                                        
                                        />
                                        <button type="submit" class="btn m-2"style="background-color:#0c5795; color:white;">cari</button>
                                    </div>
                                    <div id="suggestion-box">
                                    </div >
                                    <div id="list-container" style="display:none;"></div>
                                </form> 
                            </div>
                        </div>
                        <div class="row mt-5 justify-content-center">
                            <h5 class="text-center">Atau</h5><br>
                            <a href="/registrasi/tambah" class="col-3 btn text-white"style=" margin-top: 100px; background-color: #0c5795">
                                Tambah Pasien Baru
                            </a>
                        </div>
                    </div>

                    <div id='Poliklinik' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                            <h5 class="col-4 text-dark">Antrian Pasien Pada Tanggal :</h5>
                            {{-- <p class="col-2 text-dark"><strong></strong></p> --}}
                        </div>
                        <div class="row mt-2 justify-content-center">
                            <div class="card col-3 m-2">
                            <select class="form-select p-2" aria-label="Default select example" style=" border: 0;  background-color: #F5F5F5; border-radius: 6px;">
                            <option selected>--pilih Poliklinik--</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>

                            <!-- <select class="pilihklinik p-3 " style=" border: 0;  background-color: #F5F5F5; border-radius: 6px;">
                            <option value="0">Pilih Dokter</option>
                                        <option value="">Dokter 1</option>
                                        <option value="">Dokter 2</option>
                            </select> -->
                            </div>
                            <div class="card col-3 m-2">
                            <select class="form-select p-2" aria-label="Default select example" style=" border: 0;  background-color: #F5F5F5; border-radius: 6px;">
                                    <option value="0">Pilih Dokter</option>
                                        <option value="">Dokter 1</option>
                                        <option value="">Dokter 2</option>
                                </select>
                            </div>
                            <div class="col-1 m-2">
                                <button class="col btn btn-md text-white" style="background-color: #0c5795"> Cari </button>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">No</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Jam</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                      <td style="color: #697a8d;font-weight: bold;">Alamat</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Dokter</td>
                                      <td style="color: #697a8d;font-weight: bold;">Batal</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>12:00</td>
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

                    <div id='Laboratorium' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                            <h5 class="col-2 text-dark">Laboratorium</h5>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-5">
                                <div class="group">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input" style="margin-right: 10px;">
                            <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">Antrian</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Tanggal Daftar</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                      <td style="color: #697a8d;font-weight: bold;">Batal</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>21/1/2023</td>
                                        <td>123</td>
                                        <td>
                                            <a role="button" class="btn btn-sm text-white" data-id="" style="background-color: #0c5795"></i>Batal</a>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>

                    <div id='Radiologi' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                        <h5 class="col-2 text-dark">Radiologi</h5>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-5">
                                <div class="group">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input" style="margin-right: 10px;">
                            <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">Antrian</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Tanggal Daftar</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                      <td style="color: #697a8d;font-weight: bold;">Batal</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>21/1/2023</td>
                                        <td>123</td>
                                        <td>
                                            <a role="button" class="btn btn-sm text-white" data-id="" style="background-color: #0c5795"></i>Batal</a>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>

                    <div id='IGD' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                        <h5 class="col-2 text-dark">IGD</h5>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-5">
                                <div class="group">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input" style="margin-right: 10px;">
                            <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">Antrian</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Tanggal Daftar</td>
                                      <td style="color: #697a8d;font-weight: bold;">Dokter Jaga</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>21/1/2023</td>
                                        <td>Dr Ismail</td>
                                        <td>123</td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>

                    <div id='MCU' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                            <h5 class="col-2 text-dark">MCU</h5>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-5">
                                <div class="group">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input" style="margin-right: 10px;">
                            <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">Antrian</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Tanggal Daftar</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                      <td style="color: #697a8d;font-weight: bold;">Batal</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>21/1/2023</td>
                                        <td>123</td>
                                        <td>
                                            <a role="button" class="btn btn-sm text-white" data-id="" style="background-color: #0c5795"></i>Batal</a>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>

                    <div id='ODC' class='tab-pane'>
                        <div class="row justify-content-center pt-5">
                        <h5 class="col-2 text-dark">ODC</h5>
                        </div>
                        <div class="row mt-3 justify-content-center">
                            <div class="col-5">
                                <div class="group">
                                <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien"   placeholder="Cari Pasien"   aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input" style="margin-right: 10px;">
                            <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="table-responsive text-nowrap p-3">
                                <table class="table table-sm">
                                  <thead>
                                    <tr>
                                      <td style="color: #697a8d;font-weight: bold;">Antrian</td>
                                      <td style="color: #697a8d;font-weight: bold;">Nama Pasien</td>
                                      <td style="color: #697a8d;font-weight: bold;">Tanggal Daftar</td>
                                      <td style="color: #697a8d;font-weight: bold;">No Mr</td>
                                      <td style="color: #697a8d;font-weight: bold;">Batal</td>
                                    </tr>
                                  </thead>
                                  <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>1</td>
                                        <td>Irwan</td>
                                        <td>21/1/2023</td>
                                        <td>123</td>
                                        <td>
                                            <a role="button" class="btn btn-sm text-white" data-id="" style="background-color: #0c5795"></i>Batal</a>
                                        </td>
                                    </tr>

                                  </tbody>
                                </table>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('apkrs.Registrasi.Registrasi.partials.modalTambahPasien')
@include('apkrs.Registrasi.Registrasi.partials.modalTakepicture')

@endsection
