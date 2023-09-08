@extends('layouts.sneat')

@section('content')

    <style>
        .card {
            background: rgb(255, 255, 255);
            border-radius: 1.4em;
            box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
            border: rgb(250, 250, 250) 0.2em solid;

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
    <div class="card m-5" style="background-image:url(/images/katakanpeta.png);">
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <h5 class="card-header">Data Klas Paket Asuransi</h5>
            </div>
            <div class="col-6">
                <div class="col-sm d-flex justify-content-end">
                    <!-- button id="btnTambahDataCabang" type="button" class="btn text-white m-3" style="background-color: #0c5795;">Tambah Data</button -->
                </div>
            </div>
        </div>
        <div class="col">
                        <!--start card -->
                        <h6 class="text-center mt-2 mb-3"></h6>
                        <div class="row p-4">
                            <h6 class="text-start mt-3 mb-3">Data Cabang Asuransi</h6>
                                <div class="row">
                                    <p class="text-left col-1">Nama Asurans</p>
                                    <p class="col-5" id="txtAlamatdetail"> : PT JASINDO SOLUSI UTAMA </p>
                                </div>

                                <div class="row">
                                  <p class="text-left col-1">Nama Paket</p>
                                  <p class="col-5" id="txtAlamatTagihanDetail"> : Paket Rawat Inap</p>
                                </div>                                

                                <div class="row">
                                    <p class="text-left col-1">Klas</p>
                                    <p class="col-5" id="txtNamaKotadetail"> :VVIP</p>
                                </div>        
                            </div>
                        </div>

                        <div class="row p-4">
            <div class="row">
                <div class="col-md-5">
                <div class="row em-5">
                                    <p class="fw-bold text-left col-3">Layanan Ruangan</p>
                                    <p class="fw-bold col" id="txtNamaKotadetail"> : VVIP</p>
                                </div>  
    </div>
    </div>
    </div>

  <div class="row">
    <div class="card col-sm shadow-none">
    <div class="row mb-5">
                <div class="col-md-4">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Tindakan</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm margin-top: 10px;">
                      <thead>
                        <tr class="text-nowrap">
                          <th>NO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Fix Protesa</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                        <td>Fix Protesa - jaket crow actilic</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                        <td>Fix Protesa - jaket crow actilic Bacrilic Backing Metal</td>
                        </tr>
                        </tr>
                        <th scope="row">4</th>
                        <td>Fix Protesa - jaket crow Porselen</td>
                        </tr>
                        </tr>
                        <th scope="row">5</th>
                        <td>Fix Orthodonty</td>
                        </tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
    </div>
    <div class="col-sm">
    <div class="row mb-5">
                <div class="col-md-5">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Obat</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm margin-top: 10px;">
                      <thead>
                      <tr class="text-nowrap">
                          <th>NO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Acetyl sistein / n asetil sistein tab</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                        <td>Acid Folic PROFOLAT</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                        <td>Adatlat oros 20mg</td>
                        </tr>
                        </tr>
                        <th scope="row">4</th>
                        <td>Alopurionol 100 mg</td>
                        </tr>
                        </tr>
                        <th scope="row">5</th>
                        <td>Alprzolam 0,5 mg</td>
                        </tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
    </div>
    <div class="col-sm">
    <div class="row mb-5">
              <div class="card-header margin-top:10;">
                  <label style="font-size: 20px; font-weight:bold;">Alkes</label>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-sm margin-top: 10px;">
                      <thead>
                      <tr class="text-nowrap">
                          <th>NO</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>3M 1370L z250 syringe intro kit LA/APAC</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                        <td>Ac Swab 0,5% sachet</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                        <td>Alginat/ Major Algeniux</td>
                        </tr>
                        </tr>
                        <th scope="row">4</th>
                        <td>Anti-AB Monoclonal Antibodies</td>
                        </tr>
                        </tr>
                        <th scope="row">5</th>
                        <td>Anti-B Monoclonal Antibodies</td>
                        </tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
            </div>
    </div>
    </div>
  </div>     

    </div>
@endsection
