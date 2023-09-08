<!--modal Input-->
<div class="modal fade" id="modalDetailProfileProdukRetail" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header"style="background-color:#0c5795; padding-bottom:1.2em;">
          <h5 class="modal-title text-white" id="modalInputLabel">Produk Retail</h5>
          <button type="button" class="btn btn-sm" data-bs-dismiss="modal" aria-label="Close" style="background-color: white">Back</button>

        </div>
        
        <div class="modal-body" style="background: #F6F8FA">
            <div class="row">
                <div class="col-5">
                    <div class="card h-100" style="margin-right:2rem;">
                        <div class="container">
                            <div class="row mb-5 d-flex justify-content-center">
                                <img class="" style="width:15em; height:8em;" src="/{{ $profile->logo_asuransi }}">
                            </div>
                            <div class="row text-center">
                                <p style="font-weight: bold; font-size:11px"> {{ $profile->alamat }}</p>
                            </div>
                            <div class="row text-center">
                                <div style="font-weight: bold; font-size:10px"> {{ $profile->kontakperson }} : {{ $profile->telpon1 }}</div>
                                <div style="font-weight: bold; font-size:10px"> {{ $profile->kontakperson2 }}: {{ $profile->telpon2 }}</div>
                            </div>
                            <hr>
                            <div class="row mt-1" style="padding-left: 5px; font-size:13px; font-weight:bold;">
                                <h5 class="d-flex justify-content-center">{{ $profile->nama_asuransi }}</h5>
                            </div>
                            <div class="row mt-2" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">No Surat Kontrak </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->no_surat_kontrak }}</div>
                            </div>    
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Tanggal Kontrak </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->tgl_kontrak_full }}</div>
                            </div>
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Tanggal Expired </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->tgl_expired_full }}</div>
                            </div>
                            
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Tanggal NIB </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->tgl_NIB_full }}</div>
                            </div>
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Tanggal Daftar </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->tgl_daftar_full }}</div>
                            </div>
                            
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Jenis Kerjasama </div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->jenis_kerjasama }}</div>
                            </div>
                            
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Kota</div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->nama_kota }}</div>
                            </div>
                            <div class="row" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Kelurahan</div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->nama_kelurahan }}</div>
                            </div>
                            <div class="row mb-3" style="font-size:12px; font-weight:bold;">
                                <div class="col-4">Kode Pos</div>
                                <div class="col-5" style="padding-left:3px"> : &nbsp {{ $profile->kodepos }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card h-100">
                        <div class="container">
                            <div class="row mb-3">                                        
                                <h5 class="text-center mt-5 mb-5">Data Produk Ritel</h5>
                                <div class="col-6">
                                    <div class="input-group">
                                        <span style="width:4em; padding-top:5px;">
                                            <label>Page</label>
                                        </span>
                                        <span style="width:4em;">
                                            <input class="form-control border-end-0 border" type="text" placeholder="" id="modalDetailProfileProdukRitel_txtPage">
                                        </span>
                                        <button type="button" id="modalDetailProfileProdukRitel_btnPage" style="margin-left:-1em;background-color:#0c5795;z-index:998; color:white;" class="btn">Go</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group  justify-content-end">
                                        <input class="form-control border-end-0 border" type="text" placeholder="" id="modalDetailProfileProdukRitel_keyword">
                                        <button type="button" id="modalDetailProfileProdukRitel_btnSearch" style="margin-left:-1em;background-color:#0c5795;z-index:998; color:white;" class="btn"><i class="fa fa-search"></i></button>
                                    </div> 
                                </div> 
                            </div>  
                            <div class="row">
                                <div id="modalProfileProdukRitel_tableContainer" class="table-responsive text-nowrap mt-3">
                                </div>
                                <div class="mt-3" id="modalProfileProdukRitel_paginationContainer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!--end content-->
        
      </div>
    </div>
  </div>