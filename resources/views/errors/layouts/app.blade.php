<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    @include('errors.layouts.style')
    @stack('style')

</head>

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  bg-gradient-directional-danger blank-page blank-page"
    data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">

    @include('sweetalert::alert')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container bg-hexagons-danger">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-6 col-10 p-0">
                            @yield('content')

                            @include('errors.layouts.footer')
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('errors.layouts.script')
    @stack('script')

</body>
<!-- END: Body-->

</html>