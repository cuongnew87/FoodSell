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
        <link rel="shortcut icon" href="source/images/ico/favicon.ico">
    </head><!--/head-->
    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="display:flex; ">
                   <div class="card">
                        <div class="card-header">Reset Password</div>
                             <div class="card-body">
                                 <form method="POST" action="/reset-password">
                                  @csrf
                                  <input type="hidden" name="token" value="{{ $token }}">
                               <div class="form-group row">
                                   <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                 <div class="col-md-6">
                                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
       
                                       @error('email')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>
                               </div>
           
                               <div class="form-group row">
                                   <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                   <div class="col-md-6">
                                       <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
       
                                       @error('password')
                                           <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                           </span>
                                       @enderror
                                   </div>
       
                               </div>
       
                             <div class="form-group row">
                                   <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                                   <div class="col-md-6">
                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                   </div>
                               </div>
       
                            <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                       <button type="submit" class="btn btn-primary">
                                           Reset Password
                                       </button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
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
