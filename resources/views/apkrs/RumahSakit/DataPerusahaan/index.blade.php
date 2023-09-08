@extends('apkrs.layoutRS.layoutRS')
@section('content')

<div class="card m-5">
    <div class="row d-flex justify-content-between">
      <div class="col-6">
        <h5 class="card-header">Data Perusahaan</h5>
      </div>  
  
      <div class="col-6">
        <div class="col-sm d-flex justify-content-end p-3">
          <a href="/assets/documents/templates/batch-upload-data-member.xlsx" type="button" class="btn text-white me-4" style="background-color:#0c5795;">Download Format excel</a>
          <button type="button" id="btnOpenMemberUpload" class="btn text-white me-4" style="background-color:#0c5795;">Upload Data Member</button>
          <button type="button" id="btnTambahDataMember" data-id="" class="btn text-white"style="background-color: #0c5795;">Tambah Data</button>
        </div>
      </div> 
      <!-- <div class="col-6">
        <div class="col-sm d-flex justify-content-end">
          <button id="btnTambahDataPerusahaan" type="button" class="btn text-white" style="background-color: #0c5795;">Tambah Data</button>
        </div>
      </div>  -->
    </div>
    <div class="col-lg-6 col-sm-md-12 card-body demo-vertical-spacing demo-only-element">
      <form method="GET" action="/dataPerusahaan">
      <div class="input-group input-group-merge">
       
        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
        <input name="keyword" 
          type="text"
          class="form-control"
          placeholder="Cari Nama Karyawan"
          aria-label="Search..."
          aria-describedby="basic-addon-search31"
        />
        <button type="submit" class="btn"style="background-color:#0c5795; color:white;">cari</button>
      </div>
    </form>
    </div>
    <div class="table-responsive text-nowrap p-3">
      <table class="table table-sm">
        <thead>
          <tr>
            <td style="color: #697a8d;font-weight: bold;">No</td>
            <td style="color: #697a8d;font-weight: bold;">Nama Karyawan</td>
            <td style="color: #697a8d;font-weight: bold;">Jabatan</td>
            <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
            <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
            <td style="color: #697a8d;font-weight: bold;">Gol Darah</td>
            <td style="color: #697a8d;font-weight: bold;">Alergi</td>
            <td style="color: #697a8d;font-weight: bold;">Kelas</td>
            <td style="color: #697a8d;font-weight: bold;">Status</td>
            <td style="color: #697a8d;font-weight: bold;">Action</td>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($karyawan as $key => $member)
            <tr>
            <td>{{ $karyawan->firstItem() + $key }}</td>
            <td><a href="#" data-id="{{ $member->kd_Karyawan }}" class="detail">{{ $member->Nama_Karyawan }}</a></td>
            {{-- <td>{{ $member->nama_perusahaan }}</td> --}}
            <td>{{ $member->nama_jabatan }}</td>
            <td>{{ $member->tgl_lahir }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->golongan_darah }}</td>
            <td>{{ $member->alergi }}</td>
            <td>{{ $member->nama_layanan }}</td>
            @if('Berkeluarga'==($member->status))
            <td><a href="#" data-id="{{ $member->kd_Karyawan }}" class="keluarga">{{ $member->status }}</a></td>
            @else
            <td>{{ $member->status }}</td>
            @endif

            {{-- <td>lihat</td> --}}
            <td>
              <a role="button" class="btn btn-sm linkEdit" data-id="{{$member->kd_Karyawan}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a role="button" class="btn btn-sm linkDelete" data-id="{{ $member->kd_Karyawan }}"><i class="bx bx-trash me-1"></i> Delete</a>
            </td>
          </tr>
          @endforeach   
        </tbody>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3 mb-5">
  {!! $karyawan->links() !!}

  </div>

  @endsection