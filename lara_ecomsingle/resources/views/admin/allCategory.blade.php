@extends('admin.layouts.template')
@section('page_title')
    All category -ecom
@endsection
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Category </h4>
        <div class="card">
            <h5 class="card-header">Available Category Information</h5>

            <div class="table-responsive text-nowrap">
                <div class="container">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                </div>

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Sub Category Count</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->subcategory_count }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('editCategory', $category->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteCategory', $category->id) }}"
                                        class="btn btn-warning data-delete " data-type="html">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <div class="row p-3">
                <div class="col-7 ">
                    showing {{ $categories->firstItem() }} - {{ $categories->lastPage() }} of {{ $categories->total() }}
                </div>
                <div class="col-5 ">
                    <div class="btn-group float-end">

                        {{ $categories->links() }}
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
