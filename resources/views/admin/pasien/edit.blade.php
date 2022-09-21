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
        <a href="/admin/pasien" class="btn btn-info btn-md">Kembali</a>
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
          <form action="/admin/pasien/{{ $data->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-body">
              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pilih Dokter</label>
                    <select name="dokter_id" class="form-control @error('dokter_id') is-invalid @enderror">
                      @foreach ($dokters as $item)
                        <option value="{{ $item->id }}" {{ ($data->dokter_id == $item->id) ? 'selected' : '' }}>{{ $item->nama_dokter }}</option>
                      @endforeach
                    </select>
                    @error('dokter_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" value="{{ $data->nik }}">
                    @error('nik')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control @error('nama_pasien') is-invalid @enderror" placeholder="Nama Pasien" value="{{ $data->nama_pasien }}">
                    @error('nama_pasien')
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
                    <label>Keluhan</label>
                    <textarea name="keluhan" class="form-control @error('alamat') is-invalid @enderror" placeholder="Keluhan anda">{{ $data->keluhan }}</textarea>
                    @error('keluhan')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <input type="hidden" name="status" value="{{ $data->status }}">

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