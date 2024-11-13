<nav class="navbar navbar-expand-lg navbar-dark bg-dark" witdh="100%">
  <div class="container">
    <a class="navbar-brand" href="/">Sebagai : {{ $slot }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      @if(Auth::check() && Auth::user()->nik)
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('pengaduan') ? 'active' : '' }}" href="/pengaduan">Tulis laporan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('riwayat') ? 'active' : '' }} " href="/riwayat">Riwayat laporan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      @elseif(Auth::check() && Auth::user()->level == 'admin')
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('home') ? 'active' : '' }}"
          aria-current="page" href="/petugas">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('riwayat') ? 'active' : ''
          }} " href="/petugas/tambah-petugas">Tambah petugas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      @elseif(Auth::check() && Auth::user()->level == 'petugas')
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('home') ? 'active' : '' }}"
          aria-current="page" href="/petugas">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('pengaduan') ? 'active' : ''
          }}" href="/petugas/tanggapan">Tulis Tangapan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{  request()->routeIs('riwayat') ? 'active' : ''
          }} " href="/petugas/laporan">Cetak Laporan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
      </ul>
      @endif
    </div>
  </div>
</nav>