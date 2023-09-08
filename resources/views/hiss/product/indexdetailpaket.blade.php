@extends('layouts.sneat')

@section('content')
<div class="card m-5">
  <div class="row d-flex justify-content-between">
    <div class="col-6">
      <h5 class="card-header">Detail  Asuransi</h5>
    </div>  
    <div class="col-6">
      <div class="col-sm d-flex justify-content-end">
        {{-- <button id="btnTambahDataCabangPerusahaan" type="button" class="btn text-white" style="background-color: #0c5795;">Tambah Data</button> --}}
      </div>
    </div> 
  </div>
  {{-- <div class="col-lg-6 col-sm-md-12 card-body demo-vertical-spacing demo-only-element">
    <form method="GET" action="/detailpaket/{{ $kdPaket }}">
    <div class="input-group input-group-merge">
     
      <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
      <input name="keyword" 
        type="text"
        class="form-control"
        placeholder="Cari Paket"
        aria-label="Search..."
        aria-describedby="basic-addon-search31"
      />
      <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
    </div>
  </form>
  </div> --}}
  <div class="table-responsive text-nowrap p-3">
    <table class="table table-hover">
      <thead>
        <tr>
          {{-- <td style="color: #697a8d;font-weight: bold;">No</td> --}}
          <td style="color: #697a8d;font-weight: bold;">SLA</td>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        
    
          @foreach ($detailpaket as $detailpakets)
            {{-- <td>{{ $loop->iteration }}</td> --}}
          <th class="text-primary">{{ $detailpakets->SLA }}</th class="text-primary">
          @endforeach
    
       
        
      </tbody>
    </table>
  </div>   
</div>
<div class="d-flex justify-content-center mt-3 mb-5">
  {{-- {!! $branchcompanies->links() !!} --}}
</div>

{{-- @include('hiss.company.partials.modalTambahDataCabangPerusahaan') --}}
{{-- @include('hiss.company.partials.modalDetailMitra') --}}
@endsection
