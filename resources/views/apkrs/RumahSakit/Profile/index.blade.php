@extends('apkrs.layoutRS.layoutRS')
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
        <div class="card row mt-2" id="modalprofile"
            style="background-image:url(/images/gambar_peta.png); background-size:cover;">
            <div class="row">
                <div class="col-1" style="position: absolute; right: 0; top:5px;">
                    <a data-kode-klinik="{{ $profileRS->kode_klinik }}" role="button" class="btn btn-sm text-white" id="modalEditProfileLoader"
                        style="background-color: #0c5795;"><i class="fa-solid fa-pen-to-square"></i> &nbsp Edit</a>
                </div>
                <img id="profileLogo" data-kode-klinik="{{ $profileRS->kode_klinik }}" src="{{ $profileRS->logo }}"
                    class="mx-auto d-block" alt="" style="width: 200px; ">
            </div>
            <div class="row mt-3 text-center">
                <h1 style="text-shadow: 1px 1px; color: red;">{{ $profileRS->nama_perusahaan }}</h1>
                <p><b>{{ $profileRS->alamat }}</b></p>
                <p>{{ $profileRS->telpon }}</p>
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

        <div class="card" style="margin-top: 20px">
            <div class="row justify-content-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-3 fw-bold" style="margin-top: 5px; margin-bottom: 5px;">
                        <div class="text-center">Statistik berdasarkan tahun:</div>
                        <select id="profileRS-tahun" class="form-control"
                            style=" margin-top: 5px; margin-bottom: 5px; border: 0;  background-color: #F5F5F5; border-radius: 6px;"
                            name="tahun">
                            <option value="0">-- Pilih Tahun --</option> <?php for ($i = date('Y'); $i >= date('Y') - 32; $i -= 1) {
                                echo "<option value='$i'> $i </option>";
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
                    <a id="branchBox">
                        <div class="card hober">
                            <div class="satu pt-3 text-center">
                                <h5 id="numBranches">32</h5>
                                <p class="line1 fw-bold">Asuransi</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
                    <a id="companyBox">
                        <div class="card hober">
                            <div class="dua  pt-3 text-center">
                                <h5 id="numCompanies">103</h5>
                                <p class="line1 fw-bold">Perusahaan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 p-2 mt-3 border-right">
                    <a id="corporateMemberBox">
                        <div class="card hober">
                            <div class=" zero pt-3 text-center">
                                <h5 id="numCorporateMembers">103</h5>
                                <p class="line1 fw-bold">Kunjungan Pasien Asuransi</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
                    <a id="personalMemberBox">
                        <div class="card hober">
                            <div class="one pt-3 text-center">
                                <h5 id="numPersonalMembers">103</h5>
                                <p class="line1 fw-bold">Kunjungan Pasien BPJS</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 border-right p-2 mt-3">
                    <a id="produkritelBox">
                        <div class="card hober">
                            <div class=" dua pt-3 text-center">
                                <h5 id="numProductsRetail">100</h5>
                                <p class="line1 fw-bold">Kunjungan Pasien Perusahaan</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-2 col-md-4 p-2 mt-3">
                    <a id="produkkorporasiBox">
                        <div class="card hober">
                            <div class=" satu pt-3 text-center">
                                <h5 id="numProductsCorporate">140</h5>
                                <p class="line1 fw-bold">Total Kunjungan Pasien</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-6 p-5  text-center">
                <div class="card p-3">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
            </div>
            <div class="col-md-6 pt-4 mt-3 w-65">
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white"
                                id="numClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Asuransi</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white"
                                id="numVerifyingClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim BPJS</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white"
                                id="numVerifiedClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Perusahaan</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
                <div class="card hober mb-3">
                    <div class="d-flex justify-content-between third bg-white p-2">
                        <div class="d-flex justify-content-start pt-3">
                            <h6 style="background-color:#0C5795;" class="p-2 rounded fw-bold mx-2 bg-gradient text-white"
                                id="numPaidClaims"></h6>
                            <p class="line3 my-1">Jumlah Klaim Dalam Proses Verifiksi</p>
                        </div>
                        <div class="d-flex justify-content-end pt-3">
                            <i class='bx bxs-chevron-right'></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @include('apkrs.partials.modalProfileInfo')
        @include('apkrs.partials.modalProfileEdit')
        
    </div>
@endsection
