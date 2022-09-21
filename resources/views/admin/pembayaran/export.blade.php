<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Export PDF</title>
  <style>
    body{
      font-family: sans-serif;
    }

    table{
      border-collapse: collapse;
    }
  </style>
</head>
<body>
  <h4>{{ $title }}</h4>
  <table border="1" cellpadding="5">
    <thead>
      <tr>
        <th>#KodeBayar</th>
        <th>NIK</th>
        <th>Nama Pasien</th>
        <th>Total</th>
        <th>Dokter</th>
        <th>Status</th>
        {{-- <th>Aksi</th> --}}
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
        <tr>
          <td>{{ $item->kode_pembayaran }}</td>
          <td>{{ $item->pasien->nik }}</td>
          <td>{{ $item->pasien->nama_pasien }}</td>
          <td>Rp. {{ number_format($item->total) }}</td>
          <td>{{ $item->pasien->dokter->nama_dokter }}</td>
          <td>
            @if ($item->status == 'unpaid')
              <span>{{ $item->status }}</span>
            @else
              <span>{{ $item->status }}</span>
            @endif
          </td>
          {{-- <td>
            <a href="/admin/pembayaran/{{ $item->id }}/show" class="btn btn-sm btn-info text-white">Detail</a>
          </td> --}}
        </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>