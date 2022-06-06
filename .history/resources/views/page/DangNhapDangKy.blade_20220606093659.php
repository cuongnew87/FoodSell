
@extends('master')
@section('content')
<section id="advertisement">
    <div class="container">
        <img src="source/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            @include('page.MenuDoc')

            <div class="col-sm-9 padding-right">
                @if (Session::has('thongbao'))
                <div class="alert alert-danger">
                    {{Session::get('thongbao')}}

                </div>
                @endif
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err )
                      {{$err}}<br>
                    @endforeach
                </div>
                @endif
                <section class="form"><!--form-->
                            <div class="col-sm-4 col-sm-offset-1">
                                <div class="login-form">
                                    <h2>Đăng Nhập Tài Khoản Của Bạn</h2>
                                    <form action="dang-nhap" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                        <input name = "email" type="text" placeholder="Email/Số Điện Thoại" />
                                        <input name = "password" type="password" placeholder="Mật Khẩu"/>
                                        <span>
                                            <input type="checkbox" class="checkbox">
                                           Duy Trì Đăng Nhập
                                        </span>
                                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                                    </form>
                                </div>
                            </div>
                            {{ dd() }}
                            <div class="col-sm-1">
                                <h2 class="or">OR</h2>
                            </div>
                            <div class="col-sm-4">
                                <div class="signup-form"><!--sign up form-->
                                    <h2>Đăng Ký Thành Viên Mới</h2>
                                    <form action="dang-ki" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                        <input name = "name" type="text" placeholder="Họ Tên"/>
                                        <input name = "email" type="email" placeholder="Email"/>
                                        <input name = "phone" type="text" placeholder="Số Điện Thoại"/>
                                        <input name = "password" type="password" placeholder="Mật Khẩu"/>
                                        <input name = "password_confirmation" type="password" placeholder="Nhập Lại Mật Khẩu"/>
                                        <button type="submit" class="btn btn-default">Đăng Ký</button>
                                    </form>
                                </div><!--/sign up form-->
                            </div>
                </section><!--/form-->

            </div>
        </div>
    </div>
</section>
@endsection


<style>
   .form {
    display: block;
    margin-bottom: 185px;
    margin-top: -26px;
    overflow: hidden;
}
</style>

