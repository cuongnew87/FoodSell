@extends('master')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="source\image\home\bg-td-top-pc.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @include('page.MenuDoc')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    @foreach ($loaisanpham as $loaisanpham )
                    <div class="col-sm-12">
                        <h2 class="title text-center">{{$loaisanpham->name}}</h2>
                    </div>
                    @foreach ($loaisanpham->product as $product )


                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="source/image/product/{{$product->image}}" alt="" />
                                        @if($product->promotion_price != 0 && $product->unit_price > $product->promotion_price)
                                        <h2>{{number_format($product->promotion_price)}}.đ</h2>

                                        @else
                                        <h2>{{number_format($product->unit_price)}}.đ</h2>
                                        @endif
                                        <p>{{$product->name}}</p>
                                        <a href="chi-tiet-sp/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        @if($product->promotion_price != 0 && $product->unit_price > $product->promotion_price)
                                        <h2>{{number_format($product->promotion_price)}}.đ</h2>
                                        <p><del>{{number_format($product->unit_price)}}.đ</del></p>
                                        @else
                                        <h2>{{number_format($product->unit_price)}}.đ</h2>
                                        @endif
                                            <p>{{$product->name}}</p>
                                            <a href="chi-tiet-sp/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                        </div>
                                    </div>
                                    @if($product->promotion_price != 0)
                                    <img src="source/images/home/sale.png" class="new" alt="" />
                                    @endif
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endforeach



                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection
