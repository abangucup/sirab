@extends('errors.layouts.app')

@section('title', '401')

@section('content')
<div class="card-header bg-transparent border-0">
    <h2 class="error-code text-center mb-2 white">401</h2>
    <h3 class="text-uppercase text-center white">
        Error - Unauthorized Access.
    </h3>
</div>
<div class="card-content">
    <div class="row py-2 text-center">
        <div class="col-12">
            <a href="{{ route('login') }}" class="btn btn-white danger box-shadow-4"><i class="ft-home"></i> Back to
                Home</a>
        </div>
    </div>
</div>

@endsection