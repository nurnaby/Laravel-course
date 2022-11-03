<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('admin/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('admin/assets/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>

<body>


    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">

                    @yield('content')

                    <!-- Footer -->
                    <div class="footer text-muted lfwf-footer">
                        &copy; {{ date('Y') }}. <a href="#">Developed</a> by <a href="#"
                            target="_blank">DevsSquad IT Solutions</a>
                    </div>
                    <!-- /footer -->
                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->




    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {{-- {!! Toastr::message() !!} --}}
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('admin/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    {{-- bootbox modal --}}
    <script type="text/javascript" src="{{ asset('admin/assets/bootbox/bootbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/bootbox/bootbox.locales.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->



    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('admin/assets/js/plugins/tables/datatables/datatables.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/custom_frame.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ session('success') }}")
        @endif
    </script>
    <!-- /theme JS files -->

    @stack('javascript')
</body>

</html>
