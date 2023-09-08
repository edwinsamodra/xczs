
<input type="hidden" id="frmDialogTambahPasien_action">
<input type="hidden" id="frmDialogTambahPasien_id">
<!--modal Input-->
<div class="modal fade" id="modalTakepicture" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"style="background-color:#0c5795;  padding-bottom:1.2em;">
        <h5 class="modal-title text-white mb-2" id="modalInputLabel">Modal Ambil Foto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalTambahPasien_content">
       
        <form method="POST" action="">
          @csrf
          <div class="row">
              <div class="col-md-6">
                  <div id="my_camera"></div>
                  <br/>
                  <input type=button value="Ambil" class="text-center" onClick="take_snapshot()">
                  <input type="hidden" name="image" class="image-tag">
              </div>
              <div class="col-md-6">
                  <div id="results">Your captured image will appear here...</div>
              </div>
          </div>
      </form>
        <!--end Detail Perusahaan -->
      </div>     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnpicture" style="background: #0c5795; border-radius:5px;">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
      <!--end content-->
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'png',
            jpeg_quality: 90
        });
        Webcam.attach( '#my_camera' );
        function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    </script>
    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script type="text/javascript">
        $('#register').on('submit', function (event) {
            event.preventDefault();
            var image = '';
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            Webcam.snap( function(data_uri) {
                image = data_uri;
            });
            
            .done(function(data) {
                if (data > 0) {
                    alert('insert data sukses');
                    $('#register')[0].reset();
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
            
        });
        
    </script>
