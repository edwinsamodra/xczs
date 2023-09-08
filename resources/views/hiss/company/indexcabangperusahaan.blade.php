@extends('layouts.sneat')

@section('content')
    <style>
        .card {
            background: rgb(255, 255, 255);
            border-radius: 1.4em;
            box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
            border: rgb(250, 250, 250) 0.2em solid;
        }

        button {
  padding: 1.3em 3em;
  font-size: 12px;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #fff;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
}

button:hover {
  background-color: #23c483;
  box-shadow: 0px 15px 20px #F6F8FA;
  color: #fff;
  transform: translateY(-7px);
}

button:active {
  transform: translateY(-1px);
}
    </style>



    <div class="row mb-5">
        <div class="col-5">
            <div class="card h-100"
                style="margin-top: 3rem; margin-bottom: 3rem; margin-left: 3rem; margin-right: 1rem; background-image:url(/images/katakanpeta.png); ">
                <div class="row d-flex justify-content-end" style="margin-top: 15px;">
                    <div class="fs-5 fw-bold text-right me-4">Kode Perusahaan : {{ $mtperusahaan->kode_perusahaan }}</div>
                </div>
                <div class="row mt-2">
                    <div class="image d-flex justify-content-center">
                        @if(empty($mtperusahaan->logo))
                            <img src="/assets/images/default-logo.png" class="rounded" width="200">
                        @else 
                            <img src="/{{ $mtperusahaan->logo }}" class="rounded" width="200">
                        @endif
                    </div>
                    <h4 class="mb-20 mt-0  d-flex justify-content-center">{{ $mtperusahaan->nama_perusahaan }}</h4>
                </div>
                <div class="row m-2">
                    <div class="card px-3 d-flex justify-content-start"
                        style="font-size:15px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        Jumlah Karyawan :
                    </div>
                </div>

                <div class="row row-cols-2 m-2">

                    <div class="col px-3 d-flex justify-content-start"
                        style="font-size:10px; font-weight:bold; box-shadow: none;">
                    </div>
                    <div class="col px-3 d-flex justify-content-start" style="font-size:15px; font-weight:bold;">
                        Detail Perusahaan
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Nama Pemimpin </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->nama_pimpinan_perusahaan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal Kontrak</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->tgl_kontrak }}</div>
                        </div>
                    </div>
                    {{-- <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Nomor NIB</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->nomer_nib }}</div>
                        </div>
                    </div> --}}
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Alamat </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->alamat }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal NIB</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->tgl_nib }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kota </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->kota }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Tanggal Daftar</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->tgl_daftar }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kecamatan </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->nama_kecamatan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA;">
                        <div class="row">
                            <div class="col-5">No Kontrak</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->no_kontrak }}</div>
                        </div>
                    </div>
                    {{-- <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Jenis Perusahaan</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->jenis_perusahaan }}</div>
                        </div>
                    </div> --}}
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kelurahan </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->nama_kelurahan }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Jenis Kerjasama</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->jenis_kerjasama }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Kode Pos </div>
                            
                            <div class="col-5">: {{ $mtperusahaan->kodepos }}</div>
                        </div>
                    </div>
                    <div class="col card px-3 d-flex justify-content-start"
                        style="font-size:12px; font-weight:bold; box-shadow: none; background-color:#F6F8FA; ">
                        <div class="row">
                            <div class="col-5">Alamat Tagihan</div>
                            
                            <div class="col-5">: {{ $mtperusahaan->alamat_tagihan }}</div>
                        </div>
                    </div>
                    
                    

                </div>

                <div class="row px-3 m-2" style="font-size:15px; font-weight:bold;">
                    Kontak
                    <div class="p-2 mt-2 d-flex justify-content-between rounded  stats"
                        style="font-size:10px; font-weight:bold; background-color:#F6F8FA;">
                        <div class="d-flex flex-column">
                            <span class="articles">Telepon</span>
                            <span class="number1">1 : {{ $mtperusahaan->telpon1 }}</span>
                            <span class="number1">2 : {{ $mtperusahaan->telpon2 }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="followers">Kontak Person</span>
                            <span class="number2">1 : {{ $mtperusahaan->kontakperson1 }}</span>
                            <span class="number2">2 : {{ $mtperusahaan->kontakperson2 }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Hp :</span>
                            <span class="number3"> {{ $mtperusahaan->hp }}</span>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="rating">Fax :</span>
                            <span class="number3"> {{ $mtperusahaan->fax }}</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-7">
            <div class="card h-100" style="margin-top: 3rem; margin-right: 3rem; margin-left: 0rem;">
                <div class="row ">
                    <div class="col-md-4">
                        <h5 class="p-4">Data Cabang Perusahaan</h5>
                    </div>
                    <div class="col-md-8">
                        <div class="col-sm p-3 d-flex justify-content-end">
                            <button id="btnTambahDataCabangPerusahaan" data-id="{{ $kode_perusahaan }}" type="button"
                                class="btn text-white" style="background-color: #0c5795;">Tambah Data</button>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-sm-md-12 mb-3 p-3 ">
                    <form method="GET" action="/cabangmitra/{{ $kode_perusahaan }}">
                        <div class="input-group input-group-merge">

                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input name="keyword" type="text" class="form-control"
                                placeholder="Cari Cabang Perusahaan" aria-label="Search..."
                                aria-describedby="basic-addon-search31" />
                            <button type="submit"
                                class="btn"style="background-color:#0c5795; color:white;">cari</button>
                        </div>
                    </form>
                </div>
                <div class="container">

                    <div class="table-responsive text-nowrap" style="margin-top: 0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td style="color: #697a8d;font-weight: bold;">No</td>
                                    <td style="color: #697a8d;font-weight: bold;">Nama Cabang Perusahaan</td>
                                    {{-- <td style="color: #697a8d;font-weight: bold;">Nama Perusahaan</td> --}}
                                    <td style="color: #697a8d;font-weight: bold;">Nama Pimpinan Cabang</td>
                                    <td style="color: #697a8d;font-weight: bold;">Kode Pos</td>
                                    <td style="color: #697a8d;font-weight: bold;">Kelurahan</td>
                                    <td style="color: #697a8d;font-weight: bold;">Kecamatan</td>
                                    <td style="color: #697a8d;font-weight: bold;">Kota</td>
                                    <td style="color: #697a8d;font-weight: bold;">Actions</td>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @if(count($branchcompanies) > 0)
                                    @foreach ($branchcompanies as $key => $branchcompany)
                                        <tr>
                                            <td>{{ $branchcompanies->firstItem() + $key }}</td>
                                            <td><a href="#" class="detailcabangmitra"
                                                    data-id="{{ $branchcompany->id_cabang_perusahaan }}">{{ $branchcompany->nama_cabang_perusahaan }}</a>
                                            </td>
                                            {{-- <td>{{ $branchcompany->nama_perusahaan }}</td> --}}
                                            <td>{{ $branchcompany->nama_pimpinan_cabang }}</td>
                                            <td>{{ $branchcompany->kode_pos }}</td>
                                            <td>{{ $branchcompany->nama_kelurahan }}</td>
                                            <td>{{ $branchcompany->nama_kecamatan }}</td>
                                            <td>{{ $branchcompany->nama_kota }}</td>
                                            <td>
                                                <a role="button" class="btn btn-sm linkEditcabangmitra"
                                                    data-id="{{ $branchcompany->id_cabang_perusahaan }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a role="button" class="btn btn-sm linkDeletecabangmitra"
                                                    data-id="{{ $branchcompany->id_cabang_perusahaan }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td class="text-center border" colspan="8">Tidak ada data cabang mitra perusahaan</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3 mb-5">
                    {!! $branchcompanies->links() !!}
                </div>
                <div class="row ">
                    <div class="col-md-4">
                        <h5 class="p-4">Data Paket Asuransi</h5>
                    </div>
                    <div class="col-md-8">
                        <div class="col-sm p-3 d-flex justify-content-end">
                            <button id="btnTambahDataPaketAsuransiPerusahaan" data-id="{{ $kode_perusahaan }}" type="button"
                                class="btn text-white m-1" style="background-color: #0c5795;">Tambah Paket</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="m-1">
                            <div class="table-responsive text-nowrap p-4" style="margin-top: 0">
                                <h5>Paket Jatah Kelas</h5>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <td style="color: #697a8d;font-weight: bold;">No</td>
                                            <td style="color: #697a8d;font-weight: bold;">Jabatan</td>
                                            <td style="color: #697a8d;font-weight: bold;">Kelas</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if(count($jatahkelas) > 0)
                                            @foreach ($jatahkelas as $branchcompany )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $branchcompany->nama_jabatan }}</td>
                                                    <td>{{ $branchcompany->nama_layanan }}</td>
        
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td class="text-center" colspan="3">Tidak ada data paket asuransi</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="m-1">
                            <div class="table-responsive text-nowrap p-4" style="margin-top: 0">
                                <h5>Paket Asuransi</h5>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <td style="color: #697a8d;font-weight: bold;">No</td>
                                            <td style="color: #697a8d;font-weight: bold;">Paket</td>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @if(count($packages) > 0)
                                            @foreach ($packages as $branchcompany )
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $branchcompany->nama_paket_asuransi }}</td>
        
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td class="text-center" colspan="3">Tidak ada data paket asuransi</td></tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
                
            </div>
          


            @include('hiss.company.partials.modalTambahDataCabangPerusahaan')
            @include('hiss.company.partials.modalTambahDataPaketPerusahaan')
            
            {{-- @include('hiss.company.partials.modalDetailMitra') --}}
        @endsection
