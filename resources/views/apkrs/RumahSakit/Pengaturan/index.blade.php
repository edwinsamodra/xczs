@extends('apkrs.layoutRS.layoutRS')
@section('content')
    <style>
        label {
            color: #697a8d;
        }
        .group {
 display: flex;
 line-height: 28px;
 align-items: center;
 position: relative;
 max-width: 590px;
}

.input {
 width: 70%;
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
    <div class="card m-5">
        <div class="main-menu-area"style="border-radius :10px 10px 0px 0px; background-color:#0c5795; width:auto;">
            <div class="row p-2">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro mx-4">
                    <li class=" mx-4"> 
                        <a href="#pegawai" id="Pegawai" data-toggle='tab' class='pmenu-active '>
                            Pegawai
                        </a>
                    </li>
                    <li class='mx-4'>
                        <a data-toggle='tab' id="Dokter" href='#dokter' class='pmenu'>
                            Dokter
                        </a>
                    </li>
                    <li class=''>
                        <a data-toggle='tab' href='#rs1' class='pmenu'>
                            Parameter Lain
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row" style="height: 35rem;">
        <div class=" card-responsive">
            <div class="tab-content custom-menu-content" style="padding: 0">
                <div id='pegawai' class='tab-pane in active'>
                    <div class="row mt-5">
                        <div class="table-responsive text-nowrap p-4">

                        <!-- TABEL PEGAWAI -->
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                      
                                        <td style="color: #697a8d;font-weight: bold;">User ID</td>
                                        <td style="color: #697a8d;font-weight: bold; ">Foto</td>
                                        <td style="color: #697a8d;font-weight: bold;">Nama Pegawai</td>
                                        <td style="color: #697a8d;font-weight: bold;">Bagian</td>
                                        <td style="color: #697a8d;font-weight: bold;">Group User</td>
                                        <td style="color: #697a8d;font-weight: bold;">Status</td>
                                        <td style="color: #697a8d;font-weight: bold;">Action</td>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td style="color: #697a8d;">Admin</td>
                                        <td> <div class="user-info">
								        <div class="user-info__img">
									    <img src="assets/images/dokter1.jpg" alt="User Img">
								        </div></td>
                                        <td style="color: #697a8d;">Adni Maul Samsudin</td>
                                        <td style="color: #697a8d;">Instalasi Rawat Jalan</td>
                                        <td style="color: #697a8d;">Super Administrator</td></td>
                                                <td><span class="active-circle bg-success"></span> Aktif
					                	</td>
                                          <td>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" data-bs-target="#editPegawai"
                                                style="color: #697a8d; background-color: #0c5795"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp  Edit</a>
                                                <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #697a8d;">Admin</td>
                                        <td> <div class="user-info">
								        <div class="user-info__img">
									    <img src="assets/images/dokter1.jpg" alt="User Img">
								        </div></td>
                                        <td style="color: #697a8d;">Dayat Maul Samsudin</td>
                                        <td style="color: #697a8d;">Instalasi Rawat Jalan</td>
                                        <td style="color: #697a8d;">Super Administrator</td></td>
                                                <td><span class="active-circle bg-success"></span> Aktif
					                	</td>
                                          <td>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" data-bs-target="#editPegawai"
                                                style="color: #697a8d; background-color: #0c5795"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp  Edit</a>
                                                <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #697a8d;">Admin</td>
                                        <td> <div class="user-info">
								        <div class="user-info__img">
									    <img src="assets/images/dokter1.jpg" alt="User Img">
								        </div></td>
                                        <td style="color: #697a8d;">Dayat Maul Samsudin</td>
                                        <td style="color: #697a8d;">Instalasi Rawat Jalan</td>
                                        <td style="color: #697a8d;">Super Administrator</td></td>
                                        <td><span class="active-circle bg-success"></span> Aktif
					                	</td>
                                          <td>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" data-bs-target="#editPegawai"
                                                style="color: #697a8d; background-color: #0c5795"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp  Edit</a>
                                                <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                                data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
                                        </td>
                                    </tr>
                                   
                                   
                                </tbody>
                            </table>
                            <!-- END TABEL PEGAWAI -->
                        </div>
                    </div>
                </div>
                <div id='dokter' class='tab-pane'>
                  <div class="row ml-5 mt-4 justify-content-center" style="margin-left: 5em;">
                    <div class="col-md-8">
                      <div class="row"> 
                        <div class="col-4">
                            <div class=""><label class="col" for="ktp">Pencarian</label></div>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="col mt-10">
                        <select class="form-select p-2" aria-label="Default select example" style=" border: 0;  background-color: #F5F5F5; border-radius: 6px;">
                            <option selected >--pilih--</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                      </div>
                      <div class="col-8">
                      <div class="group" class="col"  style="margin-left: 10px;">
                            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g>
                                <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
                            <input name="keyword" placeholder="Cari Pasien" placeholder="Cari Pasien" aria-describedby="basic-addon-search31" aria-label="Search..." id="cariPasien" type="search" class="input">
                            <button class=" btn btn-md text-white" style="background-color: #0c5795; margin-left: 10px;" > Cari </button>    
                        </div>
                    </div>
                            <div class="col-4 m-2">
                        
                      </div>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row mt-5">
                    <div class="table-responsive text-nowrap p-3">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td style="color: #697a8d;font-weight: bold;">No.</td>
                                    <td style="color: #697a8d;font-weight: bold;">Foto</td>
                                    <td style="color: #697a8d;font-weight: bold;">Dokter</td>
                                    <td style="color: #697a8d;font-weight: bold;">Spesialisasi</td>
                                    <td style="color: #697a8d;font-weight: bold;">Status</td>
                                    <td style="color: #697a8d;font-weight: bold;">Jenis dr</td>
                                    <td style="color: #697a8d;font-weight: bold;">Action</td>
                                    <!-- <td style="color: #697a8d;font-weight: bold;">Absen</td> -->
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td style="color: #697a8d">1.</td>
                                    <td><div class="user-info">
								<div class="user-info__img">
									<img src="assets/images/dokter1.jpg" alt="User Img">
								</div>
							</div>
                                </td>
                                    <td style="color: #697a8d;">dr. Nadia S.Ft</td>
                                    <td style="color: #697a8d;">Patologi Klinik</td>
                                    <td style="color: #697a8d;">Spesialis</td>
                                    <td style="color: #697a8d;">Dokter Tamu</td>
                                    <td>
                                    <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-id="" data-bs-target="#detailDokter"
                                            style="color: #697a8d; background-color: #0c5795"></i><i class="fa-solid fa-circle-info"></i>  &nbsp Detail</a>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-id="" data-bs-target="#detailDokter"
                                            style="color: #697a8d; background-color: #009FE3"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp Edit</a>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                             data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
						            </td> 
                                </tr>
                                <tr>
                                    <td style="color: #697a8d">2.</td>
                                    <td> <div class="user-info">
								        <div class="user-info__img">
									    <img src="assets/images/dokter1.jpg" alt="User Img">
								        </div>
							</div>
                                </td>
                                    <td style="color: #697a8d;">dr. Adni S.Ft</td>
                                    <td style="color: #697a8d;">Patologi Klinik</td>
                                    <td style="color: #697a8d;">Spesialis</td>
                                    <td style="color: #697a8d;">Dokter Tamu</td>
                                    <td>
                                    <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-id="" data-bs-target="#detailDokter"
                                            style="color: #697a8d; background-color: #0c5795"></i><i class="fa-solid fa-circle-info"></i>  &nbsp Detail</a>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                            data-id="" data-bs-target="#detailDokter"
                                            style="color: #697a8d; background-color: #009FE3"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp Edit</a>
                                            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal"
                                             data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
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

   @include('apkrs.RumahSakit.Pengaturan.modalPegawai.modalEditPegawai')
   @include('apkrs.RumahSakit.Pengaturan.modalDokter.modalDetailDokter')
   @include('apkrs.RumahSakit.Pengaturan.modalDokter.modalAbsenDokter')
@endsection
