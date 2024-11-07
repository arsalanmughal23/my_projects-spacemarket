@extends('layouts.guest.app')

@section('content')
    <div>
        <p class="login-box-msg">Sign in to start your session</p>

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

        <form method="post" action="{{ route('login') }}">
            @csrf

            <div class="input-group mb-3">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                <div class="input-group-append">
                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                </div>
                @error('email')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror

            </div>

            <div class="row">
                <div class="col-8 align-content-center">
                    <!-- <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">Remember Me</label>
                    </div> -->
                    
                    <p class="mb-1">
                        <a href="{{ route('password.request') }}">I forgot my password</a>
                    </p>
                </div>

                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>

            </div>
        </form>

        <!-- <p class="mb-1">
            <a href="{{ route('password.request') }}">I forgot my password</a>
        </p> -->
    </div>
@endsection