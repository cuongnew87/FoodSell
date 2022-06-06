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
                    {{-- <div class="shipping text-center"><!--shipping-->
                        <img src="source/images/home/banner2.jpg" alt="" width="100%" />
                    </div><!--/shipping--> --}}
                    {{-- <div class="shipping text-center"><!--shipping-->
                        <img src="source/images/home/banner1.png" alt="" width="100%" />
                    </div><!--/shipping--> --}}

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="title text-center">THÔNG TIN TÀI KHOẢN</h2>
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
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    @if (Session::has('thongbao'))
                                                    <div class="alert alert-success">
                                                        {{Session::get('thongbao')}}

                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="signup-form"><!--sign up form-->
                                                        <h2>Thay Đổi Thông Tin</h2>
                                                        <form action="thong-tin-tai-khoan/{{$nguoidung->id}}" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                                            @if ($nguoidung->avatar)
                                                            <div class="img" style=" background-image: url('source/image/user/{{$nguoidung->avatar}}'); height: 150px;
                                                                width: 150px;background-size: cover"></div>
                                                            @else
                                                            <div class="img" style=" background-image: url('source/image/user/user.png'); height: 150px;
                                                                width: 150px;background-size: cover"></div>
                                                            @endif
                                                            <hr>
                                                            <input type="file" name="avatar" id="" class="anh" placeholder="Cập Nhật Ảnh Đại Diện">
                                                            <input type="text" name = "name" placeholder="Tên" value="{{$nguoidung->name}}">
                                                            <input type="email" name = "email" placeholder="Email" value="{{$nguoidung->email}}"/>
                                                            <input type="text" name = "phone" placeholder="Số Điện Thoại" value="{{$nguoidung->phone}}"/>
                                                            <input type="password" placeholder="Mật Khẩu" value="{{$nguoidung->password}}"/>
                                                            <input type="password" name = "password" placeholder="Nhập Lại Mật Khẩu" required/>
                                                            <input type="text" name = "address" placeholder="Địa Chỉ" value="{{$nguoidung->address}}">
                                                            <button type="submit" class="btn btn-default">Cập Nhật</button>
                                                        </form>
                                                    </div><!--/sign up form-->
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
    .img{
        background-image: url("source/images/home/3b7aefef1242da1c8353.jpg")
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
        background: #fff;
        box-shadow: 0 0 20px rgb(0 0 0 / 20%);
        height: 750px;
        width: 520px;
    }
</style>
