  <!--modal Input-->
  <style>
.cbp_tmtimeline {
    margin: 0;
    padding: 0;
    list-style: none;
    position: relative;
}

.cbp_tmtimeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 1px;
    background: #eee;
    left: 5%;
    margin-left: -6px
}

.cbp_tmtimeline>li {
    position: relative
}

.cbp_tmtimeline>li:first-child .cbp_tmtime span.large {
    color: #444;
    font-size: 17px !important;
    font-weight: 700
}

.cbp_tmtimeline>li:first-child .cbp_tmicon {
    background: #fff;
    color: #fff
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmtime span:last-child {
    color: #444;
    font-size: 13px
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel {
    background: #f0f1f3
}

.cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel:after {
    border-right-color: #f0f1f3
}

.cbp_tmtimeline>li .empty span {
    color: #777
}

.cbp_tmtimeline>li .cbp_tmtime {
    display: block;
    width: 23%;
    padding-right: 70px;
    position: absolute
}

.cbp_tmtimeline>li .cbp_tmtime span {
    display: block;
    text-align: right
}

.cbp_tmtimeline>li .cbp_tmtime span:first-child {
    font-size: 15px;
    color: #3d4c5a;
    font-weight: 700
}

.cbp_tmtimeline>li .cbp_tmtime span:last-child {
    font-size: 14px;
    color: #444
}
/* top */
.cbp_tmtimeline>li .cbp_tmlabel {
    margin: 10px 0 5px 10%;
    background: #f0f1f3;
    padding: 1.2em;
    position: relative;
    border-radius: 5px
}

.cbp_tmtimeline>li .cbp_tmlabel:after {
    right: 100%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-right-color: #f0f1f3;
    border-width: 10px;
    top: 10px
}

.cbp_tmtimeline>li .cbp_tmlabel blockquote {
    font-size: 16px
}

.cbp_tmtimeline>li .cbp_tmlabel .map-checkin {
    border: 5px solid rgba(235, 235, 235, 0.2);
    -moz-box-shadow: 0px 0px 0px 1px #ebebeb;
    -webkit-box-shadow: 0px 0px 0px 1px #ebebeb;
    box-shadow: 0px 0px 0px 1px #ebebeb;
    background: #fff !important
}

.cbp_tmtimeline>li .cbp_tmlabel h2 {
    margin: 0px;
    padding: 0 0 10px 0;
    line-height: 26px;
    font-size: 16px;
    font-weight: normal
}

.cbp_tmtimeline>li .cbp_tmlabel h2 a {
    font-size: 15px
}

.cbp_tmtimeline>li .cbp_tmlabel h2 a:hover {
    text-decoration: none
}

.cbp_tmtimeline>li .cbp_tmlabel h2 span {
    font-size: 15px
}

.cbp_tmtimeline>li .cbp_tmlabel p {
    color: #444
}

.cbp_tmtimeline>li .cbp_tmicon {
    width: 40px;
    height: 40px;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    font-size: 1.4em;
    line-height: 40px;
    -webkit-font-smoothing: antialiased;
    position: absolute;
    color: #fff;
    background: #46a4da;
    border-radius: 50%;
    box-shadow: 0 0 0 5px #f5f5f6;
    text-align: center;
    left: 5%;
    top: 0;
    margin: 0 0 0 -25px
}

@media screen and (max-width: 992px) and (min-width: 768px) {
    .cbp_tmtimeline>li .cbp_tmtime {
    }
}

@media screen and (max-width: 65.375em) {
    .cbp_tmtimeline>li .cbp_tmtime span:last-child {
        font-size: 12px
    }
}

@media screen and (max-width: 47.2em) {
    .cbp_tmtimeline:before {
        display: none
    }
    .cbp_tmtimeline>li .cbp_tmtime {
        width: 100%;
        position: relative;
        padding: 0 0 10px 0
    }
    .cbp_tmtimeline>li .cbp_tmtime span {
        text-align: left
    }
    .cbp_tmtimeline>li .cbp_tmlabel {
        margin: 0 0 30px 0;
        padding: 1em;
        font-weight: 400;
        font-size: 95%
    }
    .cbp_tmtimeline>li .cbp_tmlabel:after {
        right: auto;
        left: 20px;
        border-right-color: transparent;
        border-bottom-color: #f5f5f6;
        top: -20px
    }
    .cbp_tmtimeline>li .cbp_tmicon {
        position: relative;
        float: right;
        left: auto;
        margin: -64px 5px 0 0px
    }
    .cbp_tmtimeline>li:nth-child(odd) .cbp_tmlabel:after {
        border-right-color: transparent;
        border-bottom-color: #f5f5f6
    }
}

.bg-green {
    background-color: #50d38a !important;
    color: #fff;
}

.bg-blush {
    background-color: #ff758e !important;
    color: #fff;
}

.bg-orange {
    background-color: #ffc323 !important;
    color: #fff;
}

.bg-info {
    background-color: #2CA8FF !important;
}
    </style>
  <div class="modal fade" id="modaldetailRiwayat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-xxl">
      <div class="modal-content modalblur">
        <div class="modal-header"style="background-color:#0c5795;  padding-bottom:3px;">
          <h5 class="modal-title text-white mb-3" id="modalInputLabeldetail">Riwayat Pengobatan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          
        </div>
        <div class="modal-body" style="box-shadow: none; background-color:#F6F8FA;">
          <div class="row">
            <div class="col-3">
              <div class="card shadow-none">
                <div class="card-header">
                  <h4>Profil</h4>
                </div>
                <div class="card-body  text-start"style="height: 500px; font-weight:bold;">
                  <img id="imgDetailPesertaContainerRiwayat" src="fotokaryawan\profile.png">
                  <div class="text-center" style="margin-top: 50px; font-weight:bold;" id="txtnamaRiwayat"></div>
                  <div class="text-center" id="txtNamaKaryawan"></div>
                  <div class="text-center" id="txtno_polisRiwayat"></div>
                  <div class="row" style="margin-top: 80px;">
                  <div class="irwancard mb-4">
                  <table>
                  <tr>
                  <b>Nama Asuransi</b><br>
                  <hr class="mt-1 mb-1 ">
                    <td>
                    <label for="html5-text-input">PT. ASURANSI JASINDO</label><br>
                    </td>
                  </tr>
                </table>
            </div>
          </div>
                  {{-- <hr> --}}
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="card m-1 shadow-none">
              <div class="card-body "style="height: 280px; ">
              <h4>Info Karyawan</h4>
                  <div class="row">
                    <label for="html5-text-input"  class="col-md-4">Nama</label>
                    {{-- <div class="col-md-4"> --}}
                    <label for="html5-text-input" id="txtnama1Riwayat" class="col-md-4">:</label>
                    {{-- </div> --}}
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">No Polis</label>
                    <div class="col-md-4">
                    <label for="html5-text-input" id="txtno_polis2Riwayat" class="col-md-8">: </label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">No. KTP</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtno_ktpRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Perusahaan</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtnama_perusahaanRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>

                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Tanggal Lahir</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txttgl_lahirRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Jenis Kelamin</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtgenderRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>
                    <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Agama</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtagamaRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>
                    <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Golongan Darah</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="txtgolongandarahRiwayat" class="col-md-8">: </label>
                    </div>
                    </div>
                    </div>
                    </div>

                <div class="card shadow-none">
                <div class="card-body "style="height: 280px; ">
                <h4>Vital Sign</h4>
                  <div class="row"> 
                    <label for="html5-text-input"  class="col-md-4">Keadaan Umum</label>
                    {{-- <div class="col-md-4"> --}}
                    <label for="html5-text-input" id="Nama_karyawan" class="col-md-4">: Baik</label>
                    {{-- </div> --}}
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Kesadaran Pasien</label>
                    <div class="col-md-4">
                    <label for="html5-text-input" id="no_polis" class="col-md-8">: Compos Menthis</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Tekanan Darah</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="no_ktp" class="col-md-8">: 135/80  mmHg</label>

                    </div>
                  </div>

                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Nadi</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="nama_perusahaan" class="col-md-8">: 80 x/menit</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Suhu</label>
                    <div class="col-md-8">
                    <label for="html5-text-input"  id="nama_jabatan" class="col-md-8">: 36 °/Celcius</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Pernafasan</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="tgl_lahir"class="col-md-8">: 60 x/menit</label>

                    </div>
                  </div>
                  <div class="mb-1 row">
                    <label for="html5-text-input" class="col-md-4">Tinggi Badan</label>
                    <div class="col-md-8">
                    <label for="html5-text-input" id="agama" class="col-md-8">: 167 cm</label>
                    </div>
                  </div>
                    <div class="mb-1 row">
                      <label for="html5-text-input" class="col-md-4">Berat Badan</label>
                      <div class="col-md-8">
                      <label for="html5-text-input" id="txtstatus" class="col-md-8">: 45 kg</label>

                      </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

    <div class="card shadow-none mt-2">
    <div class="card-body "style="height: 820px; ">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
<div class="container mt-10">
    <div class="row">
    <h4>Pengobatan</h4>
        <div class="col ">
            <ul class="cbp_tmtimeline">
                <li>
                    <!-- <time class="cbp_tmtime" datetime="2017-11-04T18:30"><span class="hidden">25/12/2017</span> <span class="large">Now</span></time> -->
                    <div class="cbp_tmicon bg-orange"><i class="zmdi zmdi-hospital"></i></div>
                    <div class="cbp_tmlabel">
                        <h2><a href="javascript:void(0);">ICD-10</a></h2>
                        <p>Chlamydia Psittaci Infections</p>                            
                    </div>
                </li>
                <li>
                    <!-- <time class="cbp_tmtime" datetime="2017-11-04T03:45"><span>03:45 AM</span> <span>Today</span></time> -->
                    <div class="cbp_tmicon bg-info"><i class="zmdi zmdi-hotel"></i></div>
                    <div class="cbp_tmlabel">
                        <h2><a href="javascript:void(0);">DIANOGSIS AKHIR</a></h2>
                        <p>Panas Dalam</p>                            
                    </div>
                </li>
                <li>
                    <!-- <time class="cbp_tmtime" datetime="2017-11-03T13:22"><span>01:22 PM</span> <span>Yesterday</span></time> -->
                    <div class="cbp_tmicon bg-green"> <i class="zmdi zmdi-hospital-alt"></i></div>
                    <div class="cbp_tmlabel">
                        <h2><a href="javascript:void(0);">OBAT</a></h2>
                        <p>acetyl sistetein asetil sistein tab</p>
                        <p>acid folic profolat</p>
                        <p>adalat oros 20 mg</p>
                        <p>alopurional 100 mg</p>                                
                    </div>
                </li>
                <li>
                    <!-- <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Two weeks ago</span></time> -->
                    <div class="cbp_tmicon bg-blush"><i class="zmdi zmdi-airline-seat-flat"></i></div>
                    <div class="cbp_tmlabel">
                        <h2><a href="javascript:void(0);">TINDAKAN</a></h2>
                        <p>Spliting per regio</p>
                        <p>a. Splingting per regio - Bahan</p>
                        <p>b. Splinting per regio - Jasa</p>
                        <p>Splinting per regio - Full denture per rahang</p>                                
                    </div>
                </li>
                <li>
                    <!-- <time class="cbp_tmtime" datetime="2017-10-22T12:13"><span>12:13 PM</span> <span>Two weeks ago</span></time> -->
                  
                </li>
            </ul>  
        </div>
    </div>
</div>

</div>   
  </div>
  </div>
  </div>
  </div>
