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
        <a href="/admin/pasien/create" class="btn btn-primary btn-md">Tambah Data</a>
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
          <h6 class="card-subtitle">
            Untuk mengelola data {{ $title }}
          </h6>
          <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered no-wrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Dokter</th>
                  <th>Nama Pasien</th>
                  <th>Alamat</th>
                  <th>Datang</th>
                  <th>Keluhan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->dokter->nama_dokter }}</td>
                    <td>{{ $item->nama_pasien }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tanggal_datang }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <a href="/admin/pasien/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection