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
        <h5 class="card-header">SLA</h5>
      </div>  
      <div class="col-6">
        <div class="col-sm d-flex justify-content-end">
          {{-- <button type="button" id="btnOpenMemberUpload" class="btn text-white me-4" style="background-color:#0c5795;">Upload Data Member</button> --}}
          {{-- <button type="button" id="btnTambahDataMember" class="btn text-white"style="background-color: #0c5795;">Tambah Data</button> --}}
        </div>
      </div> 
      </div>
    <div class="row">
      <div class="col-lg-6 col-sm-md-12">
        <div class="mb-4">
          <div class="card-body demo-vertical-spacing demo-only-element">
            <form method="GET" action="/sla">
            <div class="input-group input-group-merge">
              <select name="searchBy" class="btn" id="inputGroupSelect01"style="background-color:#0c5795; color:white;">
                @if(request()->get('searchBy') == 'employee')
                  <option value="employee" selected>Nama Karyawan</option>
                @else
                  <option value="employee">Nama Karyawan</option>
                @endif
                @if(request()->get('searchBy') == 'company')
                  <option value="company" selected>Nama Perusahaan</option>
                @else
                <option value="company">Nama Perusahaan</option>
                @endif
              </select>
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
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <td class="align-middle" style="color: #697a8d;font-weight: bold;">NO</td>
            <td class="align-middle" style="color: #697a8d;font-weight: bold;">NAMA KARYAWAN</td>
            <td class="align-middle" style="color: #697a8d;font-weight: bold;">NAMA PERUSAHAAN</td>
            <td class="align-middle" style="color: #697a8d;font-weight: bold;">JABATAN</td>
            <td class="align-middle" style="color: #697a8d;font-weight: bold;">KELAS</td>

            <!-- td style="color: #697a8d;font-weight: bold;">Presmi/Bulan Perorangan</td>
            <td style="color: #697a8d;font-weight: bold;">Premi/Tahun Perorangan</td>
            <td style="color: #697a8d;font-weight: bold;">Presmi/Bulan Keluarga</td>
            <td style="color: #697a8d;font-weight: bold;">Premi/Tahun Keluarga</td -->
            
            <!-- td style="color: #697a8d;font-weight: bold;">Pagu Perorangan</td>
            <td style="color: #697a8d;font-weight: bold;">Pagu Perorangan Keluarga</td -->
            <th>PREMI/BLN</th>
            <th>PREMI/THN</th>
            <th>PAGU</th>
            <td style="color: #697a8d;font-weight: bold;">TARIF RS/MALAM</td>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($sla as $slaP)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a role="button" data-id="{{ $slaP->kd_Karyawan }}" style="text-decoration:underline;" class="sla-link">{{ ucwords($slaP->Nama_karyawan) }}</a></td>
            <td>{{ ucwords($slaP->nama_perusahaan) }}</td>
            <td>{{ ucwords($slaP->nama_jabatan) }}</td>
            <td class="text-uppercase">{{ $slaP->SLA }}</td>

              @if($slaP->status == 'PERORANGAN')
              <td>{{ number_format($slaP->premi_per_bulan_perorangan) }}</td>
              <td>{{ number_format($slaP->premi_per_tahun_perorangan) }}</td>
              <td>{{ number_format($slaP->pagu_perorangan) }}</td>              
              @else
              <td>{{ number_format($slaP->premi_per_bulan_keluarga) }}</td>
              <td>{{ number_format($slaP->premi_per_tahun_keluarga) }}</td>            
              <td>{{ number_format($slaP->pagu_perorangan_keluarga) }}</td>
              @endif

            <td>{{ number_format($slaP->tarif_rs_permalam) }}</td>
          </tr>
          @endforeach          
        </tbody>
      </table>
    </div>
  </div>

  <div class="d-flex justify-content-center mt-3 mb-5">
    {!! $sla->links() !!}
  </div>

  {{-- <!-- Modal -->
  <div class="modal fade" id="mdlMemberUpload" tabindex="-1" aria-labelledby="mdlMemberUploadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="mdlMemberUploadLabel">Upload Data Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="inpFileUpload" class="form-label">Pilih file yang akan diupload</label>
                        <input type="file" class="form-control" id="inpFileUpload" aria-describedby="fileUploadHelp">
                        <div id="fileUploadHelp" class="form-text">File harus berformat XLSX dengan kolom sesuai ketentuan</div>
                    </div>                        
                </form>
            </div>
            <div class="modal-footer">
                <button id="btnUploadMember_submit" type="button" class="btn btn-primary" style="background-color:#0c5795;">Upload</button>  
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>                    
            </div>
        </div>
    </div>
  </div>   --}}

  @include('hiss.sla.modalDetailPeserta')
  @include('hiss.sla.modalDetailRiwayat')

@endsection