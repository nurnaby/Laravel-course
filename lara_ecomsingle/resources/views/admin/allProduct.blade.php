@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> All Product </h4>
        <div class="card">

            <h5 class="card-header">Available Product Information</h5>
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
                            <th>Product Name</th>
                            <th> Images</th>
                            <th>Product price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img style="width:100px" src="{{ asset($product->product_img) }}" alt="">
                                    <br>
                                    <a href="" class="btn btn-primary my-2">Update Image</a>
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('editProduct', $product->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-warning">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
