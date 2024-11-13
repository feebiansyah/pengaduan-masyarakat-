<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
  <h1>Data Petugas Aplikasi Pengaduan Masyarakat</h1>
    <a class="btn btn-primary my-4"href="/petugas/tambah-petugas/create">+ Tambah Petugas</a>
  <table class="table table-bordered">
    <tr>
      <th>NO</th>
      <th>Nama Petugas</th>
      <th>Username</th>
      <th>No Telpon</th>
      <th>Aksi</th>
    </tr>
    @foreach($petugas as $data)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $data->nama_petugas }}</td>
      <td>{{ $data->username }}</td>
      <td>{{ $data->no_telp }}</td>
      <td>
        <a href="" class="btn btn-sm btn-warning">edit</a>
        <a href=""class="btn btn-sm btn-danger">delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</x-layouts>