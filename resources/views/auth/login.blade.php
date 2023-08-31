@extends('frontend.layout.app_plain')
@section('title','User Login')
@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card auth-form">
                

                <div class="card-body">
                    <h3 class="text-center">User Login</h3>
                    <p class="text-center">Fill the form to login</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group mt-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <!-- <button class="btn btn-success btn-block my-2">Login</button>    -->
                        
                        <div class="d-grid gap-2 my-5">
                            <button class="btn btn-theme" type="submit">Login</button>
                            
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{route('register')}}">Don't have an account?</a>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
