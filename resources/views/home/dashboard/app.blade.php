<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('home.layouts.partials.style')
    @stack('style')
    
</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    @include('home.layouts.partials.header')
    <!-- header-section end -->

    <!-- Banner Section start -->
    @yield('banner')
    <!-- Banner Section end -->

    <!-- Dashboard start -->
    <section class="dashboard-section">
        <div class="overlay pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                        <div class="sidebar-single">
                            <div class="profile-img">
                                <img src="{{ $user->biodata->foto ?? asset('assets/home/images/author-profile.png') }}" alt="icon" height="160px" width="160px">
                            </div>
                            <h5>{{ $user->biodata->nama_lengkap }} <br><span class="badge bg-primary">{{ $user->biodata->pasien->nomor_register }}</span></h5>
                            <a href="{{ route('logout') }}" class="cmn-btn alt">Logout</a>
                        </div>
                        @include('home.dashboard.sidebar')
                        <div class="sidebar-single">
                            <div class="profile-img">
                                <img src="{{ asset('assets/home/images/icon/help-icon.png') }}" alt="icon">
                            </div>
                            <h5>Butuh Bantuan?</h5>
                            <p>Anda dapat langsung menghubungi petugas melalui whatsapp</p>
                            <a href="https://wa.me/6282154488769" target="_blank" class="cmn-btn mt-4">Chat</a>
    
                        </div>
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <!-- Dashboard end -->

    <!-- Footer Area Start -->
    @include('home.layouts.partials.footer')
    <!-- Footer Area End -->

    @include('home.layouts.partials.script')
    @stack('script')

</body>

</html>