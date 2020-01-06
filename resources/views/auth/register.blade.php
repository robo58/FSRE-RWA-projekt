@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('register') }}">
                        @csrf

                    <div class="form-group row">

                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                             name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name" autofocus>

                             @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                 name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autocomplete="last_name">
                            
                                 @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                            

                        <div class="form-group row">

                            <div class="col-md-6">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input type="text" class="form-control"input id="username" name="username" placeholder="Username">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                     @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                            <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror"
                             name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                             </div>
                         </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Password"class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-sm-6">
                                <input id="password-confirm" placeholder="Confirm Password"type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
