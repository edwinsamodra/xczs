
@extends('layouts.sneat')
@section('content')
<style>



  .card-modal{
    margin-top: 3px;
    transition: all 0.2s ease;
    cursor: pointer;
    border-radius: 2em;
    padding-bottom: 3px;
    background-color:  #0c5795;

  }
  .satu{
    background-color:  #0c5795;
    border-radius: 2em;
    font-family: 'Bariol Bold';
    font-style: normal;
    color: #e7fcfc;
    src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
  }
  .satu h5{
    color: #e7fcfc;
  }
  .third{
    background-color:  #0c5795;
    border-radius: 2em;
    font-family: 'Bariol Bold';

    
    src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
  }
  .third h5{
    color: #ffffff;
  }
 
  .dua{
    background-color:  #0c5795;
    border-radius: 2em;
     font-family: 'Bariol Bold';
    font-style: normal;
    color: #e7fcfc;
    src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
  }
  .dua h5{
    color: #e7fcfc;
  }

  .zero{
    background-color:  #0c5795;
    border-radius: 2em;
    font-family: 'Bariol Bold';
    font-style: normal;
    color: #e7fcfc;
    src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
  }
  .zero h5{
    color: #e7fcfc;
  }
  .one{
    background-color:  #0c5795;
    border-radius: 2em;
    color: #e7fcfc;
    font-family: 'Bariol Bold';
    font-style: normal;
    src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
    
  }
  .one h5{
    color: #e7fcfc;
  }
    


.card-modal:hover{

    box-shadow: 3px 5px 5px 1px #678eb4;
    transform: scale(1.1);
}
</style>
<div class="container">
   <div class="row g-0">
              <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
              <div class="card-modal" id="peserta_JKP">
              <div class="satu pt-3 text-center">
                  <h5>1.645.000</h5>
              <p class="line1">Peserta JKP</p>
              </div>
                </div>
           </div>
        <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
            <div class="card-modal" id="jumlah_KK">
           <div class="dua  pt-3 text-center">
                    <h5>600.000</h5>
                    <p class="line1">Jumlah KK</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
            <div class="card-modal" id="istri_Peserta">
            <div class=" zero pt-3 text-center">
                <h5>430.000</h5>
                <p class="line1">Jumlah Istri Peserta</p>
            </div>
           </div>
        </div>
              <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
              <div class="card-modal" id="anak_Peserta">
              <div class="one pt-3 text-center">
                  <h5>515.000</h5>
              <p class="line1">Jumlah Anak Peserta</p>
              </div>
                </div>
           </div>
        <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
            <div class="card-modal">
           <div class=" dua pt-3 text-center" id="jumlah_Lajang">
                    <h5>745.000</h5>
                    <p class="line1">Jumlah Lajang</p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 p-2 mt-3">
            <div class="card-modal">
            <div class=" satu pt-3 text-center" id="jumlah_Mitra">
                <h5>103</h5>
                <p class="line1">Jumlah Mitra</p>
            </div>
           </div>
        </div>
     </div>
     <div class="row" style="margin-bottom:8rem;">
      <div class="col-lg-6 col-sm-12 p-5 mt-3 text-center">
        <h6>KEPESERTAAN</h6>
      <div id="chart-container">
                <canvas class="p-4 w-100 h-90" id="doughnutChart"></canvas>
              </div>
      </div>
      <div class="col-lg-6 col-sm-12 pt-4 mt-3 w-65">
        <div class="card-modal mb-3 bg-white">
           <div class="d-flex justify-content-between third bg-white p-2">
               <div class="d-flex justify-content-start pt-3">
                  <h6 class="p-1">157</h6>
                    <p class="line3">Peserta Baru</p>  
              </div> 
              <div class="d-flex justify-content-end pt-3">
                  <i class='bx bxs-chevron-right'></i>
              </div> 
                
            </div>
        </div>
        <div class="card-modal mb-3 bg-white">
           <div class="d-flex justify-content-between third bg-white p-2">
            <div class="d-flex justify-content-start pt-3">
                  <h6 class="p-1">430</h6>
                <p class="line3">Peserta Keluar</p>
              </div> 
              <div class="d-flex justify-content-end pt-3">
                  <i class='bx bxs-chevron-right'></i>
              </div> 
                
            </div>
        </div>
        <div class="card-modal mb-3 bg-white">
           <div class="d-flex justify-content-between third bg-white p-2">
            <div class="d-flex justify-content-start pt-3">
                  <h6 class="p-1">24</h6>
                <p class="line3">Peserta Meninggal</p>
              </div> 
              <div class="d-flex justify-content-end pt-3">
                  <i class='bx bxs-chevron-right'></i>
              </div> 
               
            </div>
        </div>
        <div class="card-modal mb-3 bg-white">
           <div class="d-flex justify-content-between third bg-white p-2">
            <div class="d-flex justify-content-start pt-3">
                <h6 class="p-1">250</h6>
                <p class="line3">Dalam Perawatan</p>
              </div> 
              <div class="d-flex justify-content-end pt-3">
                  <i class='bx bxs-chevron-right'></i>
              </div> 
               
            </div>
        </div>
      </div>
     </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
  var doughnutChart = document.getElementById('doughnutChart').getContext('2d');

var myDoughnutChart = new Chart(doughnutChart, {
	type: 'doughnut',
	data: {
		datasets: [{
			data: [30, 60,100,80],
			backgroundColor: ['#ff9113', '#15a2fc', '#00FFFF','#FF0000']
		}],

		labels: [
      'KK',
      'Istri',
      'Anak',
      'Lajang',
		]
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend : {
			position: 'bottom'
		},
		layout: {
			padding: {
				left: 20,
				right: 20,
				top: 20,
				bottom: 20
			}
		}
	}
});
</script>
@include('partials.modalInput')
@include('partials.modalDetailKepesertaanJKP')
{{-- @include('partials.modalDetailKepesertaanKK') --}}
@include('partials.modalDetailKepesertaanIstri')
@include('partials.modalDetailKepesertaanAnak')
@include('partials.modalDetailKepesertaanLajang')
@include('partials.modalDetailKepesertaanMitra')

@endsection