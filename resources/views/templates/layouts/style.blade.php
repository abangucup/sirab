<link rel="shortcut icon" type="image/x-icon"
    href="{{ $user->instansi->status == 'puskesmas' ? asset('assets/images/logo/ico/logo_puskesmas.ico') : asset('assets/images/logo/ico/logo_kota.ico') }}">
<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
    rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/toggle/switchery.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins/forms/switch.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-switch.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/chartist.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/charts/chartist-plugin-tooltip.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.min.css') }}">
<!-- END: Theme CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-gradient.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-gradient.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/chat-application.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/dashboard-analytics.min.css') }}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<!-- END: Custom CSS-->

{{-- DATA TABLES --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}" />
{{-- END --}}