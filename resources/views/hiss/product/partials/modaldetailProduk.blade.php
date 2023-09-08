<!--modal Input-->
{{-- <input type="hidden" id="frmDataProduk_action">
<input type="hidden" id="frmDataProduk_id"> --}}
<style>
  .sla{
    border:1px solid #ccc;
    border: 0;
    list-style:none;
    margin-top:- 9px;
    padding:0;
    text-align:center;
}
.sla li{
    display:inline;
}
.sla a{
    display:inline-block;
    padding:10px;
    color:#3A3541;
}
p{
  color: black
}
.modal-open > :not(.modal) {
    -webkit-filter: blur(3px);
    -moz-filter: blur(3px);
    -o-filter: blur(3px);
    -ms-filter: blur(3px);
    filter: blur(3px);
}
</style>
<div class="modal fade" id="modalDetailProduk" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true" style=" margin-top:12em">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background-color: #F6F8FA">
            <div class="modal-header p-4"style="background-color:#0c5795; ">
              
                <h5 class="modal-title text-white" style=" padding-left:1em;" id="namaAsuransidetail"></h5>    
         
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card p-3" style="box-shadow: none;">
              <div class="row justify-content-center" style="font-size: 16px; color: #3A3541; font-weight: 700">
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-3">
                      <p class="" style="margin-left: 0.5em" ><b>Nama Asuransi</b></p>
                    </div>
                    <div class="col-3">
                      <p><b>Nama Paket Asuransi</b></p>
                    </div>
                    <div class="col-6 sla">
                      <ul>
                        <li> 
                          KLAS
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div><hr style=" margin-top: -0.5em">
              <div class="row justify-content-center">
               <div class="col-md-12">
                <div class="row">
                  <div class="col-3">
                    <ul>

                      <li ><a style="color: #3A3541" href="#" id="namaAsuransi"></a></li>
                    </ul>
                    {{-- <img src="" id="logo" alt="" srcset=""> --}}
                  </div>
                  <div class="col-3">
                    <ul>
                      <li><a href="#" style="color: #3A3541" id="paket"></a></li>
                    </ul>
                  </div>
                  <div class="col-6"><ul id="listSLA"></ul></div>
                </div>
               </div>
              </div>
              </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
