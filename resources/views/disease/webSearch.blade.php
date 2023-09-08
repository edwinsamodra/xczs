@extends('layouts.sneat')

@section('content')

    <div class="container-fluid  mt-3" data-element="websearch-input">
      <div class="row mt-2 mb-2">
        <div class="col">
          <form class="form">
            <div class="form-group has-search" style="color:black;" id="frmSearch">
              <span class="bx bx-search form-control-feedback"></span>
              <input id="disease-search" style="color:black;" name="disease_search" placeholder="Cari Penyakit"type="text" class="form-control rounded-pill">
            <div id="suggestion-box">
            </div ><input type="hidden" name="disease_id" id="disease-id">
            <div id="list-container" style="display:none;"></div>
              </div>
          </form>
        </div>
      </div>
  
   

    {{-- <div class="container-fluid" id="mainTabContainer" style="visibility:hidden;" data-element="websearch-result-container"> --}}
      {{-- <div class="row mt-3 mb-2 d-flex justify-content-center">
       
        <button type="button" class="col-2 btn text-white" data-bs-toggle="modal" data-bs-target="#modalInput" style="background-color: #0c5795;">Input Data</button>
        
      </div>   --}}
      <div class="card mt-4" id="mainTabContainer" style="visibility:hidden;" data-element="websearch-result-container">
      <div class="row">
          
            <!--Nama Penyakit-->
            <div class="col-lg-6 col-md-sm-xs-12 p-2">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="textlabel form-label" for="Nama_Penyakit"><strong style="color:#566a7f;">Nama Penyakit</strong></label>
                        </div>
                        <div class="col-1">
                            <button style="margin: 0rem -2rem 1rem; border-radius:25px; background-color:#0c5795;"  data-field="txtNamaPenyakit" data-db-field="Nama_Penyakit" type="button" class="btnEdit btn btn-sm d-inline justify-content-end text-white">Edit</button>
                        </div>
                    </div>
                    <textarea class="kotaktex form-control bg-light" id="txtNamaPenyakit" disabled ></textarea>
                </div>
            </div>
            <!--end Nama Penyakit-->
            {{-- <div class="col-2">
            {{-- <table class="col-11"style="margin-top: 47px; margin-left:6px;">
              <thead>
                <tr>
                  <th class="text-center text-white" style="background-color: #217CAB; border-radius:10px 0px 0px 0px">Class</th>
                  <th class="text-center text-white" style="background-color: #217CAB; border-radius:0px 10px 0px 0px">ICD-10 </th>
                </tr>
              </thead>
              <tbody>
               
                <tr>
                  <td> <input type="text" name="Class" id="txtClass" style="color:black;font-family:'Roboto', sans-serif;font-size: 13px;border:2px solid #217CAB; border-radius:0 0 10px 10px;" class="text-center form-control bg-light" disabled></td>
                  <td> <input type="text" name="IcdX" id="txtIcdX" style="color:black;font-family:'Roboto', sans-serif;font-size: 13px;border:2px solid #217CAB; border-radius:0 0 10px 10px;" class="text-center form-control bg-light" disabled></td>
                </tr>
              </tbody>
            </table> 
          </div> --}}
            <!--Diagnosa IcdX-->
            <div class="col-lg-6 col-md-sm-xs-12 p-2">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="textlabel form-label" for="Diagnosa_IcdX"><strong style="color:#566a7f;"> Diagnosa Icd-10 </strong></label>
                        </div>
                        <div class="col-1">
                            <button style="margin: 0rem -2rem 1rem; border-radius:25px; background-color:#0c5795;" data-field="txtDiagnosaIcdx" data-db-field="Diagnosa_Icdx" type="button" class="btnEdit btn btn-sm d-inline justify-content-end text-white">Edit</button>
                        </div>
                    </div>
                    <textarea class="kotaktex form-control bg-light" data-field="Diagnosa_Icdx" id="txtDiagnosaIcdx" disabled ></textarea>
                </div>
            </div>
        </div>
        <!--end Diagnosa IcdX-->

        <!--Remark-->
        <div class="row mb-2">
            <div class="col-lg-6 col-md-sm-xs-12 p-2">
                <div class="mt-2 mb-2">
                    <div class="row d-flex justify-content-between">
                        <div class="col-3">
                            <label class="textlabel form-label" for="Remark"><strong style="color:#566a7f;">Remark</strong></label>
                        </div>
                        <div class="col-1">
                        <button style="margin: 0rem -2rem 1rem; border-radius:25px; background-color:#0c5795;" data-field="txtRemark"  data-db-field="Remark" id="btnEdit" type="button" class="btnEdit btn btn-sm d-inline text-white justify-content-end">Edit</button>
                        </div>
                    </div>
                    <textarea class="kotaktex form-control bg-light" id="txtRemark" disabled ></textarea>
            
                </div>
            </div>
            <!--end Remark-->
            <!--Pre+lama-->
            <div class="col-lg-6 col-md-sm-xs-12 p-2">
              <div class="mt-2 mb-2">
                  <div class="row d-flex justify-content-between">
                      <div class="col-5">
                          <label class="textlabel form-label" for="Remark"><strong style="color:#566a7f;">Pre Exis Med-Condition</strong></label>
                      </div><div class="col-5">
                        <label class="textlabel form-label" for="Remark"><strong style="color:#566a7f;">lama hari inap</strong></label>
                    </div>
                      <div class="col-1">
                      <button style="margin: 0rem -2rem 1rem; border-radius:25px; background-color:#0c5795;" data-field="txtLamaRawat" data-db-field="Lama_Rawat" id="btnEdit" type="button" class="btnEdit btn btn-sm d-inline justify-content-end text-white">Edit</button>
                      </div>
                  </div>
                  <div class="kotaktex" style="padding-top:10px; background-color:white;">
                    <div class="row">
                    <div class="col-5" id="ulTabPreExistingContent">
                      <div class="row"style="padding:20px;">
                        <div class="col-5"id="tabPreExisting">
                          <input class="form-check-input" type="radio" name="pre_existing" id="preExisting_yes" value="Ya">
                            <label class="form-check-label" for="flexRadioDefault1" style="color:black;">
                              Ya
                            </label>
                        </div>
                        <div class="col-5"id="tabPreExisting">
                          <input class="form-check-input" type="radio" name="pre_existing" id="preExisting_no" value="Tidak">
                            <label class="form-check-label" for="flexRadioDefault1" style="color:black;">
                              Tidak
                            </label>
                        </div>
                      </div> 
                    </div>
                    <div class="col-5">
                      
                        <div class="col-auto" style="margin-top: 3px">
                          <input disabled type="text" id="txtLamaRawat" class="form-control" aria-describedby="passwordHelpInline" style="border:2px solid #0c5795; border-radius: 10px; color:black;">
                        </div>
                     
                    </div>
                  </div>

                  </div>
          
              </div>
          </div>
            
        </div>
        


          <!--Button Group1-->
          
            <div class="row justify-content-between p-2">
              <div class="col-10">
              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px; " class="nav-link btn-sm active" id="icdx" data-bs-toggle="pill" data-bs-target="#pills-icdx" type="button" role="tab" aria-controls="pills-icdx" aria-selected="true">Category/ICD-10</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px; " class="nav-link btn-sm" id="Gejala_Klinis" data-bs-toggle="pill" data-bs-target="#pills-Gejala_Klinis" type="button" role="tab" aria-controls="pills-Gejala_Klinis" aria-selected="true">Gejala Klinis</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="txtPenyebab<" data-bs-toggle="pill" data-bs-target="#pills-Penyebab" type="button" role="tab" aria-controls="pills-Penyebab" aria-selected="false">Penyebab</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="P_Lab" data-bs-toggle="pill" data-bs-target="#pills-P_Lab" type="button" role="tab" aria-controls="pills-P_Lab" aria-selected="false">Penunjang</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="elDifferential" data-bs-toggle="pill" data-bs-target="#pills-Differential" type="button" role="tab" aria-controls="tabDifferential" aria-selected="false">Differential</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="Pengobatan" data-bs-toggle="pill" data-bs-target="#pills-Pengobatan" type="button" role="tab" aria-controls="pills-Pengobatan" aria-selected="false">Pengobatan</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px; " class="nav-link btn-sm" id="Prognosis" data-bs-toggle="pill" data-bs-target="#pills-Prognosis" type="button" role="tab" aria-controls="pills-Prognosis" aria-selected="false">Prognosis</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="Komplikasi" data-bs-toggle="pill" data-bs-target="#pills-Komplikasi" type="button" role="tab" aria-controls="pills-Komplikasi" aria-selected="false">Komplikasi</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button style="border-radius:25px;" class="nav-link btn-sm" id="Simpton" data-bs-toggle="pill" data-bs-target="#pills-Simpton" type="button" role="tab" aria-controls="pills-Simpton" aria-selected="false">Simtom</button>
                </li>
              </ul>
              </div>
              <div class="col-1">
              <button style="margin: 0rem -2rem 1rem; border-radius:25px; background-color:#0c5795;" id="btnEditMulti" type="button" class="btn btn-sm d-inline text-white">Edit</button>                
              </div>
          </div>
          <div class="row p-2">
            <div class="tab-content" id="pills-tabContent">
              <div class="kotaktexgroup tab-pane fade show active" id="pills-icdx" role="tabpanel" aria-labelledby="pills-icdx-tab" style="background-color:white;">
                {{-- <table class="tabel table-sm">
                  <thead>
                    <tr>
                      <th>
                        ICD-10
                      </th>
                      <th>
                        Class
                      </th>
                      <th>
                        Kelompok
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p id="txtIcdX"></p>
                      </td>
                      <td>
                        <p id="txtClass"></p>
                      </td>
                      <td>
                        <p id="txtKelompok"></p>
                      </td>
                    </tr>
                  </tbody>
                </table> --}}
                
                
                <div class="row"style="background-color:#0c5795; color :white; border-radius: 7px 7px 0  0;padding-left:5px; ">
                
                  <div class="col-1" style="margin: 0px 0px 0px 0px;"><strong>
                    ICD-10 </strong>

                  </div>
                  <div class="col" style="margin: 0px 0px 0px 0px;"><strong>
                    Class </strong>
                  </div>
                  <div class="col" style="margin: 0px 0px 0px 0px;"><strong> 
                    Kelompok</strong>

                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-1">
                    <p class="formicdx" id="txtIcdX"></p>
                    </div>
                  <div class="col">
                    <p class="col-12 formicdx"  id="txtClass"></p>
                    </div>
                  <div class="col">
                    <p class="col-12 formicdx" id="txtKelompok"></p>
                    </div>
                </div>
              </div>
              
              
              
              
              <div class="groupfield tab-pane fade" id="pills-Gejala_Klinis" data-field="txtGKlinis" data-db-field="GKlinis"role="tabpanel" aria-labelledby="pills-Gejala_Klinis-tab"><textarea disabled class="kotaktexgroup form-control bg-light"  id="txtGKlinis"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Penyebab" data-field="txtPenyebab" data-db-field="Penyebab" role="tabpanel" aria-labelledby="pills-Penyebab-tab"><textarea disabled class="kotaktexgroup form-control bg-light" id="txtPenyebab"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-P_Lab" data-field="txtPemeriksaan" data-db-field="P_Lab" role="tabpanel" aria-labelledby="pills-P_Lab-tab"><textarea disabled class="kotaktexgroup form-control bg-light"  id="txtPemeriksaan"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Differential" data-field="txtDifferential" data-db-field="Differential" role="tabpanel" ><textarea disabled class="kotaktexgroup form-control bg-light" id="txtDifferential" ></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Pengobatan" data-field="txtPengobatan" data-db-field="Pengobatan" role="tabpanel" aria-labelledby="pills-Pengobatan-tab"><textarea disabled class="kotaktexgroup form-control bg-light"  id="txtPengobatan"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Prognosis" data-field="txtPrognosis" data-db-field="Prognosis" role="tabpanel" aria-labelledby="pills-Prognosis-tab"><textarea disabled class="kotaktexgroup form-control bg-light"  id="txtPrognosis"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Komplikasi" data-field="" data-db-field="" role="tabpanel" aria-labelledby="pills-Komplikasi-tab"><textarea disabled class="kotaktexgroup form-control bg-light" data-field="txtKomplikasi" name="Komplikasi" id="Komplikasi"></textarea></div>
              <div class="groupfield tab-pane fade" id="pills-Simpton" data-field="" data-db-field="" role="tabpanel" aria-labelledby="pills-Simpton-tab"><textarea disabled class="kotaktexgroup form-control bg-light" name="Simpton" id="Simpton"></textarea></div>
            </div>
          </div>
      
        <!--end Button Group1-->
        <!--Button Group2-->
         
          <!--end Button Group2-->
       
        </div>

      <div class="mt-2 mb-2 d-flex justify-content-center">
        <div class="ml-2">
        <button type="button" class="btn text-white"style="background-color: #0c5795;">Submit ke SOAP</button>
        </div>
      </div>
    </div>
 

    @include('partials.modalInput')
    
@endsection
