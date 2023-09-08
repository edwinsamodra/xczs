@extends('layouts.sneat')

@section('content')
@php
  
@endphp
    <div class="container  mt-3" style="background-color:white;  "data-element="websearch-input">
      <div class="row mt-2 mb-2">
        <div class="col">
          <form class="form">
            <div class="form-group has-search" style="color:black;" id="frmSearch">
              
              <span class="bx bx-search form-control-feedback"></span>
             
              <input id="disease-search" style="color:black;" name="disease_search" type="text" class="form-control rounded-pill">
              
              
              <div id="suggestion-box">
              </div ><input type="hidden" name="disease_id" id="disease-id">
              <div id="list-container" style="display:none;"></div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class="container bg-white">
    <div class="row mt-3 mb-2 d-flex justify-content-center">
       
       <button type="button" class="col-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInput" style="background-color: #898bff;">Input Data</button>
       
     </div>
      <div class="row mt-3 mb-2 justify-content-center">
        <table class="col-6">
          <thead style="border-radius: 25px;">
            <tr>
              <th colspan="2"scope="col" class="text-center text-white" style="border-radius:25px 25px 0px 0px;background-color: #898bff;">ICD-X</th>
            </tr>
          </thead>
          <tbody class="mt-3">
            <tr>
              <th class="text-center text-white" style="background-color: #898bff;">Class</th>
              <th class="text-center text-white" style="background-color: #898bff;">Category </th>
            </tr>
            <tr style="border-radius:25px 25px 0px 0px;">
              <td> <input type="text" name="Class" id="txtClass" style="color:black;" class="text-center form-control bg-light"disabled></td>
              <td> <input type="text" name="IcdX" id="txtIcdX" style="color:black;" class="text-center form-control bg-light"disabled></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="container" id="mainTabContainer" style="background-color:white; visibility:hidden;" data-element="websearch-result-container">
        <div class="row">
          
            <!--Nama Penyakit-->
            <div class="col-6">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="form-label" for="Nama_Penyakit">Nama Penyakit</label>
                        </div>
                        <div class="col-1">
                            <button style="margin: 0rem -2rem 1rem; border-radius:25px"  data-field="txtNamaPenyakit" data-db-field="Nama_Penyakit" type="button" class="btnEdit btn btn-primary btn-sm d-inline justify-content-end">Edit</button>
                        </div>
                    </div>
                    <textarea class="form-control bg-light" id="txtNamaPenyakit" disabled
                    style="height: 100px; border:4px solid #898BFF; border-radius: 25px; color:black;"></textarea>
                </div>
            </div>
            <!--end Nama Penyakit-->

            <!--Diagnosa IcdX-->
            <div class="col-6">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="form-label" for="Diagnosa_IcdX">Diagnosa IcdX</label>
                        </div>
                        <div class="col-1">
                            <button style="margin: 0rem -2rem 1rem; border-radius:25px" data-field="txtDiagnosaIcdx" data-db-field="Diagnosa_Icdx" type="button" class="btnEdit btn btn-primary btn-sm d-inline justify-content-end">Edit</button>
                        </div>
                    </div>
                    <textarea class="form-control bg-light" data-field="Diagnosa_Icdx" id="txtDiagnosaIcdx" disabled
                      style="height: 100px; border:4px solid #898BFF; border-radius: 25px; color:black;"></textarea>
                </div>
            </div>
        </div>
        <!--end Diagnosa IcdX-->

        <!--Remark-->
        <div class="row mb-3">
            <div class="col-6">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="form-label" for="Remark">Remark</label>
                        </div>
                        <div class="col-1">
                        <button style="margin: 0rem -2rem 1rem; border-radius:25px" data-field="txtRemark"  data-db-field="Remark" id="btnEdit" type="button" class="btnEdit btn btn-primary btn-sm d-inline justify-content-end">Edit</button>
                        </div>
                    </div>
                    <textarea class="form-control bg-light" id="txtRemark" disabled
                    style="height: 100px; border:4px solid #898BFF; border-radius: 25px; color:black;"></textarea>
            
                </div>
            </div>
            <!--end Remark-->
            <!--Pre+lama-->
            
            <div class="col-6">
            <div class="container-fluid">
              <div class="row">
                <div class="col-6 mt-5" style="border:4px solid #898BFF; border-radius:25px;">
                  <div class="row p-3 text-center">
                    Pre Existing Med-Condition
                  </div>
                  <div class="row" id="ulTabPreExistingContent">
                    <div class="col-5 p-3"id="tabPreExisting">
                      <input class="form-check-input" type="radio" name="pre_existing" id="preExisting_yes" value="Ya">
                        <label class="form-check-label" for="flexRadioDefault1" style="color:black;">
                          Ya
                        </label>
                    </div>
                    <div class="col-5 p-3"id="tabPreExisting">
                      <input class="form-check-input" type="radio" name="pre_existing" id="preExisting_no" value="Tidak">
                        <label class="form-check-label" for="flexRadioDefault1" style="color:black;">
                          Tdak
                        </label>
                    </div>
                  </div>
                </div>
                <div class="col-6 mt-5">
                  <div class="row d-flex justify-conten-between">
                    <div class="col">
                    Lama Hari Inap
                    </div>
                    <div class="col-1">
                    <button style="margin: 0rem -2rem 1rem; border-radius:25px" data-field="txtLamaRawat" data-db-field="Lama_Rawat" id="btnEdit" type="button" class="btnEdit btn btn-primary btn-sm d-inline">Edit</button>
                    </div>
                  </div>
                  <div class="col-auto">
                    <input disabled type="text" id="txtLamaRawat" class="form-control" aria-describedby="passwordHelpInline" style="border:4px solid #898BFF; border-radius: 25px; color:black;">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
    
        <div class="row justify-content-between">
          <div class="col-10">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px;" class="nav-link btn-sm active" id="Gejala_Klinis" data-bs-toggle="pill" data-bs-target="#pills-Gejala_Klinis" type="button" role="tab" aria-controls="pills-Gejala_Klinis" aria-selected="true">Gejala Klinis</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px;" class="nav-link btn-sm" id="txtPenyebab<" data-bs-toggle="pill" data-bs-target="#pills-Penyebab" type="button" role="tab" aria-controls="pills-Penyebab" aria-selected="false">Penyebab</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px;" class="nav-link btn-sm" id="P_Lab" data-bs-toggle="pill" data-bs-target="#pills-P_Lab" type="button" role="tab" aria-controls="pills-P_Lab" aria-selected="false">P_Lab</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px;" class="nav-link btn-sm" id="elDifferential" data-bs-toggle="pill" data-bs-target="#pills-Differential" type="button" role="tab" aria-controls="tabDifferential" aria-selected="false">Differential</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px" class="nav-link btn-sm" id="Pengobatan" data-bs-toggle="pill" data-bs-target="#pills-Pengobatan" type="button" role="tab" aria-controls="pills-Pengobatan" aria-selected="false">Pengobatan</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px" class="nav-link btn-sm" id="Prognosis" data-bs-toggle="pill" data-bs-target="#pills-Prognosis" type="button" role="tab" aria-controls="pills-Prognosis" aria-selected="false">Prognosis</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px" class="nav-link btn-sm" id="Komplikasi" data-bs-toggle="pill" data-bs-target="#pills-Komplikasi" type="button" role="tab" aria-controls="pills-Komplikasi" aria-selected="false">Komplikasi</button>
            </li>
            <li class="nav-item" role="presentation">
              <button style="border-radius:25px" class="nav-link btn-sm" id="Simpton" data-bs-toggle="pill" data-bs-target="#pills-Simpton" type="button" role="tab" aria-controls="pills-Simpton" aria-selected="false">Simpton</button>
            </li>
          </ul>
          </div>
          <div class="col-1">
          <button style="margin: 0rem -2rem 1rem; border-radius:25px" id="btnEditMulti" type="button" class="btn btn-primary btn-sm d-inline">Edit</button>                
          </div>
      </div>
      <div class="row">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-Gejala_Klinis" data-field="txtGKlinis" data-db-field="GKlinis"role="tabpanel" aria-labelledby="pills-Gejala_Klinis-tab"><textarea disabled class="form-control bg-light"  id="txtGKlinis"
              style="height: 150px;border:4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-Penyebab" data-field="txtPenyebab" data-db-field="Penyebab" role="tabpanel" aria-labelledby="pills-Penyebab-tab"><textarea disabled class="form-control bg-light" id="txtPenyebab"
              style="height: 150px;border:4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-P_Lab" data-field="txtPemeriksaan" data-db-field="P_Lab" role="tabpanel" aria-labelledby="pills-P_Lab-tab"><textarea disabled class="form-control bg-light"  id="txtPemeriksaan"
              style="height: 150px;border:4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-Differential" data-field="txtDifferential" data-db-field="Differential" role="tabpanel" ><textarea disabled class="form-control bg-light" id="txtDifferential" 
              style="height: 150px;border:4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade show" id="pills-Pengobatan" data-field="txtPengobatan" data-db-field="Pengobatan" role="tabpanel" aria-labelledby="pills-Pengobatan-tab"><textarea disabled class="form-control bg-light"  id="txtPengobatan"
              style="height: 150px;border: 4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-Prognosis" data-field="txtPrognosis" data-db-field="Prognosis" role="tabpanel" aria-labelledby="pills-Prognosis-tab"><textarea disabled class="form-control bg-light"  id="txtPrognosis"
              style="height: 150px;border: 4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-Komplikasi" data-field="" data-db-field="" role="tabpanel" aria-labelledby="pills-Komplikasi-tab"><textarea disabled class="form-control bg-light" data-field="txtKomplikasi" name="Komplikasi" id="Komplikasi"
              style="height: 150px;border: 4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
          <div class="tab-pane fade" id="pills-Simpton" data-field="" data-db-field="" role="tabpanel" aria-labelledby="pills-Simpton-tab"><textarea disabled class="form-control bg-light" name="Simpton" id="Simpton"
              style="height: 150px;border: 4px solid #898BFF;border-radius: 25px; color:black;"></textarea></div>
        </div>
      </div>
      
        <!--end Button Group1-->
        <!--Button Group2-->
         
          <!--end Button Group2-->
       
        

      <div class="mt-2 mb-2 d-flex justify-content-center">
        <div class="ml-2">
        <button type="button" class="btn btn-primary">Submit ke SOAP</button>
        </div>
      </div>
    </div>

    @include('partials.modalInput')
    
@endsection
