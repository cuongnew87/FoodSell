@extends('master')
@section('content')
<section>
    @include('page.slide')
    <div class="container">
        <div class="row">
            @include('page.MenuDoc')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Tìm Thấy : {{count($product_search)}} Món</h2>
                    @foreach ($product_search as $search )
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="source/image/product/{{$search->image}}" alt="" width="100%"/>
                                        @if($search->promotion_price != 0 && $search->unit_price > $search->promotion_price)
                                        <h2>{{number_format($search->promotion_price)}}.đ
                                        </h2>
                                        @else
                                        <h2>{{number_format($search->unit_price)}}.đ</h2>
                                        @endif
                                        <p>{{$search->name}}</p>
                                        <a href="chi-tiet-sp/{{$search->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        @if($search->promotion_price != 0 && $search->unit_price > $search->promotion_price)
                                        <h2>{{number_format($search->promotion_price)}}.đ</h2>
                                        <p><del>{{number_format($search->unit_price)}}.đ</del></p>
                                        @else
                                        <h2>{{number_format($search->unit_price)}}.đ</h2>
                                        @endif
                                            <p>{{$search->name}}</p>
                                            <a href="chi-tiet-sp/{{$search->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                                        </div>
                                    </div>
                                    @if($search->promotion_price != 0)
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
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection
