<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
  @php 
  if($detail_laporan->status == 0){
    $detail_laporan->status = "belum ditanggapi";
    
  }
  @endphp
  <h1 class="text-center my-4">Detail Pengaduan </h1>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between">
        <p>Dari. <u>{{ $detail_laporan->masyarakat->nama_lengkap }}</u></p>
        <p class="text-end">Dibuat pada : {{ $detail_laporan->created_at->diffForHumans() }}</p>
      </div>
      <div class="d-flex justify-content-between">
        <a class="btn btn-sm btn-warning"href="/riwayat/edit/{{
        $detail_laporan->id }}">edit</a>
        <form action="/pengaduan/hapus/{{ $detail_laporan->id }}">
          @csrf
          
        <button class="btn btn-sm btn-danger" type="submit">hapus</button>
        </form>
      </div>
    @if (Session::has('success'))
    <div class="row justify-content-center mt-3">
      <div class="col-md-8 col-12 ">
        <div class="alert alert-success text-center">
          {!! Session::get('success') !!}
        </div>
      </div>
    </div>
    @endif
      <hr>
      <p class="text-center ">Status : <span class="">{{ $detail_laporan->status
      }}</span></p>
      <div class="col-8 mx-auto">
        <img class="mb-3 rounded mx-auto d-block img-thumbnail " width="250px"src="{{ asset($detail_laporan->foto) }}" alt="">
      </div>
      <hr>
        <p ><div>Isi Laporan Pengaduan : </div>{{ $detail_laporan->isi_laporan }}</p>
        <hr>
        <div class="d-flex">
          <a href="/riwayat">&laquo; kembali</a>
        </div>
    </div>
  </div>   
   @if($tanggapan->isEmpty())
    <div class="card my-4">
      <p class="text-center">Laporan belum ditanggapi</p>
    </div>
    @else
      @foreach($tanggapan as $tan)
      <div class="card my-4">
      <div class="card-header">
        <div class="d-flex justify-content-between">
    <p>Ditanggapi oleh. <u >{{ $tan->petugas->nama_petugas }}</u></p>
        <p class="text-end">Ditanggapi pada : {{ $tan->created_at->diffForHumans() }}</p>
      </div>
      </div>
    <div class="card-body mb-1">
    <p class="d-block">Isi Tanggapan : <span class="d-block">{{ $tan->tanggapan }}</span> </p>
    </div>
    </div>
    
    @endforeach
    @endif

  
  
</x-layouts>