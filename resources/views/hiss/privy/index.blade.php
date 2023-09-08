@extends('layouts.sneat')

@section('content')
    <div class="card m-5">
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <h5 class="card-header">Data Peserta PrivyID</h5>
            </div>
            <div class="col-6">
                <div class="col-sm d-flex justify-content-end">
                    <button id="btnTambahDataPrivy" type="button" class="btn text-white" style="background-color: #0c5795;">Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-md-12">
                <div class="mb-4">
                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <form method="GET" action="/privy">
                            <div class="input-group input-group-merge d-flex">
                                <select name="membershipType" class="btn" id="lstMembershipType"
                                    style="background-color:#0c5795; color:white;">
                                    <option value="0" selected>-- Pilih Tipe Membership --</option>
                                    <option value="1">Perusahaan</option>
                                    <option value="2">Perorangan</option>
                                </select>
                                <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                                <input name="keyword" type="text" class="form-control" placeholder="Search..."
                                    aria-label="Search..." aria-describedby="basic-addon-search31" />
                                <button type="submit"
                                    class="btn"style="background-color:#0c5795; color:white;">cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
          #mainTable td {text-align:left;}
        </style>
        <div class="table-responsive text-truncate">
            <table id="mainTable" class="table table-sm">
                <thead>
                    <tr>
                        <td style="color: #697a8d;font-weight: bold;">No</td>
                        <td style="color: #697a8d;font-weight: bold;">Action</td>
                        <td style="color: #697a8d;font-weight: bold;">No Polis</td>
                        <td style="color: #697a8d;font-weight: bold;">Nama</td>
                        <td style="color: #697a8d;font-weight: bold;">Alamat</td>
                        <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
                        <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0 text-center">
                    @foreach ($privyMembers as $privyMember)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <a data-id="{{ $privyMember->id }}" style="cursor:pointer" class="btnEditPrivy dropdown-item">
                                    <i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a data-id="{{ $privyMember->id }}" style="cursor:pointer" class="btnDeletePrivy dropdown-item">
                                    <i class="bx bx-trash me-1"></i> Delete</a>

                            </td>
                            <td>{{ $privyMember->nomor_polis }}</td>
                            <td><a href="#" class="detailprivy" data-id="{{ $privyMember->id }}">{{ $privyMember->nama }}</a></td>
                            <td>{{ $privyMember->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($privyMember->tanggal_lahir)->format('d/m/Y') }}</td>
                            <td>{{ $privyMember->jenis_kelamin }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3 mb-5">
        {!! $privyMembers->links() !!}
    </div>

    @include('hiss.privy.partials.modalTambahDataPrivy')
    @include('hiss.privy.partials.modalDetailPrivy')
@endsection
