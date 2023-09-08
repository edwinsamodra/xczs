@extends('layouts.sneat')

@section('content')
<style>
  #tableobat tr td {
  border: 1px;
}

#tableobat tr td:first-child {
  width: 25%;
}
#tableobat tr td:nth-child(2) {
  width: 75%;
}
</style>

    <div class="container  mt-3" data-element="websearch-input">
      <div class="row mt-2 mb-5">
        <div class="col">
          <form class="form">
            <div class="form-group has-search" style="color:black;" id="frmSearch">
              <span class="bx bx-search form-control-feedback"></span>
              <input id="disease-search" style="color:black;" placeholder="Cari Obat"type="text" class="form-control rounded-pill">
             
              </div ><input type="hidden" name="disease_id" id="disease-id">
              <div id="list-container" style="display:none;"></div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container bg-white">
   
     
    </div>

    <div class="container-fluid" id="mainTabContainer" style="background-color:white;" data-element="websearch-result-container">
      <div class="card mb-5">
        <h5 class="card-header">Obat</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered" id="tableobat">
            <thead>
              <tr>
                <th>Merk</th>
                <th>Abbotic</th>
               
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Generik</strong></td>
                <td>Clarithromycin</td>
                
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Detail</strong></td>
                <td>-</td>
                
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Sub Golongan</strong></td>
                <td>Makrolid/Antibiotika</td>
               
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Golongan</strong></td>
                <td>Antibiotics</td>
               
              </tr>
              <tr>
                <td>
                  <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Nama Pabrik</strong>
                </td>
                <td>Abbot</td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card">
        <h5 class="card-header">Obat Detail</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Kemasan</th>
                <th>Kandungan</th>
                <th>Harga</th>
               
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Abbotic</strong></td>
                <td></td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Abbotic</strong></td>
                <td></td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td><i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Abbotic</strong></td>
                <td></td>
                <td></td>
                <td></td>
               
              </tr>
              <tr>
                <td>
                  <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Abbotic</strong>
                </td>
                <td></td>
                <td></td>
                <td></td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
        

    
    </div>

    {{-- @include('partials.modalInputobat') --}}
    
@endsection
