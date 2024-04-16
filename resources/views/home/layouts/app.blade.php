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
    @yield('content')
    <!-- Dashboard end -->

    <!-- Footer Area Start -->
    @include('home.layouts.partials.footer')
    <!-- Footer Area End -->

    @include('home.layouts.partials.script')
    @stack('script')

</body>

</html>