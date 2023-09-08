<!--modal Input-->
<div class="modal fade" id="modalDetailCabang" data-bs-backdrop="static" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header"style="background-color: #0c5795; padding-bottom:3px;">
                <h5 class="modal-title text-white mb-3" id="modalInputLabelcabang"></h5>
                <h5 id="txtKodeAsuransi" style=" color: #ffffff" class=" text-white btn btn-md">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background: #F6F8FA">
                <div class="card row" style="box-shadow: none; background-image:url(/images/gambar_peta.png);  background-size:cover;">
                    <div class="row d-flex justify-content-center">
                        <img id="modalDetailCabang_logoAsuransi" class="card-img-top" style="width: 200px;">
                    </div>
                    <div class="row mt-3 text-center">
                        <h6 id="namaasuransi" style="text-shadow: 1px 1px; color: #79767E;"></h6>
                        <p><b>Alamat: <span id="modalDetailCabang_alamat_perusahaan_induk"></span></b></p>
                    </div>
                </div>
               
                <h6 class="text-center mt-3 mb-3"></h6>
                <!-- start row 1 -->
                <div class="row">
                <div class="col " style="margin-right:20px; margin-top: 30px;">
                        <div class="row">
                            
                             <div class="row">

                                 <h6 class="text-start mt-3">Data Cabang Asuransi</h6>
                             </div>
                             <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Nama Cabang </p>
                                    <p class="col-5" id="txtNamaCabangdetail"></p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Nama Pimpinan </p>
                                    <p class="col-5" id="txtKepalaCabangdetail"></p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Alamat </p>
                                    <p class="col-5" id="txtAlamatdetail"> : </p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                  <p class="text-left col-3">Alamat Tagihan</p>
                                  <p class="col-5" id="txtAlamatTagihanDetail"> :</p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Kota</p>
                                    <p class="col-5" id="txtNamaKotadetail"> : </p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Kecamatan</p>
                                    <p class="col-5" id="txtNamaKecamatandetail"> : </p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                    <p class="text-left col-3">Kelurahan</p>
                                    <p class="col-5" id="txtNamaKelurahandetail"> : </p>
                                </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFFF; ">
                                <div class="row" style="margin-top: 15px;">
                                <p class="text-left col-3">Kode Pos</p>
                                    <p class="col-5" id="txtKodePosdetail"> : </p>
                                </div>
                                </div>
                                </div>
                            </div>

                    <div class="col" style="margin-top: 30px;">
                        <!--start card -->
                        <div class="row">
                            <h6 class="text-start mt-3 mb-3">Detail Cabang</h6>

                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row"  style="margin-top: 15px;">
                                <p class="col-3">Nomor NIB </p>
                                <p class="col-5" id="txtnomer_nibdetail"> : </p>
                            </div>
                            </div>
                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Tanggal NIB </p>
                                <p class="col-5" id="txttgl_nibdetail"> : </p>
                            </div>
                            </div>
                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Tanggal Daftar </p>
                                <p class="col-5" id="txttgl_daftardetail"> : </p>
                            </div>
                            </div>
                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Jenis Asuransi </p>
                                <p class="col-5" id="txtjenis_asuransidetail"> : </p>
                            </div>
                            </div>
                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Kode Group </p>
                                <p class="col-5" id="txtkode_groupdetail"> : </p>
                            </div>
                            </div>
                            <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#FFFF; ">
                            <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Jenis Kerjasama </p>
                                <p class="col-5" id="txtjenis_kerjasamadetail"> : </p>
                            </div>
                            </div>
                            </div>
                        <!-- end card -->
                    </div>
                    <div class="row">
                            <h6 class="text-start mt-3 mb-3">Kontak</h6>
                    </div>
    <div class="card px-5 py-3"   style="box-shadow: none; background-color:#FFFF;">
    <div class="row">
    <section class="kontak-area kontak-one">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <div class="kontak-title text-center">
            </div>
         </div>
      </div>
      <!-- row -->
      <div class="row justify-content-center">
         <div class="col-md-4 col-sm-8">
            <div class="single-kontak-items">
               <div class="items-icon">
                  <i class="lni lni-bullhorn"></i>
               </div>
               <div class="items-content">
                  <h6 class="items-title">Nomor Telepon</h6>
                  <p class="col-5" id="modalDetailCabang_nomorTelepon_1">1:</p>
                  <p class="col-5" id="modalDetailCabang_nomorTelepon_2">2:</p>
               </div>
            </div>
            <!-- single Kontak items -->
         </div>
         <div class="col-md-4 col-sm-8">
            <div class="single-Kontak-items">
               <div class="items-icon">
                  <i class="lni lni-investment"></i>
               </div>
               <div class="items-content">
                  <h6 class="items-title">Kontak Person</h6>
                  <p class="col-5" id="txtKontakPersondetail">1:</p>
                  <p class="col-5" id="txtKontakPerson2detail">2:</p>
               </div>
            </div>
            <!-- single Kontak items -->
         </div>
         <div class="col-md-4 col-sm-8">
            <div class="single-Kontak-items">
               <div class="items-icon">
                  <i class="lni lni-handshake"></i>
               </div>
               <div class="items-content">
               <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Hp </p>
                                <p class="col-5" id="txtNomorHandphone"> : </p>
                            </div>

                  <div class="row" style="margin-top: 15px;">
                                <p class="col-3">Fax </p>
                                <p class="col-5" id="txtfaxdetail"> : </p>
                            </div>
                 
               </div>
            </div>
            <!-- single Kontak items -->
         </div>
      </div>
      <!-- row -->
   </div>
   <!-- container -->
</section>
<!--====== Kontak ONE PART ENDS ======-->
                        <!-- <div class="row">
                                  <p class="text-left col-3">Nomor Telepon  </p>
                                  <p class="col-5" id="modalDetailCabang_nomorTelepon_1">1:</p>
                              </div>
  
                              <div class="row">
                                  <p class="text-left col-3"></p>
                                  <p class="col-5" id="modalDetailCabang_nomorTelepon_2">2:</p>
                              </div>
  
                              <div class="row">
                                  <p class="text-left col-3">Kontak Person</p>
                                  <p class="col-5" id="txtKontakPersondetail">1:</p>
                              </div>
  
                              <div class="row">
                                  <p class="text-left col-3"></p>
                                  <p class="col-5" id="txtKontakPerson2detail">2:</p>
                              </div>
  
                              <div class="row">
                                  <p class="text-left col-3">Nomor HP </p>
                                  <p class="col-5" id="txtNomorHandphone">:</p>
                              </div>        
                              
                              <div class="row">
                                <p class="col-3">Fax </p>
                                <p class="col-5" id="txtfaxdetail">:</p>
                            </div> -->
                        </div>
                    </div>
                    <div class="col " style="margin-right:20px;">
                   
                    </div>
                </div>




                <!-- end row 1 -->
            </div>
        </div>
    </div>
    <!--end content-->

</div>
</div>
</div>
