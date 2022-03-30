<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="/">My Point Siswa</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Home" ? 'active' : '') }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link {{ ($title === "Tentang" ? 'active' : '') }}" href="/tentang">Tentang</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Kontak" ? 'active' : '') }}" href="/kontak">Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link">|</a>
          </li>
          @if (Route::has('login'))
                    @auth
                        @role('admin')
                        <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        @endrole
                        @role('pelapor')
                        <li class="nav-item">
                        <a href="{{ url('pelapor/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        @endrole
                        @role('siswa')
                        <li class="nav-item">
                        <a href="{{ url('siswa/dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        @endrole
                    @else
                        <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                            <a href="{{ url('register-siswa') }}" class="nav-link">Register</a>
                            </li>
                        @endif
                    @endauth
            @endif
        </ul>
      </div>
    </div>
  </nav>