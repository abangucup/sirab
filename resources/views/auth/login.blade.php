@extends('errors.layouts.app')

@section('title', 'Login')

@section('content')
<div class="card border-grey mb-2">
    <div class="card-header border-0">
        <div class="text-center">
            {{-- <img src="{{ asset('assets/images/logo/ico/logo_kota.ico') }}" style="width: 25%" alt="branding logo">
            <img src="{{ asset('assets/images/logo/ico/logo_p2pl.ico') }}" style="width: 25%" alt="branding logo"> --}}
            <img src="{{ asset('assets/images/logo/png/logo_kesehatan.png') }}" style="width: 25%" alt="branding logo">
        </div>
        <div class="font-large-1  text-center">
            Halaman Login
        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label for="username">Username</label>
                <fieldset class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username"
                        required>
                    <div class="form-control-position">
                        <i class="ft-user"></i>
                    </div>
                </fieldset>
                <label for="inputPassword">Password</label>
                <fieldset class="form-group position-relative has-icon-left">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Masukan Password"
                        name="password" required>
                    <div class="form-control-position">
                        <i class="ft-lock"></i>
                    </div>
                    <div class="form-control-show-password" id="showPassword">
                        <i class="ft-eye"></i>
                    </div>
                </fieldset>
                {{-- <div class="form-group row">
                    <div class="col-md-6 col-12 text-center text-sm-left">

                    </div>
                    <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html"
                            class="card-link">Lupa Password?</a></div>
                </div> --}}
                <div class="form-group text-center">
                    <button type="submit"
                        class="btn btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('style')
<style>
    .form-control-show-password {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        padding-right: 10px;
    }
</style>
@endpush

@push('script')
<script>
    $(document).ready(function() {
        $('#showPassword').click(function() {
            const passwordInput = $('#inputPassword');
            const passwordFieldType = passwordInput.attr('type');

            if (passwordFieldType === 'password') {
                passwordInput.attr('type', 'text');
                $('#showPassword i').removeClass('ft-eye').addClass('ft-eye-off');
            } else {
                passwordInput.attr('type', 'password');
                $('#showPassword i').removeClass('ft-eye-off').addClass('ft-eye');
            }
        });
    });
</script>
@endpush