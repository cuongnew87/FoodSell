<section>
    <div class="container">
        <div class="row">

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
                            <h2>Nhập email của bạn đã sử dụng để đăng ký tài khoản để lấy lại mật khẩu.</h2>
                            <form action="reset" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token('')}}">
                                <input name = "email" type="text" placeholder="Email" />
                                <button type="submit" class="btn btn-default">Gửi link xác nhận</button>
                            </form>
                        </div>
                    </div>
                </section><!--/form-->

            </div>
        </div>
    </div>
</section>
{{-- @endsection --}}

<style>
   .form {
    display: block;
    margin-bottom: 185px;
    margin-top: -26px;
    overflow: hidden;
}
</style>

