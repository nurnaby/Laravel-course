@extends('layouts.app')

@section('content')
    <!-- Advanced login -->
    <form method="POST" action="">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Login to your account<small class="display-block">Your credentials</small></h5>
            </div>


            <div class="form-group has-feedback has-feedback-left">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
                @error('email')
                    <strong style="color:red;">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" placeholder="Password">
                <div class="form-control-feedback">
                    <i class="icon-lock2 text-muted"></i>
                </div>
                @error('password')
                    <strong style="color:red;">{{ $message }}</strong>
                @enderror
            </div>

            <div class="form-group login-options">
                <div class="row">
                    <div class="col-sm-6">
                        <label class="checkbox-inline">
                            <input type="checkbox" class="styled" checked="checked" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            Remember
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                    @endif

                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">Login <i
                        class="icon-arrow-right14 position-right"></i></button>
                <div class="text-right">
                    <a href="{{ route('register') }}">Register Now</a>
                </div>

            </div>

        </div>
    </form>
    <!-- /advanced login -->
@endsection
