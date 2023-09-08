@extends('layouts.site')

@section('content')
    <!-- Page Header Start -->
    <div
      class="container-fluid page-header py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 animated slideInDown mb-4">Log-In</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            
            <li class="breadcrumb-item active" aria-current="page">
              Log-In
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <h1 class="display-6 mb-5">
              Log-In Untuk Melanjutkan
            </h1>
            
              @if (session()->has('message'))
              <div class="text-center" style="border-radius:5px;margin-bottom:3em;color:#ff0000;padding-top:8px;padding:5px;border:solid 1px #ff0000;">
                {!! request()->session()->get('message') !!}
                @php
                  Session::forget('message');
                @endphp
              </div>
              @endif
            
            <form id="frmLogin" action="/login" method="POST">
              @csrf
              <div class="row g-3">
              <div class="col-12">
                  <div class="form-floating">
                  <input name="kode_user"
                      type="text"
                      class="form-control"
                      id="kodeUser"
                      placeholder="Email or Username"
                      autofocus
                    />
                    <label for="email">Kode User</label>
                  </div>
                </div>
               
                
                <div class="col-12">
                  <div class="form-floating">
                  <input name="username"
                      type="text"
                      class="form-control"
                      id="email"
                      placeholder="Email or Username"
                      autofocus
                    />
                    <label for="email">Email or Username</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                  <input name="password"
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="Password"
                  />
                    <label for="subject">Password</label>
                  </div>
                </div>
                
                <div class="col-12">
                  <button class="btn btn-primary py-3 px-5" type="submit">
                    Log-In
                  </button>
                </div>
              </div>
            </form>
            
          </div>
          <div
            class="col-lg-6 wow fadeIn"
            data-wow-delay="0.5s"
            style="min-height: 450px"
          >
           <div
            class="position-relative rounded overflow-hidden h-100"
            style="min-height: 400px"
          >
            <img
              class="img-fluid position-absolute w-100 h-100"
              src="img/mesin.png"
              alt=""
              style="object-fit: contain;"
            />
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->
@endsection