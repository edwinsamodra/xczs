{{-- <style>
    .modal-xl{
      width: 2000px !important;
  
    }
    .modal>div.bg,
  .modal-backdrop.fade.show {
      z-index: 1;
      -webkit-filter: blur(5px);
      filter: blur(5px);
        background-color: red;
  }
  .modal-content {
      margin: 20px;
      border-radius: 4px;
      background-color: rgba(255, 255, 255, 0.5);
      border: 1px solid rgba(255, 255, 255, 0.5);
      box-shadow: 2px 2px 0px 2px rgba(255, 255, 255, 0.6);
  }
  </style> --}}
  
  <!--modal Input-->
 
  <div class="modal fade" id="modalkeluargaPeserta" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header"style="background-color:#0c5795;">
                <h5 class="modal-title text-white" id="modalInputLabel"><span id="namaMember_dlg"></span><br>Nomor Polis : <span id="nomorPolis_dlg"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-4">
                <div class="col-sm d-flex justify-content-end">
                    {{-- <button id="tambahdatakeluarga" 
                        type="button" 
                        class="col-3 btn btn-sm text-white" 
                        style=" margin-top: 20px; background-color:#0c5795;">Tambah Keluarga 1</button> --}}
                    </div>
                    <div class="card-body">
                        <table id="tblMemberRelatives" class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <td style="color: #697a8d;font-weight: bold;">Nama</td>
                                    <td style="color: #697a8d;font-weight: bold;">Status</td>
                                    <td style="color: #697a8d;font-weight: bold;">Usia</td>
                                    <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end content-->
            </div>
        </div>
    </div>
</div>

  