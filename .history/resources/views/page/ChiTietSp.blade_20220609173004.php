@extends('master')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Thực Đơn</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($category as $danhmuc )
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{$danhmuc->id}}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                         {{$danhmuc->name}}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{$danhmuc->id}}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($danhmuc->product_type as $type)
                                            <li><a href="danh-sach-sp/{{$type->id}}">{{$type->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--/category-products-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="source/images/home/banner.jpeg" alt="" width="100%" />
                    </div><!--/shipping-->
                    <div class="shipping text-center"><!--shipping-->
                        <img src="source/images/home/banner1.png" alt="" width="100%" />
                    </div><!--/shipping-->
                </div>
            </div>


            <div class="col-sm-9 padding-right">
                <div class="row">
                    @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                    @endif
                </div>
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-6">
                        <div class="view-product">
                            <img src="source/image/product/{{$product_detail->image}}" alt="" width="100%" />


                        </div>

                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                              {{-- <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                      <a href=""><img src="source/images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="source/images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar3.jpg" alt=""></a>
                                    </div>
                                    <div class="item">
                                      <a href=""><img src="source/images/product-details/similar1.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar2.jpg" alt=""></a>
                                      <a href=""><img src="source/images/product-details/similar3.jpg" alt=""></a>
                                    </div>

                                </div> --}}

                              <!-- Controls -->
                              {{-- <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                              </a>
                              <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                              </a> --}}
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="layout">
                            <div class="product-information"><!--/product-information-->
                                @if($product_detail->new == 1)
                                <img src="source/images/product-details/new.jpg" class="newarrival" alt="" />
                                @endif
                                <h2>{{$product_detail->name}}</h2>
                                <img src="source/images/product-details/rating.png" alt="" />
                                <br>
                                @if($product_detail->promotion_price != 0 && $product_detail->unit_price > $product_detail->promotion_price)
                                <h2 style="color: #FE980F;font-size:30px">{{number_format($product_detail->promotion_price)}}.đ</h2>
                                <p><del>{{number_format($product_detail->unit_price)}}.đ</del></p>
                                @else
                                <h2 style="color: #FE980F;font-size:30px">{{number_format($product_detail->unit_price)}}.đ</h2>
                                @endif
                                @if($product_detail->status == 0)
                                    <h2 style="color: #000000;font-size:30px">Hết hàng</h2>
                                @elseif($product_detail->status == 1)
                                    <h2 style="color: #000000;font-size:30px">Còn hàng</h2>
                                @endif
                                <hr>
                                <span>
                                    <form action="gio-hang/{{$product_detail->id}}" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <label for="">Số Lượng</label>
                                        <input type="number" min="1" name="soluong" id="" value="1">
                                        <input  class= "get" type="submit" value="Thêm Vào Giỏ Hàng">
                                    </form>
                                </span>
                                <p><b>Mô Tả Món:</b>{{$product_detail->description}}</p>
                                <a href=""><img src="source/images/product-details/share.png" class="share img-responsive" alt="" /></a>
                            </div><!--/product-information-->
                        </div>
                    </div>
                </div><!--/product-details-->
                <h2 class="title text-center">Đánh Giá Của Khách Hàng</h2>

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
                        </ul>
                    </div>

                    <div class="tab-pane fade active in" id="reviews" >
                        <div class="col-sm-12">
                            @foreach ($reviews as $review )
                            <ul>
                                <li><a href=""><img width="50" style="border-radius: 50%;" src="source/image/user/{{$review->customer_image}}" /></i>{{ $review->customer_name }}</a></li>
                                <li><a href=""><i class="fa fa-clock-o"></i>{{ $review->created_at->format('h:i A') }}</a></li>
                                <li><a href=""><i class="fa fa-calendar-o"></i>{{ $review->created_at->format('Y-m-d') }}</a></li>
                            </ul>
                            <p>{{ $review->review }}</p>
                            @endforeach
                            <p><b>Gửi Đánh Giá Của Bạn</b></p>

                            <form action="review/{{$product_detail->id}}" method="POST" >
                                <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                <textarea name="review" placeholder="Nhập Đánh Giá" ></textarea>
                                <b>Rating: </b> <img src="source/images/product-details/rating.png" alt="" />
                                <button type="submit" class="btn btn-default pull-right">
                                    Gửi Đánh Giá
                                </button>
                            </form>
                        </div>
                    </div>


                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Món Tương Tự</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach ($product_seem as $seem )
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="source/image/product/{{$seem->image}}" alt="" />
                                                @if($seem->promotion_price != 0 && $seem->unit_price > $seem->promotion_price)
                                                <h2>{{number_format($seem->promotion_price)}}.đ</h2>
                                                @else
                                                <h2>{{number_format($seem->unit_price)}}.đ</h2>
                                                @endif
                                                <p>{{$seem->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                @if($seem->promotion_price != 0 && $seem->unit_price > $seem->promotion_price)
                                                <h2>{{number_format($seem->promotion_price)}}.đ</h2>
                                                <p><del>{{number_format($seem->unit_price)}}.đ</del></p>
                                                @else
                                                <h2>{{number_format($seem->unit_price)}}.đ</h2>
                                                @endif
                                                    <p>{{$seem->name}}</p>
                                                    <a href="chi-tiet-sp/{{$seem->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                                </div>
                                            </div>
                                            @if($seem->promotion_price != 0)
                                            <img src="source/images/home/sale.png" class="new" alt="" />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="item ">
                                @foreach ($product_seem as $seem )
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="source/image/product/{{$seem->image}}" alt="" />
                                                @if($seem->promotion_price != 0 && $seem->unit_price > $seem->promotion_price)
                                                <h2>{{number_format($seem->promotion_price)}}.đ</h2>
                                                @else
                                                <h2>{{number_format($seem->unit_price)}}.đ</h2>
                                                @endif
                                                <p>{{$seem->name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                @if($seem->promotion_price != 0 && $seem->unit_price > $seem->promotion_price)
                                                <h2>{{number_format($seem->promotion_price)}}.đ</h2>
                                                <p><del>{{number_format($seem->unit_price)}}.đ</del></p>
                                                @else
                                                <h2>{{number_format($seem->unit_price)}}.đ</h2>
                                                @endif
                                                    <p>{{$seem->name}}</p>
                                                    <a href="chi-tiet-sp/{{$seem->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Đặt Món</a>
                                                </div>
                                            </div>
                                            @if($seem->promotion_price != 0)
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
                <div class="pagination">
                    {{$product_seem->links()}}
                </div>

            </div>
        </div>
    </div>
</section>
@endsection


<style>
    .product-information{
        box-shadow: 0 0 20px rgb(0 0 0 / 20%);
        padding-right: 10px;
    }
    .product-information .get{
        width: 200px;
       border: #FE980F 1px solid;
       color: #FE980F;
       background: white;
    }
    .product-information .get:hover{
        color: white;
        border: none;
        background: #FE980F;
        transition: 1s;
    }
    .product-information p {
    color: #696763;
    font-family: 'Roboto', sans-serif;
    margin-bottom: 5px;
    text-align: justify;
     }
     .shop-details-tab {
    border: 1px solid #F7F7F0;
    margin-bottom: 75px;
    margin-left: 15px;
    margin-right: 15px;
    padding-bottom: 10px;
    box-shadow: 0 0 20px rgb(0 0 0 / 20%);
}
.product-img{
    background-image: url('source/image/user/{{$product_detail->image}}');

    height: 400px;
    width: 400px;
}
</style>
