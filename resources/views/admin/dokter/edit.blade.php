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
        <a href="/admin/dokter" class="btn btn-info btn-md">Kembali</a>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">{{ $title }}</h4>
          <form action="/admin/dokter/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-body">
              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Dokter</label>
                    <input type="text" name="nama_dokter" class="form-control @error('nama_dokter') is-invalid @enderror" placeholder="Nama Dokter" value="{{ $data->nama_dokter }}">
                    @error('nama_dokter')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="alamat" value="{{ $data->alamat }}">
                    @error('alamat')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Spesialis</label>
                    <input type="text" name="spesialis" class="form-control @error('spesialis') is-invalid @enderror" placeholder="spesialis" value="{{ $data->spesialis }}">
                    @error('spesialis')
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