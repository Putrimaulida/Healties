@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-7 align-self-center">
      <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $title }}</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb m-0 p-0">
            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
            <li class="breadcrumb-item text-muted active" aria-current="page">{{ $title }}</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-5 align-self-center">
      <div class="customize-input float-right">
        <a href="/admin/home" class="btn btn-info btn-md">Home</a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  @if(session('danger'))
    <div class="alert alert-danger">
      {{session('danger')}}
    </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ $title }}</h4>
          <form action="/admin/update_profile" method="POST" enctype="multipart/form-data">
            @csrf            
            @method('PUT')
            
            <div class="form-body">
              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Email"
                      class="form-control form-control-line @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" readonly>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
    
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" placeholder="Nama"
                      class="form-control form-control-line @error('nama') is-invalid @enderror" name="nama" value="{{ Auth::user()->nama }}">
                      @error('nama')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>
    
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" placeholder="Alamat"
                      class="form-control form-control-line @error('alamat') is-invalid @enderror" name="alamat" value="{{ Auth::user()->alamat }}">
                      @error('alamat')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Foto</label>
                    <input type="file" placeholder="File"
                      class="form-control form-control-line @error('foto') is-invalid @enderror" name="foto" value="{{ Auth::user()->foto }}">
                      @error('foto')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

              </div>
            </div>
            <div class="form-actions">
              <div class="text-right">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="reset" class="btn btn-dark">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>    
@endsection