@extends('apkrs.layoutRS.layoutRS')

@section('content')
<div class="card mt-5" style="width: 80rem; margin:auto;">
    <div class="main-menu-area"style="border-radius :10px 10px 0px 0px;background-color:#0c5795; width:auto;" >
        <h6 class="text-white" style="padding: 15px 0px 1px 3rem;">Daftar Pasien Baru</h6>
    </div>
    <div class="card-body pt-5" id="modalTambahPasien_content">
        <div class="row">
            <div class="col-6">
                <div class="m-3">
                    <div class="row">
                        <h4 class="text-dark">Data Pasien</h4>
                        <label class="text-dark m-1" for="namaPasien">Nama Pasien</label>
                        <input type="text" class="form-control" id="namaPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="genderPasien">Jenis Kelamin</label>
                        <select name="gender" class="form-control" id="listgenderPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Jenis Kelamin --</option>
                            @foreach ($gender as $genders)
                            <option value="{{ $genders->id_dc_gender }}">{{ $genders->gender }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-dark m-1" for="tempatLahirPasien">Tempat Lahir</label>
                            <div class="row" style="margin-right: 10px;">
                                <input type="text" class="form-control" id="tempatLahirPasien" style="border: 1px solid #0c5795;"/>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark m-1" for="tanggalLahirPasien">Tanggal Lahir</label>
                            <div class="row" style="margin-left: 10px;">
                                <input type="date" class="form-control" id="tanggalLahirPasien" style="border: 1px solid #0c5795;"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="namaKeluargaPasien">Nama Keluarga</label>
                        <input type="text" class="form-control" id="namaKeluargaPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <div class="row">
                            <div class="col-6">
                                    <label class="text-dark m-1" for="noKTPPasien">No. KTP/No. KTA</label>
                                    <div class="row" style="margin-right: 10px;">
                                      <input type="text" class="form-control" id="noKTPPasien" style="border: 1px solid #0c5795;"/>
                                    </div>
                            </div>
                            <div class="col-6">
                                    <label class="text-dark m-1" for="agamaPasien">Agama</label>
                                    <div class="row" style="margin-left: 10px;">
                                        <select name="agama" class="form-control" id="listagamaPasien" style="border: 1px solid #0c5795;">
                                            <option value="0">-- Agama --</option>
                                            @foreach ($agama as $agamas)
                                            <option value="{{ $agamas->id_dc_agama }}">{{ $agamas->agama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="alamatPasien">Alamat</label>
                        <textarea type="text" class="form-control" id="alamatPasien" style="border: 1px solid #0c5795; height:8rem;"></textarea>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-dark m-1" for="provinsiPasien">Provinsi</label>
                            <div class="row" style="margin-right: 10px;">
                                <select name="provinsi" class="form-control" id="listprovinsiPasien" style="border: 1px solid #0c5795;">
                                    <option value="0">-- Provinsi --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark m-1" for="kotaPasien">Kota</label>
                            <div class="row" style="margin-left: 10px;">
                                <select name="kota" class="form-control" id="listkotaPasien" style="border: 1px solid #0c5795;">
                                    <option value="0">-- Kota --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <div class="col-6">
                            <label class="text-dark m-1" for="kecamatanPasien">Kecamatan</label>
                            <div class="row" style="margin-RIGHT: 10px;">
                                <select name="kecamatan" class="form-control" id="listkecamatanPasien" style="border: 1px solid #0c5795;">
                                    <option value="0">-- Kecamatan --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="text-dark m-1" for="kelurahanPasien">Kelurahan</label>
                            <div class="row" style="margin-left: 10px;">
                                <select name="kelurahan" class="form-control" id="listkelurahanPasien" style="border: 1px solid #0c5795;">
                                    <option value="0">-- Kelurahan --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="kodePosPasien">Kode Pos</label>
                        <input type="text" class="form-control" id="kodePosPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="m-3">
                    <div class="row">
                        <h4 class="text-dark">Detail Pasien</h4>
                        <label class="text-dark m-1" for="jenisPasien">Jenis Pasien</label>
                        <input type="text" class="form-control" id="jenisPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="tittlePasien">Tittle</label>
                        <input type="text" class="form-control" id="tittlePasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="statusPernikahaPasien">Status Pernikahan</label>
                        <select name="kawin" class="form-control" id="liststatusPernikahaPasien" style="border: 1px solid #0c5795;">
                            <option value="0">-- Status Pernikahan --</option>
                            @foreach ($kawin as $kawins)
                            <option value="{{ $kawins->id_dc_kawin }}">{{ $kawins->kawin }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="hpPasien">No Hp</label>
                        <input type="text" class="form-control" id="hpPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="pekerjaanPasien">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaanPasien" style="border: 1px solid #0c5795;">
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="emailPasien">Email</label>
                        <input type="email" class="form-control" id="emailPasien" style="border: 1px solid #0c5795;">
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="listgoldarah">Golongan Darah</label>
                        <select name="kd_perusahaan" class="form-control" id="listgoldarah" style="border: 1px solid #0c5795;">
                            <option value="0">-- Golongan Darah --</option>
                            @foreach ($goldarah as $goldarahs)
                            <option value="{{ $goldarahs->id_dc_gol_darah }}">{{ $goldarahs->golongan_darah }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="text-dark m-1" for="alergiPasien">Alergi</label>
                        <input type="text" class="form-control" id="alergiPasien" style="border: 1px solid #0c5795;"/>
                    </div>
                </div>
                <div class="m-3">
                    <div class="row">
                        <label class="col-12 text-dark m-1" for="TipeSubmitPasien">Tipe Submit Pasien</label>
                        <div class="col-6">
                        <div class="row" style="margin-right: 10px;">
                                <button class="form-control btn btn-md text-white" id="take" style="background-color: #0c5795">Ambil Foto</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row" style="margin-left: 10px;">
                                <input type="file" class="btn text-white" style="background-color: #0c5795; height:2.5rem;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end Detail Perusahaan -->
      </div>     
      <div class="card-footer">
        <div class="row justify-content-center">
            <button type="submit" class="col-2 m-3 btn text-white" id="btn" style="background: #0c5795; border-radius:5px;">Simpan</button>
            <button type="button" class="col-2 m-3 btn text-dark" style="background: #EAEAEA; border-radius:5px;">Batal</button>        
        </div>
      </div>
</div>
@include('apkrs.Registrasi.Registrasi.partials.modalTakepicture')


          
@endsection
