@extends('layouts.app')
@section('content')
    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                    <!-- Simple login form -->
                    <form method="POST" action="">
                        @csrf
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                                </div>
                                <h5 class="content-group">Login to your account <small class="display-block">Enter your
                                        credentials below</small></h5>
                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="Enter yours Email " required
                                    autocomplete="email" autofocus>
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>

                            </div>
                            <div class="form-group has-feedback has-feedback-left">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="Enter yours Password " required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Log in" class="btn btn-primary btn-block">
                            </div>
                            <div class="text-center">
                                <a href="login_password_recover.php">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                    <!-- /simple login form -->


                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
@endsection
