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
        <a href="/admin/rawat-inap" class="btn btn-info btn-md">Kembali</a>
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
          <form action="/admin/rawat-inap" method="POST">
            @csrf
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Pasien ID</label>
                    <select name="pasien_id" class="form-control @error('pasien_id') is-invalid @enderror">
                      @foreach ($pasiens as $item)
                        <option value="{{ $item->id }}" {{ (old('pasien_id') == $item->id) ? 'selected' : '' }}>{{ $item->nama_pasien }}</option>
                      @endforeach
                    </select>
                    @error('pasien_id')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Ruang ID</label>
                    <select name="ruang_id" class="form-control @error('ruang_id') is-invalid @enderror">
                      @foreach ($ruangs as $item)
                        <option value="{{ $item->id }}" {{ (old('ruang_id') == $item->id) ? 'selected' : '' }}>{{ $item->ruang }}</option>
                      @endforeach
                    </select>
                    @error('ruang_id')
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