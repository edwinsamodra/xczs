@extends('layouts.sneat')

@section('content')
    <style>
        .list-item {
            border-bottom: solid 1px silver;
            border-width: 90%;
            padding: 5px 7px 5px 7px;
            width: 470px;
            overflow: hidden;
        }

        .list-item:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        table#tblResult th {
            background-color: #898BFF;
            color: white;
        }

        table#tblResult th,
        td {
            text-align: center;
        }

        .nav-tabs .nav-item .nav-link.active {
            background-color: #898BFF;
            color: #FFF;
        }

        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
        }

        th,
        td {
            padding: 1em;
            background: #898BFF;
            border-bottom: 2px solid white;
        }

        #myTab>li>button {
            border-radius: 1em;
        }

        #suggestion-box {
            width: 470px;
        }

        table#tblResult td.catColumnHeader {
            background-color: #898BFF;
            color: #fff;
            font-weight: bold;
        }

        .catSearchButton {
            margin-left: -20px;
            font-weight: bold;
            border: none;
            background-color: #898BFF;
            border-radius: 10px 10px;
            padding: 7px;
            color: white;
        }

        .catSearchTextbox {
            display: inline-block;
            width: 400px;
            border: solid 1px silver;
        }

        button.nav-link {
            border-radius:10px 10px 0 0;
        }

        .catContentBox {
            padding: 10px;
            border: solid 1px #898BFF;
            border-radius:0 0 10px 10px;
        }

        .catRoundedTop {
            border: solid 1px #898BFF;
            border-radius:10px 10px 0 0;
        }
    </style>

    <div class="container" id="mainTabContainer" data-element="websearch-result-container">

        <div class="mt-3 row d-flex justify-content-center">
            <table id="tblResult" class="table table-bordered mt-4" style="width:50%;">

                <tr>
                    <td colspan="2" class="catColumnHeader">ICD-10</td>
                </tr>

                <tr>
                    <td class="catColumnHeader">CLASS</td>
                    <td class="catColumnHeader">CATEGORY</td>
                </tr>

                <tr>
                    <td>
                        <div><input class="text-center" type="text" id="txtClass"></div>
                    </td>
                    <td>
                        <div><input class="text-center" type="text" id="txtIcdX"></div>
                    </td>
                </tr>

            </table>
        </div>

        <div class="row d-flex justify-content-center" style="margin-bottom:30px;margin-top:30px;">
            <div class="col">
                <div class="container">
                    <div class="row" style="border-bottom:solid 1px #898BFF;margin-left:1px;margin-right:3px;">
                        <div class="col">
                            <span style="border-radius:1em;margin-left:-13px;background-color:#898BFF;color:#fff;padding:5px;">NAMA PENYAKIT</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="tabNamaPenyakit"
                            style="border:solid 1px #898BFF;border-top:0;padding:10px;border-radius:1em;"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" id="txtNamaPenyakit" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col mt-2 mb-2">
                <div class="container">
                    <div class="row" style="border-bottom:solid 1px #898BFF;margin-left:1px;margin-right:3px;">
                        <div class="col">
                            <span style="border-radius:1em;margin-left:-13px;background-color:#898BFF;color:#fff;padding:5px;">DIAGNOSA SESUAI ICD-10</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="colDiagnosaIcdx"
                            style="border:solid 1px #898BFF;border-top:0;padding:10px;border-radius:1em;"><textarea style="width:100%;" id="txtDiagnosaIcdx" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <ul class="nav nav-tabs" id="ulTabPenyebab" role="tablist" style="margin-left:30px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="elPenyebab" data-bs-toggle="tab" data-bs-target="#tabPenyebab"
                        type="button" role="tab" aria-controls="tabPenyebab" aria-selected="true" style="border-radius:10px 10px 0 0;">PENYEBAB</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="elPemeriksaan" data-bs-toggle="tab" data-bs-target="#tabPemeriksaan"
                        type="button" role="tab" aria-controls="tabPemerisaan"
                        aria-selected="false" style="border-radius:10px 10px 0 0;">PEMERIKSAAN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="elPengobatan" data-bs-toggle="tab" data-bs-target="#tabPengobatan"
                        type="button" role="tab" aria-controls="tabPengobatan"
                        aria-selected="false" style="border-radius:10px 10px 0 0;">PENGOBATAN</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="elKomplikasi" data-bs-toggle="tab" data-bs-target="#tabKomplikasi"
                        type="button" role="tab" aria-controls="tabKomplikasi"
                        aria-selected="false" style="border-radius:10px 10px 0 0;">KOMPLIKASI</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="elDifferential" data-bs-toggle="tab" data-bs-target="#tabDifferential"
                        type="button" role="tab" aria-controls="tabDifferential"
                        aria-selected="false" style="border-radius:10px 10px 0 0;">DIFFERENTIAL DIAGNOSA</button>
                </li>
            </ul>

            <div class="tab-content" id="ulTabPenyebabContent" style="margin-top:-23px;margin-left:5px;width:77%;">
                <div class="catContentBox tab-pane fade show active" id="tabPenyebab" data-field="txtPenyebab" role="tabpanel" aria-labelledby="tabPenyebab"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtPenyebab"></textarea></div>
                <div class="catContentBox tab-pane fade" id="tabPemeriksaan" data-field="txtPemeriksaan" role="tabpanel" aria-labelledby="tabPemeriksaan"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtPemeriksaan"></textarea></div>
                <div class="catContentBox tab-pane fade" id="tabPengobatan" data-field="txtPengobatan" role="tabpanel" aria-labelledby="tabPengobatan"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtPengobatan"></textarea></div>
                <div class="catContentBox tab-pane fade" id="tabKomplikasi" data-field="txtKomplikasi" role="tabpanel" aria-labelledby="tabKomplikasi"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtKomplikasi"></textarea></div>
                <div class="catContentBox tab-pane fade" id="tabDifferential" data-field="txtDifferential" role="tabpanel" aria-labelledby="tabDifferential"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtDifferential"></textarea></div>
            </div>

        </div>

        <div class="row" style="margin-top:20px;margin-bottom:30px;">
            <ul class="nav nav-tabs" id="ulTabPreExisting" role="tablist" style="margin-left:30px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="elPreExisting" data-bs-toggle="tab" data-bs-target="#tabPreExisting"
                        type="button" role="tab" aria-controls="tabPreExisting" aria-selected="true" style="border-radius:10px 10px 0 0;">PRE EXISTING</button>
                </li>	
            </ul>
            
            <div class="tab-content" id="ulTabPreExistingContent" style="margin-top:-23px;margin-left:5px;width:77%;">
                <div class="catContentBox tab-pane fade show active" id="tabPreExisting" role="tabpanel" aria-labelledby="tabPreExisting"
                    tabindex="0"><span><input value="YA" name="pre_existing" id="preExisting_yes" type="radio">&nbsp;Ya</span>&nbsp;&nbsp;&nbsp;<span><input value="TIDAK" name="pre_existing" id="preExisting_no" type="radio" checked>&nbsp;Tidak</span></div>
            </div>
        </div>


        <div class="row d-flex ms-2 mt-3 mb-2">
            <div>Lama Hari Inap&nbsp;&nbsp;<input value="0" style="padding:5px;width:50px;border:solid 1px #898BFF;" id="txtLamaRawat" type="text"></div>
        </div>

        <div class="row" style="margin-top:30px;margin-bottom:30px;">
            <ul class="nav nav-tabs" id="ulTabRemark" role="tablist" style="margin-left:30px;">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="elRemark" data-bs-toggle="tab" data-bs-target="#tabRemark"
                        type="button" role="tab" aria-controls="tabRemark" aria-selected="true" style="border-radius:10px 10px 0 0;">REMARK</button>
                </li>	
            </ul>
            
            <div class="tab-content" id="ulTabRemarkContent" style="margin-top:-23px;margin-left:5px;width:77%;">
                <div class="catContentBox tab-pane fade show active" id="tabRemark" role="tabpanel" aria-labelledby="tabRemark"
                    tabindex="0"><textarea style="width:100%;padding:5px;border:solid 1px #898BFF;" rows="5" id="txtRemark"></textarea></div>
            </div>
        </div>

        <div class="row">
            <button type="button" class="btn btn-primary" id="btnDiseaseSubmit">SIMPAN</button>
        </div>

    </div>
@endsection