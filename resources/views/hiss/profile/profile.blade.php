@extends('layouts.sneat')
@section('content')
    <style>
        .card {
            margin-top: 3px;
            transition: all 0.2s ease;
            /* cursor: pointer; */
            border-radius: 2em;

        }

        .satu {
            background-color: #0c5795;
            border-radius: 2em;
            font-style: normal;
            color: #e7fcfc;
        }

        .satu h5 {
            color: #e7fcfc;
        }

        .third {
            background-color: #0c5795;
            border-radius: 2em;


        }

        .third h5 {
            color: #ffffff;
        }

        .dua {
            background-color: #0c5795;
            border-radius: 2em;
            font-style: normal;
            color: #e7fcfc;
            src: local('Bariol Bold'), url('https://fonts.cdnfonts.com/s/14037/Bariol_Bold.woff') format('woff');
        }

        .dua h5 {
            color: #e7fcfc;
        }

        .zero {
            background-color: #0c5795;
            border-radius: 2em;
            font-style: normal;
            color: #e7fcfc;
        }

        .zero h5 {
            color: #e7fcfc;
        }

        .one {
            background-color: #0c5795;
            border-radius: 2em;
            color: #e7fcfc;
            font-style: normal;

        }

        .one h5 {
            color: #e7fcfc;
        }



        .hober:hover {

            box-shadow: 3px 5px 5px 1px #678eb4;
            transform: scale(1.1);
        }
    </style>
    <div class="container">
        <div class="card row mt-2" id="modalprofile" style="background-image:url(/images/gambar_peta.png); background-size:cover;">
            <div class="row">
                <div class="col-1" style="position: absolute; right: 0; top:5px;">
                   <a role="button" class="btn btn-sm text-white" id="modalEditProfileLoader" style="background-color: #0c5795;"><i class="fa-solid fa-pen-to-square"></i> &nbsp Edit</a>
                </div>
              <img id="logoAsuransi" src="{{ $profile->logo_asuransi }}" class="mx-auto d-block" alt="{{ $profile->nama_asuransi }}" style="width: 200px; ">
            </div>
            <div class="row mt-3 text-center">
              <h6 style="text-shadow: 1px 1px; color: #79767E;">{{ $profile->nama_asuransi }}</h6>
              <p><strong>{{ $profile->no_surat_kontrak }}</strong></p>
                <p><b>Alamat:</b> {!! $profile->alamat !!}
                </p>
            </div>
        </div>
        {{-- <div class="row d-flex justify-content-left">
            <div class="col-lg-4 col-md-sm-12 mt-4">
                <img src="" class="card-img-top" alt="{{ $profile->nama_asuransi }}" style="width: 45%;">
            </div>
            <div class="col-lg-6 col-md-sm-12 mt-3">
                <h4 style="text-shadow: 1px 1px; color: #79767E;">{{ $profile->nama_asuransi }}</h4>
                <p><b>Alamat:</b> {!! $profile->alamat !!}
                </p>
            </div>
            <div class="col-lg-2">
                {{-- <div id="editProfileButtonContainer" style="margin-top:20px;">
                    <a id="modalEditProfileLoader" style="text-shadow:none;font-size:0.8rem;padding:3px;font-weight:bold;" href="#"><i class="fa-solid fa-pen-to-square"></i> <span style="color:#62B3FF;">Edit</span></a>                    
                </div> 
            </div>
                </a>
        </div> --}}
        <div class="row g-0">
            <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
                <a id="branchBox">
                    <div class="card hober">
                        <div class="satu pt-3 text-center">
                            <h5 id="numBranches"></h5>
                            <p class="line1 fw-bold">Cabang</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
                <a id="companyBox">
                    <div class="card hober">
                        <div class="dua  pt-3 text-center">
                            <h5 id="numCompanies"></h5>
                            <p class="line1 fw-bold">Mitra Perusahaan</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
              <a id="corporateMemberBox">
                <div class="card hober">
                    <div class=" zero pt-3 text-center">
                        <h5 id="numCorporateMembers"></h5>
                        <p class="line1 fw-bold">Peserta Perusahaan</p>
                    </div>
                </div>
              </a>
            </div>
            <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
                <a id="personalMemberBox">
                    <div class="card hober">
                        <div class="one pt-3 text-center">
                            <h5 id="numPersonalMembers"></h5>
                            <p class="line1 fw-bold">Peserta Umum</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
                <a id="produkritelBox">
                    <div class="card hober">
                        <div class=" dua pt-3 text-center">
                            <h5 id="numProductsRetail"></h5>
                            <p class="line1 fw-bold">Produk Ritel</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-4 p-2 mt-3">
                <a id="produkkorporasiBox">
                    <div class="card hober">
                        <div class=" satu pt-3 text-center">
                            <h5 id="numProductsCorporate"></h5>
                            <p class="line1 fw-bold">Produk Korporasi</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 p-5 mt-3 text-center">
                <h6>KONDISI KEUANGAN BULAN INI</h6>
                <P>Data Untuk Bulan {{ $now }}</P>
                <div id="chart-container">
                    <canvas class="p-1 w-90" id="doughnutChart"></canvas>
                </div>
            </div>
            <div class="col-md-6 pt-4 mt-3 w-65">
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white" id="numClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Masuk</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white" id="numVerifyingClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Proses Verifikasi</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white" id="numVerifiedClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Selesai Verifikasi</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white" id="numPaidClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Telah Dibayar</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modalDetailProfileCabang')
    @include('partials.modalDetailProfileMitra')
    @include('partials.modalDetailProfilePesertaPerusahaan')
    @include('partials.modalDetailProfilePesertaUmum')
    @include('partials.modalDetailProfileProdukRetail')
    @include('partials.modalDetailProfileProdukKorporasi')

    @include('partials.modalEditProfile')
    @include('partials.modalDisplayProfile')
@endsection
