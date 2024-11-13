<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
  <div class="container">
    <h1 class="text-center my-4">Selamat Datang <strong>{{ $user }}</strong> Di Aplikasi Pengaduan Masyarakat</h1>
    <div class="row justify-content-center">
      <div class="col-4">
        <a href="/pengaduan" class="btn btn-primary">Tulis laporan</a>
      </div>
      <div class="col-4">
        <a href="/riwayat" class="btn btn-info">Riwayat laporan</a>
      </div>
    </div>
  </div>
</x-layouts>