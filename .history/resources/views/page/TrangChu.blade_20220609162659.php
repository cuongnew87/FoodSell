@extends('master')
@section('content')
<section>
    @include('page.slide')
    <div class="container">
        <div class="row">
            @include('page.MenuDoc')

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Sản Phẩm Mua Nhiều</h2>
                    <div>
                        @foreach ($product as $product )
                        <div class="col-sm-4 col-md-6" style="display:flex">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="source/image/product/{{$product->image}}" alt="" width="100%"/>
                                            @if($product->promotion_price != 0 && $product->unit_price > $product->promotion_price)
                                            <h2>{{number_format($product->promotion_price)}}.đ
                                            </h2>
                                            @else
                                            <h2>{{number_format($product->unit_price)}}.đ</h2>
                                            @endif
                                            <p>{{$product->name}}</p>
                                            @if($product->status == 0)
                                            <a href="chi-tiet-sp/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Hết hàng</a>
                                            @elseif($product->status == 1)
                                            <a href="chi-tiet-sp/{{$product->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Còn hàng</a>
                                            @endif
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
                    </div>
                </div><!--features_items-->
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Món Mới</h2>
                    @foreach ($product_new as $new )
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="source/image/product/{{$new->image}}" alt="" width="100%" />
                                        @if($new->promotion_price != 0 && $new->unit_price > $new->promotion_price)
                                        <h2>{{number_format($new->promotion_price)}}.đ
                                        </h2>
                                        @else
                                        <h2>{{number_format($new->unit_price)}}.đ</h2>
                                        @endif
                                        <p>{{$new->name}}</p>
                                        <a href="chi-tiet-sp/{{$new->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                        @if($new->promotion_price != 0 && $new->unit_price > $new->promotion_price)
                                        <h2>{{number_format($new->promotion_price)}}.đ</h2>
                                        <p><del>{{number_format($new->unit_price)}}.đ</del></p>
                                        @else
                                        <h2>{{number_format($new->unit_price)}}.đ</h2>
                                        @endif
                                            <p>{{$new->name}}</p>
                                            <a href="chi-tiet-sp/{{$new->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                        </div>
                                    </div>
                                    @if($new->new != 0)
                                    <img src="source/images/home/new.png" class="new" alt=""  />
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
                <div class="pagination">
                    {{$product_new->links()}}
                </div>




                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Có Thể Bạn Sẽ Thích</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach ($productRemain as $productRemain )
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="source/image/product/{{$productRemain->image}}" alt="" width="100%" />
                                                @if($productRemain->promotion_price != 0 && $productRemain->unit_price > $productRemain->promotion_price)
                                                <h2>{{number_format($productRemain->promotion_price)}}.đ</h2>
                                                @else
                                                <h2>{{number_format($productRemain->unit_price)}}.đ</h2>
                                                @endif
                                                <p>{{$productRemain->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                @if($productRemain->promotion_price != 0 && $productRemain->unit_price > $productRemain->promotion_price)
                                                <h2>{{number_format($productRemain->promotion_price)}}.đ</h2>
                                                <p><del>{{number_format($productRemain->unit_price)}}.đ</del></p>
                                                @else
                                                <h2>{{number_format($productRemain->unit_price)}}.đ</h2>
                                                @endif
                                                    <p>{{$productRemain->name}}</p>
                                                    <a href="chi-tiet-sp/{{$productRemain->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                                </div>
                                            </div>
                                            @if($productRemain->promotion_price != 0)
                                            <img src="source/images/home/sale.png" class="new" alt=""/>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach ($productRemain1 as $productRemain1 )
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="source/image/product/{{$productRemain1->image}}" alt="" width="100%"/>
                                                @if($productRemain1->promotion_price != 0 && $productRemain1->unit_price > $productRemain1->promotion_price)
                                                <h2>{{number_format($productRemain1->promotion_price)}}.đ</h2>
                                                @else
                                                <h2>{{number_format($productRemain1->unit_price)}}.đ</h2>
                                                @endif
                                                <p>{{$productRemain1->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                @if($productRemain1->promotion_price != 0 && $productRemain1->unit_price > $productRemain1->promotion_price)
                                                <h2>{{number_format($productRemain1->promotion_price)}}.đ</h2>
                                                <p><del>{{number_format($productRemain1->unit_price)}}.đ</del></p>
                                                @else
                                                <h2>{{number_format($productRemain1->unit_price)}}.đ</h2>
                                                @endif
                                                    <p>{{$productRemain1->name}}</p>
                                                    <a href="chi-tiet-sp/{{$productRemain1->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                                </div>
                                            </div>
                                            @if($productRemain1->promotion_price != 0)
                                            <img src="source/images/home/sale.png" class="new" alt="" />
                                            @endif
                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
@endsection
