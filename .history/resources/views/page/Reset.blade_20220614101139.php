<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <base href="{{asset('')}}">
        <link href="source/css/bootstrap.min.css" rel="stylesheet">
        <link href="source/css/font-awesome.min.css" rel="stylesheet">
        <link href="source/css/prettyPhoto.css" rel="stylesheet">
        <link href="source/css/price-range.css" rel="stylesheet">
        <link href="source/css/animate.css" rel="stylesheet">
        <link href="source/css/main.css" rel="stylesheet">
        <link href="source/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="source/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="source/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="source/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="source/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="source/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->
    <body>
        <section>
            <div class="container">
                <div class="col">
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
        </section>
    </body>
    <style>
    .form {
        display: block;
        margin-bottom: 185px;
        margin-top: -26px;
        overflow: hidden;
    }
    </style>

</html>
