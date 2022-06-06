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
	@include('page.header')

	@yield('content')

	@include('page.footer')

    <div class="zalo-chat-widget" data-oaid="3898021956492321821" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height="" ></div>

    <script src="https://sp.zalo.me/plugins/sdk.js"></script>



    <script src="source/js/jquery.js"></script>
	<script src="source/js/bootstrap.min.js"></script>
	<script src="source/js/jquery.scrollUp.min.js"></script>
	<script src="source/js/price-range.js"></script>
    <script src="source/js/jquery.prettyPhoto.js"></script>
    <script src="source/js/main.js"></script>
</body>
</html>
