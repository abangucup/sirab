<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="collapse navbar-collapse show" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item mobile-menu d-md-none mr-auto"><a
                            class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="{{ route('dashboard.'.$user->role->level_role) }}" data-toggle="dropdown"> 
                            {{-- <span
                                class="avatar avatar-online"> --}}
                                <img class="bg-white rounded-circle" width="50px" height="50px"
                                    src="{{ $user->biodata->foto != null ? asset($user->biodata->foto) : ($user->biodata->jenis_kelamin == 'p' ? asset('assets/images/logo/svg/female.svg') : asset('assets/images/logo/svg/male.svg')) }}"
                                    alt="avatar">
                                {{-- </span> --}}
                            </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="arrow_box_right" style="width: 300px">
                                <a class="dropdown-item" href="{{ route('dashboard.'.$user->role->level_role) }}">
                                    {{-- <span class="avatar avatar-online"> --}}
                                        <img class="bg-white rounded-circle" width="50px" height="50px"
                                            src="{{ $user->biodata->foto != null ? asset($user->biodata->foto) : ($user->biodata->jenis_kelamin == 'p' ? asset('assets/images/logo/svg/female.svg') : asset('assets/images/logo/svg/male.svg')) }}"
                                            alt="avatar">
                                        <span class="user-name text-bold-700 ml-1">{{ $user->biodata->nama_lengkap
                                            }}</span>
                                    {{-- </span> --}}
                                </a>

                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="{{ route('logout') }}"><i class="ft-power"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->