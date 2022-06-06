<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-md-4 clearfix">
                    <div class="logo pull-left">
                        <a href="index"><img src="source/images/home/logo2.png" alt="" height="200px" width="300px"/></a>
                    </div>

                </div>
                <div class="col-md-8 clearfix">
                    <div class="shop-menu clearfix pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li>
                            <li><div class="btn-group">
                                @if (Session::get('count') == 0)
                                <a type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i>Giỏ hàng (Trống)
                                    <span class="caret"></span>
                                </a>
                                @else
                                <a type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"></i>Giỏ hàng ({{Session::get('count')}}:Món)
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                        <div class="wrapper">
                                            @if (Session::has('product_buy'))
                                            @foreach ( Session::get('product_buy') as $buy )
                                            <div class="cart-item">
                                                <div class="row ">
                                                    <div class="col-xs-3">
                                                        <a class="pull-left" href="#"><img src="source/image/product/{{$buy->image}}" alt="" width="100%"></a>
                                                    </div>
                                                    <div class="col-xs-7">
                                                        <div class="media-body">
                                                            <span class="cart-item-title y">{{$buy->name}}</span>
                                                            <br>
                                                            @if ($buy->promotion_price != 0)
                                                            <span class="cart-item-amount y">{{$buy->soluong}}<span class="x">x</span><span class="y">{{number_format($buy->promotion_price)}}.đ</span></span>
                                                            @else
                                                            <span class="cart-item-amount y">{{$buy->soluong}}<span class="x">x</span><span class="y">{{number_format($buy->unit_price)}}.đ</span></span>
                                                            @endif
                                                        </div>

                                                    </div>
                                                    <div class="col-xs-2">
                                                        <td class="cart_delete">
                                                            <a class="cart_quantity_delete" href="xoa-gio-hang/{{$buy->id}}"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </div>

                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                        <div class="cart-caption ">
                                                <div class=" cart-total" role="alert">
                                                    Tổng Tiền : {{number_format(Session::get('tongtien'))}}.đ</div>
                                        </div>
                                        <div class="cart-checkout ">
                                                <div class="thanhtoan">

                                                <a href="gio-hang" class="get">Xem Giỏ Hàng</a>
                                                <a href="thanh-toan" class="get">Thanh Toán</a>
                                                </div>
                                        </div>
                                </ul>
                                @endif
                              </div>
                            </li>
                            @if (Session::has('name'))
                            <li><div class="btn-group1">
                                <a type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    <i class="fa fa-smile-o"></i>Xin Chào : {{Session::get('name')}}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="thong-tin-tai-khoan/{{Session::get('id_user')}}"><i class="fa fa-user"></i>Tài Khoản Của Tôi</a></li>
                                    <li><a href="lich-su-mua-hang/{{Session::get('id_user')}}"><i class="fa fa-usd"></i>Lịch Sử Mua Hàng</a></li>
                                    <li><a href="dang-xuat"><i class=" fa fa-sign-out "></i>Đăng Xuất</a></li>
                                </ul>
                              </div>
                            </li>
                            @else
                            <li><a href="dang-nhap-dang-ki"><i class="fa fa-user "></i>Tài Khoản</a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index" class="active">Trang Chủ</a></li>
                            <li class="dropdown"><a href="#">Danh Mục<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach ($category as $category )
                                    <li><a href="danh-sach-sp-danhmuc/{{$category->id}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tin Tức<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    {{-- <li><a href="blog.html">Blog List</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li> --}}
                                </ul>
                            </li>
                            {{-- <li><a href="404.html">404</a></li> --}}
                            <li><a href="gioi-thieu">Giới Thiệu</a></li>
                            <li><a href="lien-he">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form role="search" method="get" id="searchform" action="tim-kiem-sp">
                                <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                <input type="text" value="" name="search" placeholder="Nhập từ khóa..." />
					            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<style>
    .x{
        padding: 0 3px;
        color: #FE980F;
        font-weight: bold;
    }
    .y:hover{
        color: #FE980F;
        transition: 0.3s;

    }
    .y:hover .x{
        color: #696763;
        font-size: 13px;
    }

.wrapper{
        height: 300px;
        overflow-y: scroll;
        margin-bottom: 5px;
    }
.wrapper::-webkit-scrollbar{
    width: 10px;
}
.wrapper::-webkit-scrollbar-thumb{
    background: #FE980F;
    border-radius: 10px;
}
.logo.pull-left {
    margin-top: -76px;
}
.header-middle .container .row {
    border-bottom: 1px solid #FE980F;
    margin-left: 0;
    margin-right: 0;
    padding-bottom: 20px;
    padding-top: 20px;
    height: 100px;

}
.header-middle .container{
    height: 100px;

}
.dropdown-menu .cart-caption .cart-total {
    padding-left: 0px;
    text-align: center;
}
.cart-checkout .thanhtoan{
    display: flex;
    width: 250px;
    margin: 0 auto;

}
.cart-checkout .thanhtoan .get{
    border: 1px solid #FE980F;
    padding: 10px;
    background: white;
    color: #FE980F;
    font-family: 'Roboto', sans-serif;
    font-weight: bold;
    margin-right: 10px;

}
.cart-checkout .thanhtoan .get:hover{
    background: #FE980F;
    color: white;
    border: none;
    transition: 1s;
    border: 1px solid #FE980F;
}

.cart-checkout .thanhtoan .logo.pull-left{
    border: 1px solid #FE980F;

}
.search_box input {
    background: #F0F0E9;
    border: medium none;
    color: #B2B2B2;
    font-family: 'roboto';
    font-size: 12px;
    font-weight: 300;
    height: 35px;
    outline: medium none;
    padding-left: 10px;
    width: 155px;
    position: relative;
}
button#searchsubmit
{
    border: none;
    height: 35px;
    position: absolute;
    right: 10px;
}
.btn-group1 .dropdown-menu{
    border-radius: 1px solid;
    width: 165px;

    margin-left: 16px;
}

</style>
