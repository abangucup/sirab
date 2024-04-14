@extends('errors.layouts.app')

@section('title', 'Maintenance')

@section('content')
<div class="card-header border-0 white">
    <div class="text-center mb-1">
        <img src="{{ asset('assets/images/logo/ico/logo_p2pl.ico') }}" alt="branding logo">
    </div>
    <div class="font-large-1  text-center">
        Halaman ini sedang dalam perbaikan
    </div>
</div>
<div class="card-body text-center pt-0 white">
    <p>Kami minta maaf atas ketidaknyamannya
        <br> Mohon kembali lagi setelah diperbaiki.
    </p>
    <div class="mt-2">
        <i class="la la-cog spinner font-large-2 white"></i>
    </div>
</div>
{{--
<hr> --}}
@endsection