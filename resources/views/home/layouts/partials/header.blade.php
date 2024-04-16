<header class="header-section">
    <div class="overlay">
        <div class="container">
            <div class="row d-flex header-area">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo/png/logo_kesehatan.png') }}" width="50px" height="50px"
                            alt="logo">
                        <span class="h2 ms-3 mt-2">SIRAB</span>
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbar-content">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-content">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('list-jadwal-pelayanan') ? 'active' : '' }}" href="{{ route('list.jadwal') }}">Jadwal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('list-pengaduan') ? 'active' : '' }}" href="{{ route('list.pengaduan') }}">Pengaduan</a>
                            </li>
                        </ul>
                        @guest
                        <div class="right-area header-action d-flex align-items-center max-un">
                            <a href="{{ route('login') }}" class="cmn-btn">Login
                                <i class="icon-d-right-arrow-2"></i>
                            </a>
                        </div>
                        @endguest
                        @auth
                        <div class="right-area header-action d-flex align-items-center max-un">
                            <a href="{{ route('dashboard.'.$user->role->level_role) }}" class="cmn-btn">Dashboard
                                <i class="icon-d-right-arrow-2"></i>
                            </a>
                        </div>
                        @endauth

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>