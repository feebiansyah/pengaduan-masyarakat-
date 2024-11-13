<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1 >Data Laporan Pengaduan Masyarakat</h1>
  
    

    <table border="1" cellpadding="5" cellspacing="4">
    <tr>
      <th>NO</th>
      <th>Pengadu</th>
      <th>Tanggal Pengaduan</th>
      <th>Isi Laporan</th>
      <th>Status</th>
    </tr>
    @foreach($pengaduan as $data)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data->masyarakat->nama_lengkap }}</th>
      <td>{{ $data->tgl_pengaduan }}</td>
      <td>{{ $data->isi_laporan }}</td>
      <td>{{ $data->status }}</td>
    </tr>
    @endforeach
  </table>
    
</body>
</html>