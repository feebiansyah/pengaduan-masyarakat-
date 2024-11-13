<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
   <?php
   foreach($all_data as $d)
   if($d->status == 0){
    $d->status = "belum ditanggapi";
    
  }
  ?>
  <h1 class="text-center my-4">Daftar Riwayat Pengaduan</h1>
   @if (Session::has('success'))
    <div class="row justify-content-center">
      <div class="col-sm-12">
        <div class="alert alert-success text-center">
          {!! Session::get('success') !!}
        </div>
      </div>
    </div>
    @endif
  <div class="row">
    <div class="col-sm-12 ">
      <h5 class="mb-3 ">Riwayat laporan dari <b>{{
      $nama_masyarakat }}</b></h5><hr/>
      @if($all_data->isEmpty())
        <h4 class="text-center text-danger ">
         Anda belum membuat laporan pengaduan!!
        </h4>
      @else
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Status</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all_data as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td><img src="{{ asset($data->foto) }}" width="100px" alt=""></td>
              <td>{{ $data->status }}</td>
              <td><a class="btn btn-sm btn-info " href="/riwayat/detail/{{ $data->id }}">detail</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
        
    </div>
  </div>
</x-layouts>