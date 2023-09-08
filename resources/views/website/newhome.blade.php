@extends('layouts.site')

@section('content')
<div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="img/carousel-1.jpg" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-6">
                <h1 class="display-3 text-dark animated slideInDown">
                      Kendali Mutu
                    </h1>
                   
                    <p class="fs-10 text-body">
                    Membantu pihak Asuransi dan Perusahaan dalam aktivitas yang terencana dalam mencapai, mempertahankan serta meningkatkan mutu pelayanan kesehatan sehingga sesuai standar yang telah ditetapkan

                    </p>
                    <h1 class="display-3 text-dark animated slideInDown">
                      Kendali Biaya
                    </h1>
                    <p class="fs-10 text-body">
                    Mengendalikan biaya dari mulai perencanaan sampai pelaksanaan sehingga manajemen pembiayaan kesehatan dapat dikendalikan dan terukur


                    </p>
                   
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="w-100" src="img/carousel-2.jpg" alt="Image" />
          <div class="carousel-caption">
            <div class="container">
              <div class="row">
                <div class="col-12 col-lg-6">
                <h1 class="display-3 text-dark mb-4 animated slideInDown">
                      Kendalikan Asuransi Anda Bersama Kami
                    </h1>
                    <p class="fs-5 text-body mb-5">
                      Membantu Pihak Asuransi dan Perusahaan dalam Aktivitas yang terencana.
                    </p>
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#header-carousel"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#header-carousel"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <!-- Carousel End -->

  <!-- Manfaat -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <div
            class="position-relative overflow-hidden rounded ps-5 pt-5 h-100"
            style="min-height: 400px"
          >
            <img
              class="position-absolute w-100 h-100"
              src="img/Picture1.png"
              alt=""
              style="object-fit: cover"
            />
            <div
              class="position-absolute top-0 start-0 bg-white rounded pe-3 pb-3"
              style="width: 200px; height: 200px"
            >
              <div
                class="d-flex flex-column justify-content-center text-center bg-primary rounded h-100 p-3"
              >
                <h1 class="text-white mb-0">25</h1>
                <h2 class="text-white">Years</h2>
                <h5 class="text-white mb-0">Experience</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="h-100 text-center">
            <h1 class="display-6 mb-5">
              Manfaat d-MCare
            </h1>
            <p class="fs-5 text-primary mb-4">
              
            </p>
            <div class="row g-3">
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                >
                  <img
                    class="align-self-center mb-3"
                    src="img/icon/icon-01-primary.png"
                    alt=""
                  />
                  <h5 class="mb-0">Asuransi</h5>
                  <p class="fs-10">Memaksimalkan konsep kendali mutu dan kendali biaya. </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                >
                  <img
                    class="align-self-center mb-3"
                    src="img/icon/icon-03-primary.png"
                    alt=""
                  />
                  <h5 class="mb-0">Perusahaan</h5>
                  <p>Menekan biaya pengobatan karyawan dengan mendapatkan level tertinggi dalam pengobatan.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                >
                  <img
                    class="align-self-center mb-3"
                    src="img/icon/icon-04-primary.png"
                    alt=""
                  />
                  <h5 class="mb-0">Faskes</h5>
                  <p>Dapat menjalankan mandat yang maksimal dalam pelayanan kesehatan kepada peserta Asuransi dan Perusahaan dengan mudah, cepat dan akurat.</p>
                
                  
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                >
                  <img
                    class="align-self-center mb-3"
                    src="img/icon/icon-09-primary.png"
                    alt=""
                  />
                  <h5 class="mb-0">Peserta</h5>
                  <p>Mendapatkan pelayanan kesehatan yang terbaik. </p>
                  </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Manfaat -->
  
 

  

  <!-- Features Start -->
  <div class="container-xxl py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
          <h1 class="display-6 text-center mb-5">Fitur d-MCare</h1>
          <div class="row g-3 wow fadeIn" data-wow-delay="0.1s">
          
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                >
                  
                  <h5 class="mb-2">Rumah Sakit</h5>
                  <p>Disediakan fitur yang lengkap guna kenyamanan pihak rumah sakit 
                    dalam mengelola kesehatan dan keselamatan pasien Asuransi d-MCare</p>
                </div>
              </div>
       
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.2s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                >
                  <h5 class="mb-2">Asuransi</h5>
                  <p>Modul lengkap dalam sistem aplikasi berbasis digital yang mencakup seluruh kegiatan d-MCare.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.3s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded py-4 px-3"
                >
                
                  <h5 class="mb-2">FKTP</h5>
                  <p>Sebagai fasilitas kesehatan disediakan fitur untuk penanganan pasien pengobatan di tingkat pertama.  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                >
                  <h5 class="mb-2">Perusahaan</h5>
                  <p>Modul yang diperuntukkan sebagai fasilitator antara perusahaan dan asuransi dari mulai data karyawan sampai SLA.  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 wow fadeIn" data-wow-delay="0.1s">
              <div class="bg-light rounded h-100 p-3">
                <div
                  class="bg-white d-flex flex-column justify-content-center text-center rounded h-100 py-4 px-3"
                >
                  
                  <h5 class="mb-2">Peserta</h5>
                  <p>d-MCare memanjakan peserta Asuransi  baik karyawan Perusahaan maupun umum dengan fasilitas aplikasi yang dapat memonitor seluruh aktivitas Asuransinya dan fasilitas pengobatan.</p>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
          <div
            class="position-relative rounded overflow-hidden h-100"
            style="min-height: 400px"
          >
            <img
              class="img-fluid position-absolute w-100 h-100"
              src="img/mesin.png"
              alt=""
              style="object-fit: contain;"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Features End--> 

  <!--Service Start 
  <div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">
          Benefit d-MCare
        </h1>
      </div>
      <div class="row g-4 justify-content-center">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img
                  class="img-fluid"
                  src="img/benefit1.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Full Digital</h4>
            </div>
            <p class="mb-4">
              D-Mcare Menggunakan konsep digital secara menyeluruh, kecuali Dokumen Legalitas yang membuthkan Hard Copy.
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img
                  class="img-fluid"
                  src="img/benefit2.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">API Management</h4>
            </div>
            <p class="mb-4">
            Menyediakan bridging sebagai gateway dengan existing aplikasi seperti BPJS, SIM Asuransi, SIM Perusahaan dan  SIM RS.
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div
                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
              >
                <img
                  class="img-fluid"
                  src="img/benefit3.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Simple & Praktis</h4>
            </div>
            <p class="mb-4">
              Dibangun dengan konsep yang simple dapat dioperasikan menggunakan Web based dan Mobile-Apps.

            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div
                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
              >
                <img
                  class="img-fluid"
                  src="img/benefit4.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Tanpa Birokrasi</h4>
            </div>
            <p class="mb-4">
              Proses dilakukan secara online sehingga mengurangi birokrasi yang terjadi
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div
                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
              >
                <img
                  class="img-fluid"
                  src="img/benefit5.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Murah</h4>
            </div>
            <p class="mb-4">
              Mendapatkan hasil yang sangat besar dengan biaya akses yang sangat murah
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div
                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
              >
                <img
                  class="img-fluid"
                  src="img/benefit6.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Andal</h4>
            </div>
            <p class="mb-4">
              Menggunakan Teknologi terbaru, didukung oleh para pakar dibidang Asuransi dan Manajemen Kesehatan
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img
                  class="img-fluid"
                  src="img/benefit7.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Tepat Sasaran</h4>
            </div>
            <p class="mb-4">
            Diperuntukkan sesuai dengan bisnis  masing-masing instansi penggunanya. 
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div
                class="service-icon flex-shrink-0 bg-primary rounded-end me-4"
              >
                <img
                  class="img-fluid"
                  src="img/benefit8.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Dictionary HISS</h4>
            </div>
            <p class="mb-4">
              Dilengkapi dengan Health Insurance Support System, yang akan memudahkan dan ketepatan Diagnosa serta Pengobatan.
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="service-item rounded h-100 p-5">
            <div class="d-flex align-items-center ms-n5 mb-4">
              <div class="service-icon flex-shrink-0 bg-primary rounded-end me-4">
                <img
                  class="img-fluid"
                  src="img/benefit9.png"
                  alt=""
                />
              </div>
              <h4 class="mb-0">Sesuai Long Term Bisnis</h4>
            </div>
            <p class="mb-4"
            >Dikembangkan untuk model bisnis yang bersifat jangka panjang. 
            </p>
            <a class="btn btn-light px-3" href="">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <Service End -->
  <!--flow star-->
  <!--div
    class="container-fluid appointment my-5 py-5 wow fadeIn"
    data-wow-delay="0.1s"
  >
    <div class="container py-2">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded m-2 p-2">
            <div class="carousel-item active">
                <div class="bg-white rounded mb-3 p-2">
                <h3 class="display-6 text-info text-center mb-1">
                    Konsep d-MCare
                  </h3>
                <img
                    class="img-fluid w-100 h-100 mb-4"
                    src="img/konsep.png"
                    alt=""
                    style="object-fit: contain;"
                  />
                </div>
              </div>
              <div class="carousel-item">
              <div class="bg-white rounded mb-3 p-2">
                <h3 class="display-6 text-info text-center mb-1">
                      Fasilitas bridging
                    </h3>
                <img
                      class="img-fluid w-100 h-100"
                      src="img/fasilitas.png"
                      alt=""
                      style="object-fit: contain;"
                    />
              </div>
              </div>
              <div class="carousel-item">
                <div class="bg-white rounded mb-3 p-2">
                  <h1 class="display-6 text-info text-center mb-2">
                      Proses d-MCare
                    </h1>
                  
                  <img
                      class="img-fluid w-100 h-100"
                      src="img/proses1.png"
                      alt=""
                      style="object-fit: contain;"
                    />
                </div> 
              </div>
              <div class="carousel-item">
                <div class="bg-white rounded p-2">
                <h1 class="display-6 text-info text-center mb-2">
                    Output d-MCare
                  </h1>
                
                <img
                    class="img-fluid w-100 h-100"
                    src="img/output.png"
                    alt=""
                    style="object-fit: contain;"
                  />
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </div>
  </div>
  <flow end-->
  <!-- Team Start -->
  

  <!--div class="container-xxl py-5">
    <div class="container">
      <div class="text-center mx-auto" style="max-width: 500px">
        <h1 class="display-6 mb-5">Meet Our Professional Team Members</h1>
      </div>
      <div class="row g-4  d-flex justify-content-center">
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="team-item rounded">
            <img class="img-fluid" src="img/profile.png" alt="" />
            <div class="text-center p-4">
              <h5>Muawan Asyir</h5>
              <span>Owner & CEO Averin SIRs</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Muawan Asyir</h5>
              <p>Owner & CEO Averin SIRs</p>
              <div class="d-flex justify-content-center">
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-youtube"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
          <div class="team-item rounded">
            <img class="img-fluid" src="img/moeryono1.png" alt="" />
            <div class="text-center p-4">
              <h5>Drg. Moeryono Aladin, SIP, SH, MM</h5>
              <span>Perancang dan Pencetus BPJS</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>Drg. Moeryono Aladin, SIP, SH, MM</h5>
              <p>Perancang dan Pencetus BPJS</p>
              <div class="d-flex justify-content-center">
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-youtube"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
          <div class="team-item rounded">
            <img class="img-fluid" src="img/nurhainda1.png" alt=""/>
            <div class="text-center p-4">
              <h5>DR.dr. Nurhaidah, MARS, MHKes, AA, CFP, QWP</h5>
              <span>Ketua Umum Lembaga Anti Fraud Asuransi</span>
            </div>
            <div class="team-text text-center bg-white p-4">
              <h5>DR.dr. Nurhaidah, MARS, MHKes, AAK, CFP, QWP</h5>
              <p>Ketua Umum Lembaga Anti Fraud Asuransi</p>
              <div class="d-flex justify-content-center">
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-twitter"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-facebook-f"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-youtube"></i
                ></a>
                <a class="btn btn-square btn-light m-1" href=""
                  ><i class="fab fa-linkedin-in"></i
                ></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  < Team End -->
  <!-- Slidefitur-->
  <!--div
    class="container-fluid appointment my-5 py-5 wow fadeIn"
    data-wow-delay="0.1s"
  >
    <div class="container py-2">
      <div class="row g-5">
        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.3s">
          <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner rounded bg-white m-2 p-2">
              <div class="carousel-item active">
                <img src="img/charttanpa.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/chartbpjs.png" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="img/bigvision.png" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div> 
      </div>
    </div>
  </div>
  < Slidefitur-->
  
@endsection