@extends('admin.layouts.template')
@section('page_title')
    Add category -ecom
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Add Category </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Category</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('storeCategory') }}">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="category_Name">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="category_Name" name="category_Name"
                                    placeholder="Electronice" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
