@extends('user.layouts.templete')
@section('content')
    {{-- <h2>{{ $category->category_name }}</h2> --}}
    <h2>{{ $category->product_count }}</h2>
    <div class="container">
        {{-- <h1 class="fashion_taital">{{ $category->category_name }}</h1> --}}
        <div class="fashion_section_2">
            <div class="row">
                @if (!empty($products))
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                <p class="price_text">Price <span style="color: #262626;">{{ $product->price }}</span></p>
                                <div class="tshirt_img"><img src="{{ asset($product->product_img) }}">
                                </div>
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h2>{{ $category->category_name }}</h2>
                @endif


            </div>

        </div>

    </div>
@endsection
