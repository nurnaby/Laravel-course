@extends('user.layouts.templete')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4 box_main">
                <div class="tshirt_img"><img src="{{ asset($products->product_img) }}"></div>

            </div>
            <div class="col-8 box_main">
                <div class="">
                    <h4 class="shirt_text text-left">{{ $products->product_name }}</h4>
                    <p class="price_text text-left">Price <span style="color: #262626;">{{ $products->price }}</span></p>
                </div>
                <div class="my-3 product-details">
                    <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad vel nulla doloremque
                        inventore maiores saepe facilis in pariatur aliquid possimus?</p>
                    <ul class="p-2 bg-light">
                        <li>{{ $products->product_category_name }}</li>
                        <li>{{ $products->product_subcategory_name }}</li>
                        <li>{{ $products->quantity }}</li>
                    </ul>
                </div>
                <div class="btn_main">
                    <div class="btn btn-warning"><a href="#">Add To Cart</a></div>

                </div>
            </div>
        </div>

    </div>
    {{-- Related product  --}}
    <div class="container">
        <h1 class="fashion_taital">Related Product</h1>
        <div class="fashion_section_2">
            <div class="row">
                @foreach ($related_products as $product)
                    <div class="col-lg-4 col-sm-4">
                        <div class="box_main">
                            <h4 class="shirt_text">{{ $product->product_name }}</h4>
                            <p class="price_text">Price <span style="color: #262626;">444</span></p>
                            <div class="tshirt_img"><img src="{{ asset($product->product_img) }}">
                            </div>
                            <div class="btn_main">
                                <div class="buy_bt"><a href="#">Buy Now</a></div>
                                <div class="seemore_bt"><a href="">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>
@endsection
