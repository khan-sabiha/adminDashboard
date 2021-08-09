@extends('layouts.app')

@section('content')


<div class="card-header text-center">
    <a href="{{ url('/') }}" class="h1">Sign Up</a>
</div>
<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="input-group mb-3">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name" > 
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="input-group mb-3">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                placeholder="Phone / +966" value="{{ old('phone') }}" required autocomplete="phone" autofocus pattern="^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Email Address / email@gmail.com" name="email" value="{{ old('email') }}" required autocomplete="email">
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
        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="Password">
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

        <div class="input-group mb-3">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password" placeholder="Confirm Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

        <div class="form-group">
            
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Register ') }} <i class="fas fa-user-plus "></i>
                </button>
        </div>
    </form>
</div>
@endsection