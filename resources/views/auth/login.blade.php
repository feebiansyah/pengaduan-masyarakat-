<x-auth.layouts>

  <h1 class="text-center">Halaman Login</h1>

  <div class="container">
    @if (Session::has('fail'))
    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <div class="alert alert-danger text-center">
          {!! Session::get('fail') !!}
        </div>
      </div>
    </div>
    @endif
    <div class="row justify-content-center">
      <div class="col-md-6 col-12">
        <div class="card p-4">
          <form method="post" action="/login">
            @csrf
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username">
              @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <p>
                belum punya akun? <a href="/register">registrasi disini!!</a>
              </p>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-auth.layouts>