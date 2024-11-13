<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
  @php 
  if($pengaduan->status == 0){
    $pengaduan->status = "pendding";
    $color = "badge badge-danger";
  }
  @endphp
  <h1 class="text-center my-4">Detail Pengaduan </h1>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between">
        <p>Dari. <span class="text-primary">{{ $pengaduan->masyarakat->nama_lengkap }}</span></p>
        
        <p class="text-end">Dibuat pada : {{ $pengaduan->created_at->diffForHumans() }}</p>
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
      <p class="text-center">Status : <span class="">{{ $pengaduan->status }}</span></p>
      <div class="col-8 mx-auto">
        <img class="mb-3 rounded mx-auto d-block img-thumbnail "
        width="250px"src="{{ asset($pengaduan->foto) }}" alt="">
      </div>
      <hr>
        <p>Isi Laporan : {{ $pengaduan->isi_laporan }}</p>
        <hr>
        <div class="d-flex">
          <a href="/petugas/tanggapan">&laquo; kembali</a>
        </div>
    </div>
  </div>   
  
    <h3 class="text-center mt-3">Tanggapan Pengaduan </h3>
    <hr>
  
    
    @if($tanggapan->isEmpty())
    <div class="card">
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
    <div class="card-body mb-3">
    <p>Isi Tanggapan : {{ $tan->tanggapan }} </p>
    </div>
    </div>
    
    @endforeach
    @endif
  <hr class="my-3">
  <div class="card">
    <div class="card-header">
      <h3>Form Tanggapan</h3>
    </div>
    <div class="card-body">
      <form action="/petugas/tanggapan/{{$pengaduan->id}}" method="post">
        @csrf
         <div class="mb-3">
           <label for="" class="form-label">Isi Tanggapan : </label>
           <textarea class="form-control @error('tanggapan') is-invalid @enderror" name="tanggapan" id="" cols="15" rows="5"></textarea>
            @error('tanggapan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
         </div>
         <div class="mb-3">
           <label for="" class="form-label">Status Pengaduan : </label>
           <select name="status" id="" class="form-control form-select
           @error('status') is-invalid @enderror">
            @if($pengaduan->status == 0)
             <option value="0" selected >pendding</option>
             <option value="proses">proses</option>
             <option value="selesai">selesai</option>
             @elseif($pengaduan->status == 'proses')
             <option value="0" >pendding</option>
             <option value="proses" selected>proses</option>
             <option value="selesai">selesai</option>
             @else
              <option value="0" >pendding</option>
             <option value="proses" >proses</option>
             <option selected value="selesai">selesai</option>
             @endif
           </select>
           
           @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
         </div>
         <div class="mb-1">
           <button type="submit" class="btn btn-success">Kirim</button>
         </div>
      </form>
    </div>
  </div>

  
  
</x-layouts>