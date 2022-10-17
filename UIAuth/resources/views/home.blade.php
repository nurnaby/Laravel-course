@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <div class="text-center p-5">
                    <div style="border-bottom: 1px solid #dddddd;">
                        <span style="font-size: 18px;">Hi! <strong style="font-size: 24px; letter-spacing: 2px;">
                                {{ Auth::user()->name }}
                            </strong></span>
                    </div>
                    <h6>Welcome to Admin Panel</h6>
                </div>
            </div>
        </div>
        <!-- /basic datatable -->


        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
