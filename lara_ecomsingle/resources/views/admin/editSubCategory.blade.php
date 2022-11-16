@extends('admin.layouts.template')
@section('page_title')
    Edit Subcategory -ecom
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Edit Sub Category </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit SubCategory</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{ route('UpdateSubCategory') }}">
                        @csrf
                        <input type="hidden" value="{{ $subcategory_info->id }}" name="subcategory_id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="sub_category_Name">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="sub_category_Name" name="subcategory_name"
                                    value="{{ $subcategory_info->subcategory_name }}" />
                            </div>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add SubCategory</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
