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
        <a href="/admin/ruang/create" class="btn btn-primary btn-md">Tambah Data</a>
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
                  <th>Ruangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->ruang }}</td>
                    <td>
                      @if ($item->status == 'used')
                        <span class="btn btn-sm btn-danger text-white">{{ $item->status }}</span>
                      @else
                        <span class="btn btn-sm btn-success text-white">{{ $item->status }}</span>
                      @endif
                    </td>
                    <td>
                      <form action="/admin/ruang/{{ $item->id }}" method="POST" onsubmit="return confirm('apakah anda yakin akan mengahpus data {{ $item->ruang }}')">
                        @csrf
                        @method('DELETE')
                        <a href="/admin/ruang/{{ $item->id }}/edit" class="btn btn-sm btn-info text-white">Ubah</a>
                        <button type="submit" class="btn btn-sm btn-danger text-white">Hapus</button>
                      </form>
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