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
        <a href="/admin/user/create" class="btn btn-primary btn-md">Tambah Data</a>
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
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Role</th>
                  <th scope="col">Dibuat</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)    
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ ($item->alamat == null) ? 'NULL' : $item->alamat }}</td>
                    <td>{{ $item->role }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                      <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>
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