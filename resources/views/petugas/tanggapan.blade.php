<x-layouts>
    <x-slot:loginAs>{{ $loginAs }}</x-slot>
    <h1 class="text-center my-3">Daftar Pengaduan Masyarakat</h1>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th>NO</th>
            <th>Foto</th>
            <th>Nama Masyarakat</th>
            <th>Status</th>
            <th>Detail</th>
          </tr>
          @foreach($pengaduan as $data)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ asset($data->foto) }}" width="100px" alt=""></td>
            <td>{{ $data->masyarakat->nama_lengkap }}</td>
            <td>{{ $data->status }}</td>
            <td><a href="/petugas/tanggapan/detail/{{ $data->id }}" class="">detail</a></td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
</x-layouts>