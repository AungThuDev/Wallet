@extends('.frontend.layout.app_plain')

@section('content')


<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div class="card auth-form">
                

                <div class="card-body">
                    <h3 class="text-center">User Register</h3>
                    <p class="text-center text-muted">Fill the form to register</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
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
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
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
                        <div class="form-group mt-4">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="d-grid gap-2 my-3">
                            <button class="btn btn-success" type="submit">Register</button>
                            
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{route('login')}}">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
