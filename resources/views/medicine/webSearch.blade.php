@extends('layouts.sneat')

@section('content')
<style>
  
#tblMedicineSummary tr td:first-child {
  width: 35%;
}
#tblMedicineSummary tr td:nth-child(2) {
  width: 65%;
}
#tblMedicineDetail {
  color: white;
}

</style>

    <div class="container-fluid mt-3 mb-2" data-element="websearch-input">
      <div class="row mt-2 mb-3">
        <div class="col">
          <form class="form">
            <div class="form-group has-search" style="color:black;" id="frmSearch">
              <span class="bx bx-search form-control-feedback"></span>
              <input id="medicine-search" style="color:black; border-radius:20px;" placeholder="Cari Obat"type="text" class="form-control">
              <div id="suggestion-box">
              </div ><input type="hidden" name="disease_id" id="disease-id">
              <div id="list-container" style="display:none;"></div>
              
              </div>
          </form>
        </div>
      </div>
    </div>
  

    <div class="container-fluid" id="mainTabContainerObat" style="visibility:hidden;" data-element="websearch-result-container">
      
      <div class="card mb-3 p-2" style="background:#0c5795">
       
        <div class="table-responsive text-nowrap">
          <table class="table table-sm" id="tblMedicineSummary">
            <thead >
              <tr>
                <th style="color: white">Merk</th>
                <td><strong> <span style="color: white"id="lblMerk"></strong></span></td>               
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <tr>
                <th style="color: white">Generik</th>
                <td><strong> <span style="color: white"id="lblGenerik"></strong></span></td>
                
              </tr>
              <tr>
                <th style="color: white">Detail</th>
                <td><strong> <span style="color: white"id="lblDetail"></strong></span></td>
                
              </tr>
              <tr>
                <th style="color: white">Sub Golongan</th>
                <td><strong> <span style="color: white"id="lblNamaSubGolongan"></strong></span></td>
               
              </tr>
              <tr>
                <th style="color: white">Golongan</th>
                <td><strong> <span style="color: white"id="lblNamaGolongan"></strong></span></td>
               
              </tr>
              <tr>
                <th style="color: white">Nama Pabrik</th>
                <td><strong> <span style="color: white"id="lblNamaPabrik"></strong></span></td>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card mb-2 p-2" >
       
        <div class="table-responsive text-truncate">
          <table class="table table-sm-bordered" id="tblMedicineDetail">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Kemasan</th>
                <th>Kandungan</th>
                <th>Harga</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
          </table>
        </div>
    
      </div>
    </div>    
@endsection
