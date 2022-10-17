@extends('admin.layout.default')
@section('title', 'user crate')
@section('content')
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Users updadte</h5>

            <div class="panel-body mt-5">
                <form class="form-horizontal" action="{{ url('users/edit', $userInfo->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <fieldset class="content-group mt-10">

                        <div class="form-group mt-10">
                            <label class="control-label col-lg-2" for="userName">User Name</label>
                            <div class="col-lg-10">
                                <input type="text" id="userName" class="form-control" name="name"
                                    value="{{ $userInfo->name }}">
                            </div>
                        </div>
                        <div class="form-group mt-10">
                            <label class="control-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type="email" id="email" class="form-control"
                                    name="email"value="{{ $userInfo->email }}">
                            </div>
                        </div>
                        <div class="form-group mt-10">
                            <label class="control-label col-lg-2" for="password">Password</label>
                            <div class="col-lg-10">
                                <input type="password" id="password" class="form-control" name="password"
                                    value="{{ $userInfo->password }}">
                            </div>
                        </div>





                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" name="saveBanner">Submit</button>
                        <a href="{{ url('users') }}" class="btn btn-default ml-5">Back to List</a>
                    </div>
                </form>
            </div>
            <div class="heading-elements">

            </div>
        </div>
        <hr>


    </div>
@endsection
