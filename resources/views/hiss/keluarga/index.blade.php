@extends('layouts.sneat')

@section('content')
{{-- @include('hiss.member.partials.modalTambahdataPeserta')
@include('hiss.member.partials.modaldetailPeserta') --}}
<style>
.card {
 background: rgb(255, 255, 255);
 border-radius: 1.4em;
 box-shadow: 0 10px 20px 4px rgba(35, 35, 35, .1);
 border: rgb(250, 250, 250) 0.2em solid;
}
button {
 padding: 17px 40px;
 border-radius: 50px;
 border: 0;
 background-color: white;
 box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
 letter-spacing: 1.5px;
 font-size: 15px;
 transition: all .5s ease;
}

button:hover {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
}

button:active {
 letter-spacing: 3px;
 background-color: hsl(261deg 80% 48%);
 color: hsl(0, 0%, 100%);
 box-shadow: rgb(93 24 220) 0px 0px 0px 0px;
 transform: translateY(10px);
 transition: 100ms;
}

  </style>
<div class="card m-5">
    <div class="row d-flex justify-content-between">
      <div class="col-6">
        <h5 class="card-header">Peserta Perusahaan {{ $mtperusahaan->nama_perusahaan}}</h5>
      </div>  
      <div class="col-6">
        <div class="col-sm d-flex justify-content-end">
          {{-- <a href="/formatexcelpeserta/data-member.xlsx" type="button" class="btn text-white me-4" style="background-color:#0c5795;">Download Format excel</a> --}}
          {{-- <button type="button" id="btnOpenMemberUpload" class="btn text-white me-4" style="background-color:#0c5795;">Upload Data Member</button> --}}
          {{-- <button type="button" id="btnTambahDataMember" data-id="{{ $mtperusahaan->kode_perusahaan}}" class="btn text-white"style="background-color: #0c5795;">Tambah Data</button> --}}
        </div>
      </div> 
      </div>
    <div class="row">
      <div class="col-lg-6 col-sm-md-12">
        <div class="mb-4">
          <div class="card-body demo-vertical-spacing demo-only-element">
            <form method="GET" action="/indexkeluargapesertaperusahaan/{{ $mtperusahaan->kode_perusahaan}}">
            <div class="input-group input-group-merge">
              {{-- <select name="membershipType" class="btn" id="inputGroupSelect01"style="background-color:#0c5795; color:white;">
                <option value="0" selected>-- Pilih Membership --</option>
                <option value="1">Perusahaan</option>
                <option value="2">Perseorangan</option>
              </select> --}}
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
        </div>
      </div>
    </div>
    <div class="table-responsive text-trucate">
      <table class="table table-hover">
        <thead>
          <tr>
            <td style="color: #697a8d;font-weight: bold;">No</td>
            <td style="color: #697a8d;font-weight: bold;">Nama Karyawan</td>
            {{-- <td style="color: #697a8d;font-weight: bold;">Perusahaan</td> --}}
            <td style="color: #697a8d;font-weight: bold;">Jabatan</td>
            <td style="color: #697a8d;font-weight: bold;">Tanggal Lahir</td>
            <td style="color: #697a8d;font-weight: bold;">Jenis Kelamin</td>
            <td style="color: #697a8d;font-weight: bold;">Gol Darah</td>
            <td style="color: #697a8d;font-weight: bold;">Alergi</td>
            <td style="color: #697a8d;font-weight: bold;">Kelas</td>
            <td style="color: #697a8d;font-weight: bold;">Status</td>
            {{-- <td style="color: #697a8d;font-weight: bold;">Foto</td> --}}
            {{-- <td style="color: #697a8d;font-weight: bold;">Action</td> --}}
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($members as $key => $member)
            <tr>
            <td>{{ $members->firstItem() + $key }}</td>
            <td><a href="#" data-id="{{ $member->kd_Karyawan }}" class="keluarga">{{ $member->Nama_Karyawan }}</a></td>
            {{-- <td>{{ $member->nama_perusahaan }}</td> --}}
            <td>{{ $member->nama_jabatan }}</td>
            <td>{{ $member->tgl_lahir }}</td>
            <td>{{ $member->gender }}</td>
            <td>{{ $member->golongan_darah }}</td>
            <td>{{ $member->alergi }}</td>
            <td>{{ $member->nama_layanan }}</td>
            <td>{{ $member->status }}</td>
            {{-- <td>lihat</td> --}}
            {{-- <td>
              <a role="button" class="btn btn-sm linkEdit" data-id="{{$member->kd_Karyawan}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
              <a role="button" class="btn btn-sm linkDelete" data-id="{{ $member->kd_Karyawan }}"><i class="bx bx-trash me-1"></i> Delete</a>
            </td> --}}
          </tr>
          @endforeach          
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex justify-content-center mt-3 mb-5">
    {!! $members->links() !!}
  </div>

  <!-- Modal -->
  <div class="modal fade" id="mdlMemberUpload" tabindex="-1" aria-labelledby="mdlMemberUploadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="mdlMemberUploadLabel">Upload Data Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                  <div class="mb-3 row">
                    <div class="col-md-10">
                        <select name="kd_jabatan" class="form-control" id="listperusahaan">
                            <option value="0">-- Pilih Perusahaan --</option>
                            @foreach ($perusahaan as $perusahaans)
                                <option value="{{ $perusahaans->kode_perusahaan }}">{{ $perusahaans->nama_perusahaan }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="inpFileUpload" class="form-label">Pilih file yang akan diupload</label>
                      <input type="file" class="form-control" id="inpFileUpload" aria-describedby="fileUploadHelp">
                      <div id="fileUploadHelp" class="form-text">File harus berformat XLSX dengan kolom sesuai ketentuan</div>
                  </div>                        
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnUploadMember_submit" type="button" class="btn text-white" style="background-color:#0c5795;">Upload</button>  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>                    
            </div>
        </div>
    </div>
  </div>  
  @include('hiss.keluarga.partials.modalTambahdataKeluarga')
  {{-- @include('hiss.member.partials.modaldetailPeserta') --}}
  @include('hiss.keluarga.partials.modalkeluargaPeserta')
@endsection
