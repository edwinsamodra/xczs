@extends('apkrs.layoutRS.layoutRS')
@section('content')
<style>
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
    <div class="row d-flex justify-content-between">
      <div class="col-6">
        <h5 class="card-header">Data Asuransi</h5>
      </div>  
  
      <div class="col-6">
        <div class="col-sm d-flex justify-content-end">
          <button type="button" class="btn text-white m-3" style="background-color: #0c5795;">Tambah Data</button>

        </div>
      </div> 
     
    </div>
    <div class="col-lg-6 col-sm-md-12 card-body demo-vertical-spacing demo-only-element">
      <form method="GET" action="/dataAsuransi">
      <div class="input-group input-group-merge">
       
        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
        <input name="keyword" 
          type="text"
          class="form-control"
          placeholder="Cari Asuransi"
          aria-label="Search..."
          aria-describedby="basic-addon-search31"
        />
        <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
      </div>
    </form>
    </div>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table-sm">
        <thead>
          <tr>
            <td style="font-weight: bold;">No</td>
            <td style="font-weight: bold;">Nama Asuransi</td>
            <td style="font-weight: bold;">Nama Pimpinan</td>
            <td style="font-weight: bold;">Kode Pos</td>
            <td style="font-weight: bold;">Kelurahan</td>
            <td style="font-weight: bold;">Kecamatan</td>
            <td style="font-weight: bold;">Kota</td>
            <td style="font-weight: bold;">Actions</td>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($asuransi as $key => $asuransis)
            
          <tr>
            <td>{{ $asuransi->firstItem() + $key }}</td> 
            <td style="color: #697a8d;font-weight: bold;"> <a href="/indexasuransi/{{ $asuransis->kode_asuransi }}"  data-id="{{ $asuransis->kode_asuransi }}">{{ $asuransis->nama_asuransi }}</a></td>
            <td style="color: #697a8d;font-weight: bold;">{{ $asuransis->pimpinan }}</td>
            <td>{{ $asuransis->kode_pos }}</td>
            <td>{{ $asuransis->nama_kelurahan }}</td>
            <td>{{ $asuransis->nama_kecamatan }}</td>
            <td>{{ $asuransis->nama_kota }}</td>
            <td>
            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal" data-id="{{ $asuransis->id_asuransi }}" data-bs-target="#detailDokter" style="color: #697a8d; background-color: #009FE3"></i><i class="fa-solid fa-pen-to-square"></i> &nbsp Edit</a>
            <a role="button" class="btn btn-sm text-white" data-bs-toggle="modal" data-id="" style="color: #697a8d; background-color: #950C0C"></i><i class="fa-sharp fa-solid fa-trash"></i> &nbsp Hapus</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3 mb-5">
  </div>

  @endsection