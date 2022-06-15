
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
                                {{-- <span>
                                    <input type="checkbox" class="checkbox" name="remember" value="1">
                                    Duy Trì Đăng Nhập
                                </span> --}}
                                <a href="/reset">Quên mật khẩu ?</a>
                                <button type="submit" class="btn btn-default">Đăng Nhập</button>
                            </form>
                        </div>
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
