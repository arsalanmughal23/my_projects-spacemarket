@extends('layouts.guest.app')

@section('content')
    <div>
        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="input-group mb-3">
                <input type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
        </p>

    </div>
@endsection