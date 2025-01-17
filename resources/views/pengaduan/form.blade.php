<x-layouts>
  <x-slot:loginAs>{{ $loginAs }}</x-slot>
  <h3 class="text-center my-4">Silahkan Tulis Laporan Pengaduan</h3>
  <div class="row justify-content-center">
    <div class=" col-sm-12 col-md-8">
      <div class="card p-5">
          <form action="/pengaduan" method="post" enctype="multipart/form-data">
            @csrf
          <div class="mb-3" >
              <label  class="form-label">Isi laporan:</label>
              <textarea name="isi_laporan" id="" cols="10" rows="5" class="form-control @error('isi_laporan') is-invalid @enderror" >{{ old('isi_laporan') }}</textarea>
              @error('isi_laporan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Foto:</label>
              <input type="file" class="form-control @error('foto') is-invalid @enderror"  name="foto">
              @error('foto')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <button type="submit" class="btn btn-success">Kirim laporan</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</x-layouts>