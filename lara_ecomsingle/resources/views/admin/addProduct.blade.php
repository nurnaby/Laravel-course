@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">page/</span> Add Product </h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
                    <small class="text-muted float-end">Input information</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('StorProduct') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_name">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    placeholder="Product Name" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="price">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="product Price" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="quantity">Product Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="product Quantity" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_long_des">Product Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_long_des" rows="3" name="product_long_des"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_short_des">Product short Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="product_short_des" rows="3" name="product_short_des"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_categroy_id">Select Category</label>
                            <div class="col-sm-10">
                                <select id="product_categroy_id" name="product_categroy_id"
                                    class="form-select form-select-lg">
                                    <option>Category select</option>
                                    @foreach ($categoris as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_subcategory_id">Select Sub Category</label>
                            <div class="col-sm-10">
                                <select id="product_subcategory_id" name="product_subcategory_id"
                                    class="form-select form-select-lg">
                                    <option>Sub category select</option>
                                    @foreach ($subcategoris as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="product_img">Product Images</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="product_img" name="product_img" />
                            </div>
                        </div>



                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
