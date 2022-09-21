@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good {{ Auth::user()->nama }}!</h3>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="index.html">{{ $title }}</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  
  <div class="card-group">
    <div class="card border-right">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <div class="d-inline-flex align-items-center">
              <h2 class="text-dark mb-1 font-weight-medium">{{ $pasien_dirawat }}</h2>
              <span
                class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
            </div>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pasien Dirawat</h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-right">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
              class="set-doller"></sup>{{ $pasien_selesai }}</h2>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pasien Selesai
            </h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card border-right">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <div class="d-inline-flex align-items-center">
              <h2 class="text-dark mb-1 font-weight-medium">{{ $dokter }}</h2>
              <span
                class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span>
            </div>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Dokter</h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex d-lg-flex d-md-block align-items-center">
          <div>
            <h2 class="text-dark mb-1 font-weight-medium">{{ $ruangan }}</h2>
            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ruangan</h6>
          </div>
          <div class="ml-auto mt-md-3 mt-lg-0">
            <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection