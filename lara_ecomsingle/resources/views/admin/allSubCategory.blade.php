@extends('admin.layouts.template')
@section('page_title')
    All Sub category -ecom
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Sub Category </h4>
        <div class="card">
            <h5 class="card-header">Available SubCategory Information</h5>
            <div class="container">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Sub Category Name</th>
                            <th> Category Name</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($subcategoris as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>100</td>
                                <td>
                                    <a href="{{ route('editSubcategry', $subcategory->id) }}"
                                        class="btn btn-primary">Edit</a>

                                    {{-- <a href="{{ route('deleteSubcategry', $subcategory->id) }}"
                                        class="btn btn-warning data-delete" data-type="html">Delete</a> --}}

                                    <a href="{{ route('deleteSubcategry', $subcategory->id) }}"
                                        class="btn btn-warning data-delete " data-type="html">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
