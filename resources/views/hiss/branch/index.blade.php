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
    <div class="card m-5">
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <h5 class="card-header">Data Cabang Asuransi</h5>
            </div>
            <div class="col-6">
                <div class="col-sm d-flex justify-content-end">
                    <button id="btnTambahDataCabang" type="button" class="btn text-white m-3"
                        style="background-color: #0c5795;">Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-md-12 card-body demo-vertical-spacing demo-only-element">
            <form method="GET" action="/cabang">
                <div class="input-group input-group-merge">

                    <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                    <input name="keyword" type="text" class="form-control" placeholder="Cari Cabang Asuransi"
                        aria-label="Search..." aria-describedby="basic-addon-search31" />
                    <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
                </div>
            </form>
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <td style="color: #697a8d;font-weight: bold;">No</td>
                        <td style="color: #697a8d;font-weight: bold;">Logo</td>
                        <td style="color: #697a8d;font-weight: bold;">Nama Cabang</td>
                        <td style="color: #697a8d;font-weight: bold;">Kepala Cabang</td>
                        <td style="color: #697a8d;font-weight: bold;">Kode Pos</td>
                        <td style="color: #697a8d;font-weight: bold;">Kelurahan</td>
                        <td style="color: #697a8d;font-weight: bold;">Kecamatan</td>
                        <td style="color: #697a8d;font-weight: bold;">Kota</td>
                        <td class="text-center" style="color: #697a8d;font-weight: bold;">Actions</td>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($branches as $key => $branch)
                        <tr>
                            <td>{{ $branches->firstItem()+ $key }}</td>
                            @if (empty($branch->logo))
                                <td><a class="detailcabang" data-id="{{ $branch->branch_id }}"><img style="width:5em;"
                                            src="/assets/images/default-logo.png"></a></td>
                            @else
                                <td><a class="detailcabang" data-id="{{ $branch->branch_id }}"><img style="width:5em;"
                                            src="/{{ $branch->logo }}"></a></td>
                            @endif

                            <td>{{ $branch->nama_cabang }}</td>
                            <td>{{ $branch->kepala_cabang }}</td>
                            <td>{{ $branch->kode_pos }}</td>
                            <td>{{ $branch->nama_kelurahan }}</td>
                            <td>{{ $branch->nama_kecamatan }}</td>
                            <td>{{ $branch->nama_kota }}</td>
                            <td>
                                <a role="button" class="btn btn-sm detailcabang" data-id="{{ $branch->branch_id }}"><i
                                        class="bx bx-detail me-1"></i> Detail</a>
                                <a role="button" class="btn btn-sm linkEdit" data-id="{{ $branch->branch_id }}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a role="button" class="btn btn-sm linkDelete" data-id="{{ $branch->branch_id }}"><i
                                        class="bx bx-trash me-1"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-3 mb-5">
        {!! $branches->links() !!}
    </div>

    @include('hiss.branch.partials.modalTambahDataCabang')
    @include('hiss.branch.partials.modalDetailCabang')
@endsection
