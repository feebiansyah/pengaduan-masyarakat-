<x-auth.layouts>

  <h1 class="text-center mb-3">Halaman Registrasi</h1>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-sm-12">
        <div class="card p-4">
          <form method="post" action="/register">
            @csrf
            <div class="mb-3">
              <label class="form-label">NIK :</label>
              <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{old('nik')}}">
              @error('nik')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Nama Lengkap :</label>
              <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{old('nama_lengkap')}}">
              @error('nama_lengkap')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Username :</label>
              <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{old('username')}}">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Password :</label>
              <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">No Telpon :</label>
              <input type="number" class="form-control  @error('no_telp') is-invalid @enderror" name="no_telp" value="{{old('no_telp')}}">
              @error('no_telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <p>sudah punya akun? <a href="/login">login disini!!</a></p>
            </div>
            
            <button type="submit" class="btn btn-primary">Registrasi</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-auth.layouts>