<div class="sidebar-single">
    <ul>
        <li>
            <a href="{{ route('dashboard.pasien') }}" class="{{ Request::is('dashboard/pasien') ? 'active' : ''}}">
                <img src="{{ asset('assets/home/images/icon/dashboard-menu-1.png') }}" class="max-un" alt="icon">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('pengaduan.saya') }}" class="{{ Request::is('dashboard/pengaduan-saya') ? 'active' : '' }}">
                <img src="{{ asset('assets/home/images/icon/dashboard-menu-4.png') }}" class="max-un" alt="icon">
                Pengaduan Saya
            </a>
        </li>
        <li>
            <a href="dashboard-personal-info.html">
                <img src="{{ asset('assets/home/images/icon/dashboard-menu-3.png') }}" class="max-un" alt="icon">
                Personal Information
            </a>
        </li>
        <li>
            <a href="dashboard-password.html">
                <img src="{{ asset('assets/home/images/icon/dashboard-menu-6.png') }}" class="max-un" alt="icon">
                Change password
            </a>
        </li>
    </ul>
</div>