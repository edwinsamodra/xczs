@extends('layouts.sneat')
@section('content')
<style>
  .card {
 transition: all 300ms;
}

.card:hover {
 opacity: 0.8;
 transform: scale(1.10);
}


.line1{
    font-size: 13px;
    color: #4a4a4a;
    font-weight: bold;
}

.line1{
font-size: 13px;
color: #4a4a4a;
font-weight: bold;
}
  .satu {
    background-color: #0c5795;
    border-radius: 2em;
    font-style: normal;
    color: #e7fcfc;
  }

  .satu h5 {
    color: #e7fcfc;
  }

  .third {
    background-color: #0c5795;
    border-radius: 2em;


  }

  .third h5 {
    color: #ffffff;
  }

  .dua {
    background-color: #0c5795;
    border-radius: 2em;
    font-style: normal;
    color: #e7fcfc;
  }

  .dua h5 {
    color: #e7fcfc;
  }

</style>
<div class="container" style="margin-bottom: 4cm;">
  <div class="irwancard row mt-2" style="box-shadow: 10px; margin-bottom:70px; background-image:url(/images/gambar_peta.png);background-size:cover;">
    <div class="row">
        
      <img src="{{ $profile->logo_asuransi }}" class="mx-auto d-block" alt="{{ $profile->nama_asuransi }}" style="width: 200px; ">
    </div>
    <div class="row mt-3 text-center">
      <h6 style="text-shadow: 1px 1px; color: #79767E;">{{ $profile->nama_asuransi }}</h6>
        <p><b>Alamat:</b> {!! $profile->alamat !!}
        </p>
        <p>PT. Asuransi Jasa Indonesia (Persero) menawarkan program Asuransi Kesehatan yang disebut Jasindo Health. Jasindo Health merupakan produk asuransi kesehatan yang sangat komprehensif meliputi jaminan Rawat Inap, Rawat Jalan, Rawat Gigi, Manfaat Melahirkan, Manfaat Kacamata, serta Manfaat Medical Check Up
        </p>
    </div>
</div>

  {{-- <div class="row" style="margin-bottom:150px; ">
    <div class="col-sm-4 mt-4">
      <img src="images/logo_profil.png" class="card-img-top" alt="Asusansi Jasindo" style="width: 45%;">
    </div>
    <div class="col-sm-8 mt-3">
      <h4 style="text-shadow: 1px 1px; color: #79767E;">JASINDO HEALTH</h4>
      <p>PT. Asuransi Jasa Indonesia (Persero) menawarkan program Asuransi Kesehatan yang disebut Jasindo Health. Jasindo Health merupakan produk asuransi kesehatan yang sangat komprehensif meliputi jaminan Rawat Inap, Rawat Jalan, Rawat Gigi, Manfaat Melahirkan, Manfaat Kacamata, serta Manfaat Medical Check Up
      </p>
    </div>
  </div> --}}
  <div class="text-center">
    <h3 class="mb-3">Paket Asuransi</h3>
  </div>
  <div class="row">
    <div class="col-sm d-flex justify-content-end">
      {{-- <button type="button" id="btnTambahDataProduk" class="btn text-white" data-bs-toggle="modal" style="background-color: #0c5795;">Tambah Data</button> --}}
    </div>
  </div>
  <div class="row justify-content-center">
   
    <div class="col-md-10 m-4">
      <div class="row">
        @foreach($products as $product)
        @if ($product->product_id == 1)
        <div class="col-2">
        <a href="#" class="detailProduk" data-id="{{ $product->product_id }}">
         <div class="card border-0 m-2 h-80">
          <img src="assets/icon/paket_asuransi.png" class="p-2" alt="asuransi" srcset="">
          <div class="card-body text-center">
              <p class="line1 text-center"><b >{{ $product->nama_produk }}</b></p>
            </a>
          </div>
         </div>
        </div>
         @elseif ($product->product_id == 2)
         <div class="col-2">
          <a href="#" class="detailProduk"  data-id="{{ $product->product_id }}">
          <div class="card border-0 m-2 h-80">
           <img src="assets/icon/paket_rawat_inap.png" class="p-2" alt="" srcset="">
           <div class="card-body text-center">
              <p class="line1 text-center">{{ $product->nama_produk }}</p>
            </a>
          </div>
          </div>
         </div>
        
         @elseif ($product->product_id == 3)
         <div class="col-2">
          <a href="#" class="detailProduk"  data-id="{{ $product->product_id }}">
          <div class="card border-0 m-2 h-80">
           <img src="assets/icon/paket_rawat_jalan.png" class="p-2" alt="" srcset="">
           <div class="card-body text-center">
               <p class="line1 text-center">{{ $product->nama_produk }}</p>
             </a>
           </div>
          </div>
         </div>
         @elseif ($product->product_id == 4)
         <div class="col-2">
          <a href="" class="detailProduk"  data-id="{{ $product->product_id }}">
          <div class="card border-0 m-2 h-80">
           <img src="assets/icon/paket_bedah.png" class="p-2" alt="" srcset="">
           <div class="card-body text-center">
               <p class="line1 text-center">{{ $product->nama_produk }}</p>
             </a>
           </div>
          </div>
         </div>
         @elseif ($product->product_id == 5)
       <div class="col-2">
        <a href="#" class="detailProduk"  data-id="{{ $product->product_id }}">
         <div class="card border-0 m-2 h-80">
          <img src="assets/icon/paket_dokter_gigi.png" class="p-2" alt="" srcset="">
          <div class="card-body text-center">
              <p class="line1 text-center">{{ $product->nama_produk }}</p>
            </a>
          </div>
         </div>
        </div>
         @else
       <div class="col-2">
        <a href="#" class="detailProduk"  data-id="{{ $product->product_id }}">
         <div class="card border-0 m-2 h-80">
          <img src="assets/icon/paket_melahirkan.png" class="p-2" alt="" srcset="">
          <div class="card-body text-center">
              <p class="line1 text-center">{{ $product->nama_produk }}</p>
            </a>
          </div>
         </div>
        </div>
         
         @endif
         @endforeach
      </div>
    </div>
  </div>
  
</div>



{{-- @include('hiss.product.partials.modalTambahDataProduk') --}}
@include('hiss.product.partials.modaldetailProduk')
{{-- @include('hiss.product.partials.modalTambahTarif') --}}
@endsection