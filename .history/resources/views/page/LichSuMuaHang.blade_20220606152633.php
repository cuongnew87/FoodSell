@extends('master')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="source\image\home\bg-td-top-pc.jpg" alt="" />
    </div>
</section>

<section>
    @foreach ($products as $product )
    @endforeach
    <div class="container">
        <div class="features_items">
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
                        <div class="price-range"><!--price-range-->
                            <h2>Lọc Theo Giá</h2>
                            <div class="well text-center">
                                 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                                 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                            </div>
                        </div><!--/price-range-->

                        <div class="shipping text-center"><!--shipping-->
                            <img src="source/images/home/banner.jpeg" alt="" width="100%" />
                        </div><!--/shipping-->

                    </div>
                </div>


                <div class="col-sm-9 padding-right">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="title text-center">Lịch Sử Mua Hàng</h2>
                            </div>
                        </div>
                        <div class="content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="box-menu-user">
                                            <div class="head-menu">
                                                <div class="avatar">
                                                    @if ($nguoidung->avatar)
                                                    <div class="img" style=" background-image: url('source/image/user/{{$nguoidung->avatar}}'); height: 100px;
                                                        width: 100px;background-size: cover;margin: auto"></div>
                                                    @else
                                                    <div class="img" style=" background-image: url('source/image/user/user.png'); height: 100px;
                                                        width: 100px;background-size: cover;margin: auto"></div>
                                                    @endif
                                                </div>
                                                            <div class="infor" >
                                                                <h4 class="name text-center ">{{$nguoidung->name}}</h4>
                                                                <p class="status text-center" style="background: orange ;color:white;padding:5px;font-weight:bold;font-size:20px" width ="100px">Thường</p>
                                                            </div>
                                            </div>

                                            <div class="border-menu">
                                                <ul>
                                                    <li><a href="thong-tin-tai-khoan/{{Session::get('id_user')}}"><i class="fa fa-user icon"></i>Tài Khoản Của Tôi</a></li>
                                                    <li><a href="lich-su-mua-hang/{{Session::get('id_user')}}"><i class="fa fa-usd icon"></i>Lịch Sử Đơn Hàng</a></li>
                                                    <li><a href="dang-xuat"><i class=" fa fa-sign-out icon"></i>Đăng Xuất</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="content-user">
                                            <div class="container">

                                                <table class="table-cart" cellspacing="0">
                                                    <tr class="table-header">
                                                        <th class="product-name fix">Sản Phẩm</th>
                                                        <th class="product-name fix"></th>
                                                        <th class="product-name fix">Số Lượng</th>
                                                        <th class="product-name fix">Thanh Toán</th>
                                                        <th class="product-name fix">Ngày Mua</th>
                                                        <th class="product-name fix"></th>

                                                    </tr>

                                                    @if ($bills)
                                                    @foreach ($bills as $bills )
                                                    <tr class="cart_item">
                                                        <td>
                                                            <img class="pull-left" src="source/image/product/{{$bills->image}}" alt="" width="80px" height="80px">
                                                        </td>
                                                        <td class = "table-title1" >
                                                            <p class="font-large fix1">{{$bills->name}}</p>
                                                        </td>
                                                        <td class="table-title">
                                                            <span>{{$bills->soluong}}</span>
                                                        </td>
                                                        <td class="table-title">
                                                            <span>{{number_format($bills->thanhtoan)}}.đ</span>
                                                        </td>
                                                        <td class="table-title">
                                                            <span>{{$bills->created_at}}</span>

                                                        </td>
                                                        <td class="cart_delete table-title">
                                                            <a class="cart_quantity_delete" href="xoa-lich-su-mua-hang/{{$bills->id}}"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<style>
    .head-menu{
        height: 150px;
        margin: 10px;
        margin-left: 50px;
        width: 150px;

    }
    .border-menu{
        margin: 20px;
        line-height: 70px;
    }
    .icon{
        margin-right: 10px;
    }
    .img{
        border-radius: 50%;
    }

    .box-menu-user{
        height: 400px;
        margin-top: -11px;
        margin-left: -50px;
    }
    .border-menu ul li a{
        color: black;
        font-size: 17px;
    }
    .border-menu ul li a:hover{
        color: #FE980F;
        font-size: 19px;
    }
    .content-user{

        box-shadow: 0 0 20px rgb(0 0 0 / 20%);

        height: 750px;
        width: 610px;
        margin-left: -100px;
        overflow-y: scroll;
        overflow-x: hidden;



    }
    .content-user::-webkit-scrollbar{
    width: 10px;
    height: 30px;
    }
    .content-user::-webkit-scrollbar-thumb{
    background: #FE980F;
    border-radius: 10px;
    }
    .table-cart{
        width: 570px;

    }
    .table-header{
        align-items: center;
        height: 50px;


    }
    .table-title{
        height: 100px;
        line-height: 100px;

    }
    .table-title1 p{
        width: 110px;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
    }
    .fix{
        margin: 0;
        overflow: hidden;
        color: #FE980F;
        font-size: 15px;

    }
    .cart_item{
        border-bottom: 5px solid #FE980F;
        padding-bottom: 10px;
        border-top: 5px solid #FE980F;

    }



</style>
