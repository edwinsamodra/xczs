@extends('layouts.sneat')

@section('content')
<style>

.card {
 background: rgb(255, 255, 255);
 border-radius: 1.4em;
 box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
 border: rgb(250, 250, 250) 0.2em solid;
}
button {
 padding: 17px 40px;
 border-radius: 50px;
 border: 0;
 background-color: white;
 box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
 letter-spacing: 1.5px;
 font-size: 15px;
 transition: all .5s ease;
}

button:hover {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
}

button:active {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(93 24 220) 0px 0px 0px 0px;
 transform: translateY(10px);
 transition: 100ms;
}
  </style>
<div class="card m-5">
  <div class="row d-flex justify-content-between">
    <div class="col-6">
      <h5 class="card-header">Data Mitra Perusahaan</h5>
    </div>  
    <div class="col-6">
      <div class="col-sm d-flex justify-content-end">
        {{-- <button id="btnTambahDataPerusahaan" type="button" class="btn text-white" style="background-color: #0c5795;">Tambah Data</button> --}}
      </div>
    </div> 
  </div>
  <div class="col-lg-6 col-sm-md-12 card-body demo-vertical-spacing demo-only-element">
    <form method="GET" action="/keluarga-peserta">
    <div class="input-group input-group-merge">
     
      <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
      <input name="keyword" 
        type="text"
        class="form-control"
        placeholder="Cari Perusahaan"
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
          <td style="color: #697a8d;font-weight: bold;">No</td>
          <td style="color: #697a8d;font-weight: bold;">Nama Perusahaan</td>
          <td style="color: #697a8d;font-weight: bold;">Nama Pimpinan</td>
          <td style="color: #697a8d;font-weight: bold;">Kode Pos</td>
          <td style="color: #697a8d;font-weight: bold;">Kelurahan</td>
          <td style="color: #697a8d;font-weight: bold;">Kecamatan</td>
          <td style="color: #697a8d;font-weight: bold;">Kota</td>
          {{-- <td style="color: #697a8d;font-weight: bold;">Actions</td> --}}
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($companies as $company)
          
        <tr>
          <td>{{ $loop->iteration }}</td> 
          <td><a href="/indexkeluargapesertaperusahaan/{{ $company->company_kode }}"  data-id="{{ $company->company_kode }}">{{ $company->nama_perusahaan }}</a></td>
          <td>{{ $company->nama_pimpinan_perushaan }}</td>
          <td>{{ $company->kode_pos }}</td>
          <td>{{ $company->nama_kelurahan }}</td>
          <td>{{ $company->nama_kecamatan }}</td>
          <td>{{ $company->nama_kota }}</td>
          {{-- <td>
            <a role="button" class="btn btn-sm linkEdit" data-id="{{ $company->company_id }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
            <a role="button" class="btn btn-sm linkDelete" data-id="{{ $company->company_id }}"><i class="bx bx-trash me-1"></i> Delete</a>
          </td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="d-flex justify-content-center mt-3 mb-5">
  {!! $companies->links() !!}
</div>

{{-- @include('hiss.company.partials.modalTambahDataPerusahaan') --}}
{{-- @include('hiss.company.partials.modalDetailMitra') --}}
@endsection
