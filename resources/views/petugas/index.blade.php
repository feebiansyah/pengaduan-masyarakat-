<x-layouts>
    <x-slot:loginAs>{{ $loginAs }}</x-slot>
    <h1 class="text-center my-3">Selamat Datang <b>{{ Auth::user()->nama_petugas }}
    </b>Di Halalaman Petugas</h1>
    @if(Auth::user()->level == 'petugas')
    <div class="row justify-content-center" >
      <div class="col-8"> 
      <div class="d-flex justify-content-between">
        <a href="/petugas/tanggapan" class="btn btn-sm btn-primary">Tulis Tanggapan</a>
          <a href="/petugas/laporan" class="btn btn-sm btn-info">Buat Laporan</a>
      </div>
      </div>
    </div>
    @else
    <div class="row justify-content-center">
      <a class="btn btn-primary"href="/petugas/tambah-petugas">tambah petugas</a>
    </div>
    @endif
</x-layouts>