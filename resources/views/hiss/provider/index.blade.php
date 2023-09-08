@extends('layouts.sneat')

@section('content')
<div class="card m-5">
    <div class="row d-flex justify-content-between">
        <div class="col-6">
          <h5 class="card-header">Data Provider</h5>
        </div>  
        <div class="col-6">
            <div class="col-sm d-flex justify-content-end">
              <button id="btnTambahDataProvider" type="button" class="btn text-white" style="background-color:#0c5795;">Tambah Provider</button>
            </div>
        </div> 
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-4">
          <div class="card-body demo-vertical-spacing demo-only-element">
            <form method="GET" action="/provider">
            <div class="input-group input-group-merge">
              <select name="providerCategory" class="btn" id="lstJenisInstitusi"style="background-color:#0c5795; color:white;">
                <option value="0" selected>-- Pilih Kategori Provider --</option>
                @foreach($providerCategories as $providerCategory)
                    <option value="{{ $providerCategory->id }}">{{ $providerCategory->name }}</option>
                @endforeach
              </select>
              <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
              <input name="keyword"
                type="text"
                class="form-control"
                placeholder="Search..."
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
            <td style="color: #697a8d;font-weight: bold;">Action</td>
            <td style="color: #697a8d;font-weight: bold;">Provider</td>     
            <td style="color: #697a8d;font-weight: bold;">Alamat</td>
            <td style="color: #697a8d;font-weight: bold;">Telepon</td>
            <td style="color: #697a8d;font-weight: bold;">Contact Person</td>
            <td style="color: #697a8d;font-weight: bold;">Status</td>
            <td style="color: #697a8d;font-weight: bold;">Perjanjian</td>
            <td style="color: #697a8d;font-weight: bold;">Kategori</td>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($providers as $provider)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a style="cursor:pointer;" class="btnEditProvider dropdown-item" data-id="{{ $provider->id }}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                    <a style="cursor:pointer;" class="btnDeleteProvider dropdown-item" data-id="{{ $provider->id }}"><i class="bx bx-trash me-1"></i>Delete</a>
                </td>
                <td><a href="#" class="detailprovider" data-id="{{ $provider->id }}">{{ $provider->nama_provider }}</a></td>
                <td>{{ $provider->alamat }}</td>
                <td>{{ $provider->nomor_telepon }}</td>
                <td>{{ $provider->contact_person }}</td>
                <td>{{ $provider->is_active }}</td>
                <td>{{ $provider->partnership }}</td>
                <td>{{ $provider->provider_category }}</td>
            </tr>
          @endforeach          
        </tbody>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-center mt-3 mb-5">
    {!! $providers->links() !!}
  </div>
  @include('hiss.provider.partials.modalTambahDataProvider')
  @include('hiss.provider.partials.modalDetailProvider')
@endsection
