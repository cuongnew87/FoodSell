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
                <div class="features_items">
                    <h2 class="title text-center">{{$product_type->name}}</h2>
                    @foreach ($product_type->product as $sanpham )
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="source/image/product/{{$sanpham->image}}" alt="" />
                                        @if($sanpham->promotion_price != 0 && $sanpham->unit_price > $sanpham->promotion_price)
                                        <h2>{{number_format($sanpham->promotion_price)}}.đ</h2>
                                        @else
                                        <h2>{{number_format($sanpham->unit_price)}}.đ</h2>
                                        @endif
                                        <p>{{$sanpham->name}}</p>
                                        <a href="chi-tiet-sp/{{$sanpham->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        @if($sanpham->promotion_price != 0 && $sanpham->unit_price > $sanpham->promotion_price)
                                        <h2>{{number_format($sanpham->promotion_price)}}.đ</h2>
                                        <p><del>{{number_format($sanpham->unit_price)}}.đ</del></p>
                                        @else
                                        <h2>{{number_format($sanpham->unit_price)}}.đ</h2>
                                        @endif
                                            <p>{{$sanpham->name}}</p>
                                            <a href="chi-tiet-sp/{{$sanpham->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                        </div>
                                    </div>
                                    @if($sanpham->promotion_price != 0)
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
                </div>
                <div class="features_items">
                    <h2 class="title text-center">Món Khác</h2>
                    @foreach ($sanphamkhac as $khac )
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="source/image/product/{{$khac->image}}" alt="" />
                                        @if($khac->promotion_price != 0 && $khac->unit_price > $khac->promotion_price)
                                        <h2>{{number_format($khac->promotion_price)}}.đ</h2>

                                        @else
                                        <h2>{{number_format($khac->unit_price)}}.đ</h2>
                                        @endif
                                        <p>{{$khac->name}}</p>
                                        <a href="chi-tiet-sp/{{$khac->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        @if($khac->promotion_price != 0 && $khac->unit_price > $khac->promotion_price)
                                        <h2>{{number_format($khac->promotion_price)}}.đ</h2>
                                        <p><del>{{number_format($khac->unit_price)}}.đ</del></p>
                                        @else
                                        <h2>{{number_format($khac->unit_price)}}.đ</h2>
                                        @endif
                                            <p>{{$khac->name}}</p>
                                            <a href="chi-tiet-sp/{{$khac->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                        </div>
                                    </div>
                                    @if($khac->promotion_price != 0)
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
                </div>
                <div class="pagination">
                    {{$sanphamkhac->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
