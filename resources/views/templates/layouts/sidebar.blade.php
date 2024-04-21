<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true"
  data-img="{{ asset('assets/images/backgrounds/02.jpg') }}">
  <div class="navbar-header d-flex justify-content-center bg-gradient-x-purple-blue">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand text-white" href="{{ route('dashboard.'.$user->role->level_role) }}">
          <img class="brand-logo" alt="Chameleon admin logo"
            src="{{ asset('assets/images/logo/png/logo_kesehatan.png') }}" />
          <span class="brand-text">Pelaporan Rabies</span>
        </a>
      </li>
      <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
    </ul>
  </div>
  <div class="navbar-header d-flex justify-content-center bg-gradient-x-purple-blue">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
        <a class="navbar-brand text-white" href="{{ route('dashboard.'.$user->role->level_role) }}">
          <i class="ft-user"></i>
          <span class="menu-title">{{ $user->role->level_role }}</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="navigation-background"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="{{ Request::is('*/dashboard') ? 'open' : '' }} nav-item"><a
          href="{{ route('dashboard.'.$user->role->level_role) }}"><i class="ft-airplay"></i><span class="menu-title"
            data-i18n="">Dashboard</span></a>
      </li>

      {{-- JADWAL --}}
      <li class="{{ Request::is('jadwal') ? 'open' : '' }} nav-item"><a href="{{ route('jadwal.index') }}"><i
            class="ft-calendar"></i><span class="menu-title" data-i18n="">Jadwal Pelayanan</span></a>
      </li>

      {{-- PASIEN --}}
      <li class="{{ Request::is('pasien') ? 'open' : '' }} nav-item"><a href="{{ route('pasien.index') }}">
          <i class="ft-users"></i>
          <span class="menu-title" data-i18n="">Pasien</span></a>
      </li>

      {{-- Pengaduan --}}
      <li class="{{ Request::is('pengaduan') ? 'open' : '' }} nav-item"><a href="{{ route('pengaduan.index') }}">
          <i class="ft-message-square"></i><span class="menu-title" data-i18n="">Pengaduan</span></a>
      </li>

      {{-- IMUNISASI --}}
      <li class="nav-item has-sub"><a href="#"><i class="ft-map"></i><span class="menu-title"
            data-i18n="">Imunisasi</span></a>
        <ul class="menu-content" style="">
          <li class="is-shown {{ Request::is('*/wilayah/provinsi') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('provinsi.index') }}">Provinsi</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kabkot') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kabkot.index') }}">Kabupaten</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kecamatan') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kecamatan.index') }}">Kecamatan</a>
          </li>
        </ul>
      </li>

      {{-- LAPORAN --}}
      <li class="nav-item has-sub"><a href="#"><i class="ft-map"></i><span class="menu-title"
            data-i18n="">Laporan</span></a>
        <ul class="menu-content" style="">
          <li class="is-shown {{ Request::is('*/wilayah/provinsi') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('provinsi.index') }}">Provinsi</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kabkot') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kabkot.index') }}">Kabupaten</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kecamatan') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kecamatan.index') }}">Kecamatan</a>
          </li>
        </ul>
      </li>

      {{-- Role Admin --}}
      @if ($user->role->level_role === 'super_admin')
      <li class="nav-item has-sub"><a href="#"><i class="ft-map"></i><span class="menu-title"
            data-i18n="">Wilayah</span></a>
        <ul class="menu-content" style="">
          <li class="is-shown {{ Request::is('*/wilayah/provinsi') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('provinsi.index') }}">Provinsi</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kabkot') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kabkot.index') }}">Kabupaten</a>
          </li>
          <li class="is-shown {{ Request::is('*/wilayah/kecamatan') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('kecamatan.index') }}">Kecamatan</a>
          </li>
        </ul>
      </li>
      <li class="{{ Request::is('*/instansi') ? 'open' : '' }} nav-item"><a href="{{ route('instansi.index') }}"><i
            class="ft-briefcase"></i><span class="menu-title" data-i18n="">Instansi</span></a>
      </li>
      @endif
      <li class="nav-item has-sub"><a href="#"><i class="ft-user"></i><span class="menu-title" data-i18n="">Pengguna
            Sistem</span></a>
        <ul class="menu-content" style="">
          <li class="is-shown {{ Request::is('petugas') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('petugas.index') }}">Petugas</a>
          </li>
          @if ($user->role->level_role == 'super_admin')
          <li class="is-shown {{ Request::is('*/pengguna') ? 'active' : '' }}">
            <a class="menu-item" href="{{ route('pengguna.index') }}">User</a>
          </li>
          @endif
        </ul>
      </li>

      <li class="nav-item"><a href="{{ route('home') }}"><i class="ft-home"></i><span class="menu-title"
            data-i18n="">Home</span></a>
      </li>

    </ul>
  </div>
</div>
<!-- END: Main Menu-->