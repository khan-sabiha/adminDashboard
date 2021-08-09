@extends('layouts.app')

@section('content')


<div class="card-header text-center">
    <a href="{{ url('/') }}" class="h1">Sign In</a>
</div>
<div class="card-body">

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <div class="input-group">

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-block">
                {{ __('Login ') }}<i class="fas fa-sign-in-alt"></i>
            </button>
        </div>
        <div class="form-group">
            @if (Route::has('password.request'))
            <p class="text-center">
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </p>
            @endif
        </div>
        <div class="form-group">
            <p class="text-center">Not a member?
                @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}
                </a>
            </p>
            @endif
        </div>
    </form>
</div>


@endsection