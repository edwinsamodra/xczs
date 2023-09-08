@extends('layouts.sneat')

@section('content')
@include('partials.modalTambahdataPeserta')
@include('partials.modaldetailPeserta')
<style>

.card {
 background: rgb(255, 255, 255);
 border-radius: 1.4em;
 box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
 border: rgb(250, 250, 250) 0.2em solid;
}

  </style>
<div class="card m-5">
    <div class="row d-flex justify-content-between">
      <div class="col-6">
        <h5 class="card-header">Data Peserta</h5>
      </div>  
      <div class="col-6">
        <div class="col-sm d-flex justify-content-end">
          <button type="button" class="btn text-white" style="background-color:#0c5795;">Convert MS Excel</button>&nbsp;

            <button type="button" class="btn text-white" data-bs-toggle="modal" data-bs-target="#modalTambahdataPeserta" style="background-color: #0c5795;">Tambah Data</button>
        </div>
      </div> 
      </div>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-4">
          <div class="card-body demo-vertical-spacing demo-only-element">
            <div class="input-group input-group-merge">
              <select class="btn" id="inputGroupSelect01"style="background-color:#0c5795; color:white;">
                <option selected>Pilih</option>
                <option value="1">Nama Perusahaan</option>
                <option value="2">Nama Perseorangan</option>
              </select>
              <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
              <input
                type="text"
                class="form-control"
                placeholder="Search..."
                aria-label="Search..."
                aria-describedby="basic-addon-search31"
              />
              <button type="button" class="btn"style="background-color:#0c5795; color:white;">cari</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive text-trucate">
      <table class="table table-hover">
        <thead>
          <tr>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">No</td>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">No Polis</td>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">Nama</td>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">Alamat</td>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">Tanggal Lahir</td>
            <td style="color: #697a8d;font-weight: bold;text-align: center;">Jenis Kelamin</td>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0 text-center">
          <tr>
            <td>1</td>
            
            <td> 20007-000104</td>
            <td><a href data-bs-toggle="modal" data-bs-target="#modaldetailPeserta">Irwan Setiawan</a></td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>2</td>
            
            <td>20007-000102</td>
            <td>Irwin Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>3</td>
           
            <td>20007-000103</td>
            <td>Arwan Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>4</td>
            
            <td>20007-000105</td>
            <td>Irwan Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>5</td>
           
            <td>20007-000104</td>
            <td>ahmad Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>6</td>
           
            <td>20007-000167</td>
            <td>Sambo Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>7</td>
           
            <td>20007-000123</td>
            <td>Sule Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          <tr>
            <td>8</td>
           
            <td>20007-000134</td>
            <td>Sasa Setiawan</td>
            <td>Taman Alamanda</td>
            <td>24-Agustus-1999</td>
            <td>L</td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>

    
@endsection
