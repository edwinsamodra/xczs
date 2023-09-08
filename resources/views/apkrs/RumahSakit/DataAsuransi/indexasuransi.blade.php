@extends('apkrs.layoutRS.layoutRS')


@section('content')
    



    <div class="row mb-5">
        <div class="col-5">
            <div class="card h-100"
                style="margin-top: 3rem; margin-bottom: 3rem; margin-left: 3rem; margin-right: 1rem;">
                <div class="row d-flex justify-content-end" style="margin-top: 15px;">
                    <div class="fs-5 fw-bold text-right me-4">Kode Asuransi : {{ $asuransi->kode_asuransi }}</div>
                </div>
                <div class="row mt-2">
                    <div class="image d-flex justify-content-center">
                        @if(empty($asuransi->logo))
                            <img src="/assets/images/default-logo.png" class="rounded" width="200">
                        @else 
                            <img src="/{{ $asuransi->logo }}" class="rounded" width="200">
                        @endif
                    </div>
                    <h4 class="mb-20 mt-0  d-flex justify-content-center">{{ $asuransi->nama_asuransi }}</h4>
                    <p class="text-center" style="font-size:12px; font-weight:bold; box-shadow: none; ">{{ $asuransi->alamat }}</p>
                </div>
                {{-- <div class="row m-2">
                    <div class="card px-3 d-flex justify-content-start"
                        style="font-size:15px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        Jumlah Karyawan :
                    </div>
                </div> --}}
                <div class="row row-cols-2 m-2">
                    <div class="col px-3 d-flex justify-content-start"
                        style="font-size:15px; font-weight:bold; box-shadow: none;">Nama Perusahaan
                    </div>
                    <div class="col px-3 d-flex justify-content-start" style="font-size:15px; font-weight:bold; margin-bottom: 10px;">
                        Detail Perusahaan
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Nama Pemimpin :</div>
                            
                            <div class="col-5">{{ $asuransi->pimpinan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Nomor NIB</div>
                            
                            <div class="col-5">: {{ $asuransi->nomer_nib }}</div>
                        </div>
                    </div>
                    {{-- <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Alamat </div>
                            
                            <div class="col-5">: {{ $asuransi->alamat }}</div>
                        </div>
                    </div> --}}
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal NIB</div>
                            
                            <div class="col-5">: {{ $asuransi->tgl_nib_format }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kota </div>
                            
                            <div class="col-5">: {{ $asuransi->nama_kota }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal Daftar</div>
                            
                            <div class="col-5">: {{ $asuransi->tgl_daftar_format }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kecamatan </div>
                            
                            <div class="col-5">: {{ $asuransi->nama_kecamatan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Jenis Perusahaan</div>
                            
                            <div class="col-5">: {{ $asuransi->jenis_perusahaan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kelurahan </div>
                            
                            <div class="col-5">: {{ $asuransi->nama_kelurahan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Jenis Kerjasama</div>
                            
                            <div class="col-5">: {{ $asuransi->jenis_kerjasama }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kode Pos </div>
                            
                            <div class="col-5">: {{ $asuransi->kodepos }}</div>
                        </div>
                    </div>
                    {{-- <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Alamat Tagihan</div>
                            
                            <div class="col-5">: {{ $asuransi->alamat_tagihan }}</div>
                        </div>
                    </div> --}}
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA;">
                        <div class="row">
                            <div class="col-5">No Kontrak</div>
                            
                            <div class="col-5">: {{ $asuransi->no_surat_kontrak }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal Kontrak</div>
                            
                            <div class="col-5">: {{ $asuransi->tgl_kontrak_format }}</div>
                        </div>
                    </div>

                </div>

                <div class="row px-3 m-2" style="font-size:15px; font-weight:bold;">
                    Kontak
                    <div class="p-2 mt-2 d-flex justify-content-between rounded  stats"
                        style="font-size:10px; font-weight:bold; background-color:#F6F8FA;">
                        <div class="d-flex flex-column">
                            <span class="articles">Telepon</span>
                            <span class="number1">1 : {{ $asuransi->telpon1 }}</span>
                            <span class="number1">2 : {{ $asuransi->telpon2 }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="followers">Kontak Person</span>
                            <span class="number2">1 : {{ $asuransi->kontakperson }}</span>
                            <span class="number2">2 : {{ $asuransi->kontakperson2 }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Hp :</span>
                            <span class="number3"> {{ $asuransi->hp }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Fax :</span>
                            <span class="number3"> {{ $asuransi->fax }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-7">
            <div class="card h-100" style="margin-top: 3rem; margin-right: 3rem; margin-left: 0rem;">
                <div class="row p-1">
                    <div class="col-8">
                        <a data-toggle='tab' href="#Tindakan" class="pmenu-active col btn btn-sm m-2">
                            <p class="pt-3"><strong>

                                Detail Tindakan yang Ditanggung
                            </strong>
                            </p>
                        </a>
                        <a data-toggle='tab' href='#Alkes' class="pmenu col btn btn-sm m-2">
                            <p class="pt-3"><strong>

                                Detail Obat & Alkes yang Ditanggung
                            </strong>
                            </p>
                        </a>
                    </div>
                    
                    <div class="col-2" style="float: right; top: 1.3rem; margin-right: 1px position:absolute; right:0px;">
                        <button class="btn btn-sm m-1 text-white" style="background-color:#00F218;">Tambah data</button>
                    </div>
                    
                </div>
                <div class="container">
                    <div class="tab-content custom-menu-content" style="padding: 2rem 1rem 0 1rem;">
                        <div id='Tindakan' class='tab-pane in active'>
                            <h5 class="text-dark">Detail Tindakan</h5>
                            <div class="table-responsive text-nowrap" style="margin-top: 0">
                                <table class="table table-sm">
                                    <thead class="">
                                        <tr>
                                            <td class="text-center" rowspan="2"style="color: #697a8d;font-weight: bold;">No</td>
                                            <td class="text-center" rowspan="2"style="color: #697a8d;font-weight: bold;">Kode Tindakan</td>
                                            <td class="text-center" rowspan="2"style="color: #697a8d;font-weight: bold;">Nama Tindakan</td>
                                            <td class="text-center" colspan="5" style="color: #697a8d;font-weight: bold;">Harga</td>
                                        </tr>
                                        <tr>
  
                                            <td style="color: #697a8d;font-weight: bold;">VVIP</td>
                                            <td style="color: #697a8d;font-weight: bold;">VIP</td>
                                            <td style="color: #697a8d;font-weight: bold;">Klas 1</td>
                                            <td style="color: #697a8d;font-weight: bold;">Klas 1</td>
                                            <td style="color: #697a8d;font-weight: bold;">Klas 1</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3 mb-5">
                            </div>
                        </div>
                        <div id='Alkes' class='tab-pane in '>
                            <h5 class="">Alkes</h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          


        @endsection
