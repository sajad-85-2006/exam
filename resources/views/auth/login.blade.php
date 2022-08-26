
@extends('auth')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input @error('email') is-invalid @enderror type="email" id="email" class="form-control"
                                       name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" @error('password') is-invalid @enderror class="form-control" name="password" required
                                       autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 loginbttm" style=" margin-top: 70px">
                                <div class="col-lg-7 login-btm login-button">
                                    <button type="submit" class=" btn-outline">LOGIN</button>
                                    <a  style="text-decoration: none;color: white"  href="/register">
                                        <button type="button" class="btn-outline">GO TO SING UP</button>
                                    </a>
                                </div>
                                <div class="col-lg-5 login-btm login-text">
                                    <!-- Error Message -->

                                    @if (Route::has('password.request'))
                                        <a style="float: left" class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>





@endsection
