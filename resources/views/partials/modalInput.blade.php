<!--modal Input-->
<div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0c5795; padding-bottom:3px;">
                <h5 class="modal-title text-white" id="modalInputLabel">Penyakit Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!--row 1 Table ICDX-->
                <div class="row mt-3 mb-2 justify-content-center">
                    <table class="col-6">
                        <thead style="border-radius: 25px;">
                            <tr>
                                <th colspan="2"scope="col" class="text-center text-white"
                                    style="border-radius:25px 25px 0px 0px;background-color: #0c5795;;">ICD-X</th>
                            </tr>
                        </thead>
                        <tbody class="mt-3">
                            <tr>
                                <th class="text-center text-white" style="background-color: #0c5795;;">Class</th>
                                <th class="text-center text-white" style="background-color: #0c5795;;">Category </th>
                            </tr>
                            <tr style="border-radius:25px 25px 0px 0px;">
                                <td> <input type="text" id="txtpClass"
                                        style="color:black;font-family:'Roboto', sans-serif;font-size: 13px;"
                                        class="text-center form-control" placeholder="Tuliskan Class"></td>
                                <td> <input type="text" id="txtpIcdX"
                                        style="color:black;font-family:'Roboto', sans-serif;font-size: 13px;"
                                        class="text-center form-control" placeholder="Tuliskan IcdX"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--end row 1 Table ICDX-->
                <!--row 2-->
                <div class="row">
                    <!--Nama Penyakit-->
                    <div class="col-lg-6 col-md-sm-xs-12 p-2">
                        <div class="mt-2 mb-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col-3">
                                    <label class="form-label" for="Nama_Penyakit">Nama Penyakit</label>
                                </div>
                            </div>
                            <textarea class="kotaktex form-control bg-light" id="txtpNamaPenyakit" placeholder="Tuliskan Nama Penyakit"></textarea>
                        </div>
                    </div>
                    <!--end Nama Penyakit-->
                    <!--Diagnosa IcdX-->
                    <div class="col-lg-6 col-md-sm-xs-12 p-2">
                        <div class="mt-2 mb-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col-3">
                                    <label class="form-label" for="Diagnosa_IcdX">Diagnosa IcdX</label>
                                </div>
                            </div>
                            <textarea class="kotaktex form-control bg-light" id="txtpDiagnosaIcdx" placeholder="Tuliskan Diagnosa IcdX"></textarea>
                        </div>
                    </div>
                    <!--end Diagnosa IcdX-->
                </div>
                <!--end row 2-->
                <!--Remark-->
                <div class="row mb-3">
                    <div class="col-lg-6 col-md-sm-xs-12 p-2">
                        <div class="mt-2 mb-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col-3">
                                    <label class="form-label" for="Remark">Remark</label>
                                </div>
                            </div>
                            <textarea class="kotaktex form-control bg-light" placeholder="Tuliskan Remark" id="txtpRemark"></textarea>

                        </div>
                    </div>
                    <!--end Remark-->
                    <!--Pre+lama-->

                    <div class="col-lg-6 col-md-sm-xs-12 p-2">
                        `<div class="container-fluid">
                            <div class="row">
                                <div class="col-6 mt-3" style="border:2px solid #217CAB;; border-radius:10px;">
                                    <div class="row p-3 text-center">
                                        Pre Existing Med-Condition
                                    </div>
                                    <div class="row">
                                        <div class="col-5 p-3">
                                            <input class="form-check-input" type="radio" name="ppre_existing"
                                                value="YA">
                                            <label class="form-check-label" for="flexRadioDefault1"
                                                style="color:black;">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="col-5 p-3"id="tabPreExisting">
                                            <input class="form-check-input" type="radio" name="ppre_existing"
                                                value="TIDAK">
                                            <label class="form-check-label" for="flexRadioDefault1"
                                                style="color:black;">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 mt-2">
                                    <div class="row p-3 text-center">
                                        Lama Hari Inap
                                    </div>
                                    <div class="col-auto p-2">
                                        <input type="text" placeholder="Hari Inap" class="form-control"
                                            aria-describedby="passwordHelpInline"
                                            style="border:2px solid #217CAB;; border-radius: 10px; color:black;"
                                            id="txtpLamaRawat">
                                    </div>
                                </div>
                            </div>
                        </div>`
                    </div>
                </div>

                <!--end Pre+lama-->
                <div class="row">
                    <!--Button Group1-->
                    <div class="col-12 p-2 ">
                        <div class="row mb-2">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px;" class="nav-link btn-sm active"
                                        id="pGejala_Klinis" data-bs-toggle="pill"
                                        data-bs-target="#pills-input-Gejala_Klinis" type="button" role="tab"
                                        aria-controls="pills-Gejala_Klinis" aria-selected="true">Gejala
                                        Klinis</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px;" class="nav-link btn-sm" id="pPenyebab"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Penyebab" type="button"
                                        role="tab" aria-controls="pills-Penyebab"
                                        aria-selected="false">Penyebab</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px;" class="nav-link btn-sm" id="pP_Lab"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-P_Lab" type="button"
                                        role="tab" aria-controls="pills-P_Lab"
                                        aria-selected="false">Penunjang</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px;" class="nav-link btn-sm" id="pDifferential"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Differential"
                                        type="button" role="tab" aria-controls="tabDifferential"
                                        aria-selected="false">Differential</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px" class="nav-link btn-sm" id="pPengobatan"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Pengobatan" type="button"
                                        role="tab" aria-controls="pills-Pengobatan"
                                        aria-selected="false">Pengobatan</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px" class="nav-link btn-sm" id="pPrognosis"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Prognosis" type="button"
                                        role="tab" aria-controls="pills-Prognosis"
                                        aria-selected="false">Prognosis</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px" class="nav-link btn-sm" id="pKomplikasi"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Komplikasi" type="button"
                                        role="tab" aria-controls="pills-Komplikasi"
                                        aria-selected="false">Komplikasi</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button style="border-radius:25px" class="nav-link btn-sm" id="pSimpton"
                                        data-bs-toggle="pill" data-bs-target="#pills-input-Simpton" type="button"
                                        role="tab" aria-controls="pills-Simpton"
                                        aria-selected="false">Simpton</button>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-input-Gejala_Klinis" role="tabpanel"
                                    aria-labelledby="pills-Gejala_Klinis-tab">
                                    <textarea placeholder="Tuliskan Gejala Klinis" class="kotaktexgroup form-control bg-light" id="txtpGKlinis"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Penyebab" role="tabpanel"
                                    aria-labelledby="pills-Penyebab-tab">
                                    <textarea placeholder="Tuliskan Penyebab" class="kotaktexgroup form-control bg-light" data-field="txtPenyebab"
                                        id="txtpPenyebab"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-P_Lab" role="tabpanel"
                                    aria-labelledby="pills-P_Lab-tab">
                                    <textarea placeholder="Tuliskan Penunjang" class="kotaktexgroup form-control bg-light" id="txtpPemeriksaan"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Differential" role="tabpanel">
                                    <textarea placeholder="Tuliskan Differential" class="kotaktexgroup form-control bg-light"
                                        data-field="txtDifferential" id="txtpDifferential"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Pengobatan" role="tabpanel"
                                    aria-labelledby="pills-Pengobatan-tab">
                                    <textarea placeholder="Tuliskan Pengobatan" class="kotaktexgroup form-control bg-light" data-field="txtPengobatan"
                                        id="txtpPengobatan"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Prognosis" role="tabpanel"
                                    aria-labelledby="pills-Prognosis-tab">
                                    <textarea placeholder="Tuliskan Prognosis" class="kotaktexgroup form-control bg-light" id="txtpPrognosis"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Komplikasi" role="tabpanel"
                                    aria-labelledby="pills-Komplikasi-tab">
                                    <textarea placeholder="Tuliskan Komplikasi" class="kotaktexgroup form-control bg-light" data-field="txtKomplikasi"
                                        id="Komplikasi"></textarea>
                                </div>
                                <div class="tab-pane fade" id="pills-input-Simpton" role="tabpanel"
                                    aria-labelledby="pills-Simpton-tab">
                                    <textarea placeholder="Tuliskan Simpton" class="kotaktexgroup form-control bg-light" id="Simpton"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end Button Group1-->
                    <!--Button Group2-->
                    {{-- <div class="col-6 p-2">
        <div class="row">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            
          </ul>
        </div>
        <div class="row">
          <div class="tab-content" id="pills-tabContent">
            
          </div>
        </div>
      </div> --}}
                    <!--end Button Group2-->
                </div>
                <div class="row">

                </div>
                <!--end content-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnDiseaseSubmit"
                    style="background: #0c5795; border-radius:5px;">Tambah Penyakit</button>
            </div>
        </div>
    </div>
</div>
