@extends('layouts.sneat')

@section('content')
    @include('partials.modalTambahdataKeluarga')
    <style>

.card {
 background: rgb(255, 255, 255);
 border-radius: 1.4em;
 box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
 border: rgb(250, 250, 250) 0.2em solid;
}

  </style>
    <div class="card m-5">
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <h5 class="card-header">Data Keluarga Peserta</h5>
            </div>
            <div class="col-6">
                <div class="col-sm d-flex justify-content-end">
                    <button type="button" id="tambahdatakeluarga" class="btn text-white" style="background-color:#0c5795;">Tambah Data</button>&nbsp;
                    {{-- <input class="btn text-white" type="file"style="background-color:#0c5795;" value="Convert MS Excel" />&nbsp; --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-md-12">
                <div class="mb-4">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form method="GET" action="/keluarga-peserta">
                        <div class="input-group input-group-merge">
                            {{-- <select name="searchColumn" class="btn" id="inputGroupSelect01"style="background-color:#0c5795; color:white;">
                                <option value="" selected>-- Pencarian --</option>
                                <option value="nama">Nama Peserta</option>
                                <option value="nomor_polis">Nomor Polis</option>
                            </select> --}}
                            <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                            <input name="keyword" type="text" class="form-control" placeholder="Cari Keluarga Peserta" aria-label="Search..."
                                aria-describedby="basic-addon-search31" />
                            <button type="submit"
                                class="btn"style="background-color:#0c5795; color:white;">cari</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive text-trucate">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td style="color: #697a8d;font-weight: bold;">No</td>
                        <td style="color: #697a8d;font-weight: bold;">Nama Keluarga</td>
                        <td style="color: #697a8d;font-weight: bold;">Nama Karyawan</td>
                        <td style="color: #697a8d;font-weight: bold;">Hubungan Keluarga</td>
                        <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                        {{-- <td style="color: #697a8d;font-weight: bold;">Status Perkawinan</td> --}}
                        <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                        <td style="color: #697a8d;font-weight: bold;">Agama</td>
                        <td style="color: #697a8d;font-weight: bold;">Gol Darah</td>
                        <td style="color: #697a8d;font-weight: bold;">Alergi</td>
                        <td style="color: #697a8d;font-weight: bold;">Foto</td>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{-- <a href="#" data-id="" class="family-detail"> --}}
                                {{ $member->nama_keluarga_karyawan }}
                                {{-- </a> --}}
                            </td>
                            <td>{{ $member->Nama_Karyawan }}</td>
                            <td>{{ $member->hubungan_keluarga }}</td>
                            <td>{{ $member->tgl_lahir }}</td>
                            {{-- <td>{{ $member->kawin }}</td> --}}
                            <td>{{ $member->gender }}</td>
                            <td>{{ $member->agama }}</td>
                            <td>{{ $member->golongan_darah }}</td>
                            <td>{{ $member->alergi }}</td>
                            <td>Lihat</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3 mb-5">
        {!! $members->links() !!}
      </div>
    <!--modal Input-->
    <div class="modal fade" id="modalKeluargaPeserta" tabindex="-1" aria-labelledby="modalInputLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"style="background-color:#0c5795;">
                    <h5 class="modal-title text-white" id="modalInputLabel"><span id="namaMember_dlg"></span><br>Nomor Polis : <span id="nomorPolis_dlg"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4">
                        <button id="btnOpenTambahKeluargaDialog" 
                            type="button" 
                            class="col-2 btn btn-sm text-white" 
                            style="background-color:#0c5795;">Tambah Keluarga</button>

                        <div class="card-body">
                            <table id="tblMemberRelatives" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <td style="color: #697a8d;font-weight: bold;">Nama</td>
                                        <td style="color: #697a8d;font-weight: bold;">Status</td>
                                        <td style="color: #697a8d;font-weight: bold;">Usia</td>
                                        <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end content-->
                </div>
            </div>
        </div>
    </div>
@endsection
