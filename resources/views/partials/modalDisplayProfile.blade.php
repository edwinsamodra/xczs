<style>
    /* ===== Buttons Css ===== */
    .profile .profile-content .profile-card .profile-card-wrapper .primary-btn {
        background: var(--primary);
        color: var(--white);
        box-shadow: var(--shadow-2);
    }

    .profile .profile-content .profile-card .profile-card-wrapper .active.primary-btn,
    .profile .profile-content .profile-card .profile-card-wrapper .primary-btn:hover,
    .profile .profile-content .profile-card .profile-card-wrapper .primary-btn:focus {
        background: var(--primary-dark);
        color: var(--white);
        box-shadow: var(--shadow-4);
    }

    .profile .profile-content .profile-card .profile-card-wrapper .deactive.primary-btn {
        background: var(--gray-4);
        color: var(--dark-3);
        pointer-events: none;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a {
        border-color: var(--primary);
        color: var(--primary);
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.active,
    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a:hover,
    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a:focus {
        background: var(--primary-dark);
        color: var(--white);
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.deactive {
        color: var(--dark-3);
        border-color: var(--gray-4);
        pointer-events: none;
    }

    /*===== ERROR FOUE Style =====*/
    .profile {
        text-align: center;
        background-color: #fff;
        position: relative;
        overflow: hidden;
        background-color: var(--white);
        z-index: 2;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: auto;
    }

    .profile::before {
        position: absolute;
        content: "";
        left: 0;
        top: 0;
        background-color: var(--primary);
        height: 100%;
        width: 100%;
        opacity: 0.8;
        z-index: -1;
    }

    .profile .profile-content {
        background-color: var(--white);
        display: inline-block;
        box-shadow: var(--shadow-5);
        border-radius: 10px;
        overflow: hidden;
    }

    .profile .profile-content .profile-card {
        max-width: 560px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .profile .profile-content .profile-card {
            max-width: 540px;
        }
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card {
            max-width: 100%;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card {
            max-width: 420px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper {
        background-color: var(--white);
        z-index: 999;
        border-radius: 5px;
        overflow: hidden;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-header {
        height: 170px;
        width: 100%;
    }

    @media only screen and (min-width: 1200px) and (max-width: 1399px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-header {
            height: 200px;
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-header {
            height: 170px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-header {
            height: 160px;
        }
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-header {
            height: 90px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-header {
            height: 140px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-profile {
        max-width: 150px;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 9;
    }

    @media only screen and (min-width: 1400px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-profile {
            max-width: 170px;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-profile {
            max-width: 150px;
        }
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-profile {
            max-width: 100px;
            margin-top: -50px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-profile {
            max-width: 140px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-profile img {
        border-radius: 50%;
        width: 100%;
        background-color: var(--white);
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-content {
        padding: 25px;
    }

    @media only screen and (min-width: 1400px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content {
            padding: 30px;
        }
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content {
            padding: 10px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content {
            padding: 20px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-content .card-title {
        font-size: 13px;
        color: var(--black);
        margin-bottom: 20px;
        margin-top: 20px;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content .card-title {
            font-size: 44px;
        }
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content .card-title {
            font-size: 26px;
            margin-bottom: 10px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content .card-title {
            font-size: 36px;
            margin-bottom: 10px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-content .text {
        color: var(--dark-3);
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content .text {
            font-size: 14px;
            line-height: 24px;
        }
    }

    @media only screen and (min-width: 576px) and (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-content .text {
            font-size: 15px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social {
        padding-bottom: 30px;
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-social {
            padding-top: 5px;
            padding-bottom: 10px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li {
        display: inline-block;
        margin: 0px 9px;
    }

    @media (max-width: 767px) {
        .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li {
            margin: 0 5px;
        }
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.facebook {
        color: #3b5998;
        border-color: #3b5998;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.facebook:hover {
        color: var(--white);
        background-color: #3b5998;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.twitter {
        color: #00acee;
        border-color: #00acee;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.twitter:hover {
        color: var(--white);
        background-color: #00acee;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.instagram {
        color: #e1306c;
        border-color: #e1306c;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.instagram:hover {
        color: var(--white);
        background-color: #e1306c;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.linkedin {
        color: #0077b5;
        border-color: #0077b5;
    }

    .profile .profile-content .profile-card .profile-card-wrapper .card-social ul li a.linkedin:hover {
        color: var(--white);
        background-color: #0077b5;
    }

    .d-table {
        width: 100%;
        height: 100%;
    }

    .d-table {
        display: table !important;
    }

    .d-table-cell {
        vertical-align: middle;
    }

    .d-table-cell {
        display: table-cell !important;
    }
</style>

<div class="modal fade" id="modalDisplayProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content h-79  ">
            <div class="modal-header" style="background-color:#0c5795;  padding-bottom:3px;">
                <h1 class="modal-title fs-5 text-white pb-3" id="staticBackdropLabel">Detail Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-image:url(/images/katakanpeta.png);">
                <div class="row">
                    <div class="col-xxl">
                        <div class="card shadow-none " style="background-image:url(/images/katakanpeta.png);">
                            <!--====== Start Profile One ======-->
                            <div class="profile">
                                <div class="">
                                    <div class="">
                                        <div class="container" style="margin-right: 10px">
                                            <div class="profile-content">
                                                <div class="profile-card">
                                                    <div class="profile-card-wrapper" style="margin-right: 10px">
                                                        <div class="card-header bg_cover">
                                                            <img src="{{ asset('images/logo_profil.png') }}"
                                                                alt="Profile" />
                                                        </div>


                                                        <!-- card-header -->


                                                        <!-- card-profile -->
                                                        <div class=" text-center rounded-buttons"
                                                            style="margin-top: 40px; margin-bottom: 40px;">
                                                            <h3 class="card-title" id="displayProfile_namaAsuransi">
                                                            </h3>
                                                        </div>
                                                        <div class=" text-start rounded-buttons">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between">
                                                                <small class="text-muted float-end"></small>
                                                            </div>
                                                            <div class="irwancard-body">
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Nama Pemimpin </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5"
                                                                            id="displayProfile_namaPimpinan"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Alamat </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5" id="displayProfile_alamat">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Kelurahan </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5" id="displayProfile_kelurahan">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Kecamatan </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5" id="displayProfile_kecamatan">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Kota </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5" id="displayProfile_kota"></p>
                                                                    </div>
                                                                </div>
                                                                <div class="card px-3 m-t-1"
                                                                    style="box-shadow: none; background-color:#F6F8FA; ">
                                                                    <div class="row" style="margin-top: 15px;">
                                                                        <p class="text-left col-5">Kode POS </p>
                                                                        <p class="col-1">:</p>
                                                                        <p class="col-5" id="displayProfile_kodepos">
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="row row-cols-2  mb-3">
                                                                    <div class="col">
                                                                        <div class="m-1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="m-1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="m-1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col">
                                                                        <div class="m-1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- profile-card -->
                                            </div>
                                            <!-- profile-card -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End Profile One ======-->


                        <!-- start Kontak -->
                        <div class="col-xxl">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"></h5>
                                <small class="text-muted float-end"></small>
                            </div>
                            <div class="irwancard-body shadow-none">
                                <div class="row row-cols-2  mb-3">
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end Kontak -->
                    <!-- start Detail Perusahaan -->
                    <div class="col-xxl">
                        <div class="irwancard mb-4 shadow-none">
                            <div class="d-flex align-items-center justify-content-between"
                                style="margin-top: 30px; margin-left: 4px; margin-bottom: 20px;">
                                <h5 class="mb-0">Detail Perusahaan</h5>
                                <small class="text-muted float-end"></small>
                            </div>
                            <div class="irwancard-body shadow-none">
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Nomor Surat Kontrak </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5"id="displayProfile_noSuratKontrak"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Tanggal Kontrak </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5" id="displayProfile_tglKontrak"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Tanggal Expired </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5"id="displayProfile_tglExpired"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Tanggal NIB </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5"id="displayProfile_tglNIB"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Tanggal Daftar </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5" id="displayProfile_tglDaftar"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Alamat Tagihan </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5" id="displayProfile_alamatTagihan"></p>
                                    </div>
                                </div>
                                <div class="card px-3 m-t-1" style="box-shadow: none; background-color:#F6F8FA; ">
                                    <div class="row" style="margin-top: 15px;">
                                        <p class="text-left col-5">Jenis Kerjasama </p>
                                        <p class="col-1">:</p>
                                        <p class="col-5" id="displayProfile_jenisKerjasama"></p>
                                    </div>
                                </div>


                                <div class="d-flex align-items-center justify-content-between"
                                    style="margin-top: 30px; margin-left: 4px; margin-bottom: 20px;">
                                    <h5 class="mb-0">Kontak</h5>
                                    <small class="text-muted float-end"></small>
                                </div>
                                <div class="col">
                                    <div class="row row-cols-2 mb-3">
                                        <div class="card px-3 m-t-1"
                                            style="box-shadow: none; background-color:#F6F8FA; ">
                                            <div class="row" style="margin-top: 15px;">
                                                <p class="text-left col-3">Telepon </p>
                                                <p class="col-1"> 1:</p>
                                                <p class="col-7" id="displayProfile_telepon1"></p>
                                            </div>
                                        </div>
                                        <div class="card px-3 m-t-1"
                                            style="box-shadow: none; background-color:#F6F8FA; ">
                                            <div class="row" style="margin-top: 15px;">
                                                <p class="text-left col-3">2</p>
                                                <p class="col-1">:</p>
                                                <p class="col-7" id="displayProfile_telepon2"> </p>
                                            </div>
                                        </div>
                                        <div class="card px-3 m-t-1"
                                            style="box-shadow: none; background-color:#F6F8FA; ">
                                            <div class="row" style="margin-top: 15px;">
                                                <p class="text-left col-3">Kontak Person </p>
                                                <p class="col-1"> 1:</p>
                                                <p class="col-7" id="displayProfile_kontakPerson1"> </p>
                                            </div>
                                        </div>
                                        <div class="card px-3 m-t-1"
                                            style="box-shadow: none; background-color:#F6F8FA; ">
                                            <div class="row" style="margin-top: 15px;">
                                                <p class="text-left col-3">2</p>
                                                <p class="col-1"> :</p>
                                                <p class="col-7"id="displayProfile_kontakPerson2"> </p>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <div class="card px-3 m-t-1"
                                                style="box-shadow: none; background-color:#F6F8FA; ">
                                                <div class="row" style="margin-top: 15px;">
                                                    <p class="text-left col-3">Hp</p>
                                                    <p class="col-1"> :</p>
                                                    <p class="col-7" id="displayProfile_hp"> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button> -->
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
