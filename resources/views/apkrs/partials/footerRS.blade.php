<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
      <div class="mb-2 mb-md-0">Copyright &copy; 2022 MINTEK. All rights reserved</div>      
    </div>
  </footer>
  <!-- / Footer -->



<!-- Content wrapper -->

<!-- / Layout wrapper -->


<!-- Core JS -->
<script src="/assets/js/common.functions.js"></script>
<script src="/assets/jquery/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- build:js assets/vendor/js/core.js -->
<!-- script src="../assets/vendor/libs/jquery/jquery.js"></script -->
<!-- script src="../assets/vendor/libs/popper/popper.js"></script -->
<!-- script src="../assets/vendor/js/bootstrap.js"></script -->
<!-- script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script -->

<script src="../assets/sweetalert2/js/sweetalert2.all.min.js"></script>


<!-- script src="../assets/vendor/js/menu.js"></script -->
<!-- navbar js -->
<script src="../navbar/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../navbar/js/bootstrap.min.js"></script>
<script src="/assets/chartjs/v2.9.4/Chart.js"></script>

<script src="../assets/js/main.js"></script>

<!-- script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script -->
<!-- script type="text/javascript" charset="utf8" src="/assets/datatables/js/jquery.dataTables.js"></script -->
<!-- script src="/assets/datatables/js/dataTables.bootstrap4.min.js"></script -->

<script src="../assetsRS/RumahSakit_js/Registrasi.js"></script>
<script src="../assetsRS/pengaturan/pengaturan.js"></script>
<script src="../assetsRS/profile/chart.js"></script>

@if(Route::is('profileRS'))
<script src="/assets/js/rs/modalInfoProfile.js"></script>
<script src="/assets/js/rs/modalEditProfile.js"></script>
@endif

<script src="/assets/js/moment/moment.min.js"></script>

<!-- script src="/assets/js/menu.js"></script -->

<script>
  function load_url(a, b, c) {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.post("/posisi", {b, c}, function () {
            location.href = a;
        });
    
        // Get the container element
    
        // Get all buttons with class="btn" inside the container
        var btns = document.getElementsByClassName("limainm");
    
        // Loop through the buttons and add the active class to the current/clicked button
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    }
</script>
<script>
  $(document).ready(function(){

    $('.mainm').hover(function(){
      console.log('mou.activeseover');
      $(this).trigger('click');
    });
  });
  </script>

</body>
</html>