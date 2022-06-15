@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div id="contact-page" class="container">
    <div class="bg">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Thanh Toán Đơn Hàng</h2>
                <div class="space10">&nbsp;</div>
                <div class="space10">&nbsp;</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <h2 class="title text-center">Thông Tin Khách Hàng</h2>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form  action="thanh-toan" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                        <div class="form-group col-md-6">
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" required="required" placeholder="Tên Khách Hàng">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" name="email" value="{{$user->email}}" class= "form-control" required="required" placeholder="Email">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="phone"  value="{{$user->phone}}" class="form-control" required="required" placeholder="Số Điện Thoại">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="text" name="address" value="{{$user->address}}" class="form-control" required="required" placeholder="Địa Chỉ">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="messenge" id="message" required="required" class="form-control" rows="8" placeholder="Để lại lời nhắn về đơn hàng của bạn"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input type="hidden" name="method_payment" value="Thanh Toán Tiền Mặt" checked="checked">
                        </div>
                        <div class="form-group col-md-12">
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Thanh Toán">
                        </div>
                    </form>
                    <button id="paypal-button"></button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="contact-info">
                    <h2 class="title text-center">Thông Tin Thanh Toán</h2>
                    <div class="box">
                        <div class="box-fix">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Phí Ship</p>
                                </div>
                                <div class="col-sm-6">
                                    <p>FREE</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <p>Tổng Tiền</p>
                                </div>
                                <div class="col-sm-6">
                                    <p id="total" value="<?php echo $total ?>">{{number_format($total)}}.đ</p>
                                    <input type="hidden" name=""
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="space10">&nbsp;</div>

                    <div class="social-networks">
                        <h2 class="title text-center">Mạng Xã Hội</h2>
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/#contact-page-->
<div class="space10">&nbsp;</div>
<div class="space10">&nbsp;</div>

@endsection


<style>
    .login-form form .form-control,
    .signup-form form .form-control {
    background: #F0F0E9;
    border: medium none;
    color: #696763;
    display: block;
    font-family: 'Roboto', sans-serif;
    font-size: 14px;
    font-weight: 300;
    margin-bottom: 10px;
    outline: medium none;
    padding-left: 10px;
    width: 100%;
}

    .hup{
        margin-top: 10px;
        width: 100%;

    }
    .hup:hover{
        background: white;
        color: orange;
        border: solid 1px orange;
    }
    .box{
        margin: auto;
        width: 300px;
        height: 300px;
        border: 1px solid orange;

    }
    .box-fix{

        height: 250px;
        width:200px;
        margin: auto;
    }


</style>



<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    let total = document.getElementById('total').value/23173.00
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'ARp_QaeuFFV14G4BK4jIuV5pkvLighxBbMGidURdFK-VxppiuGJbqGKhF5MltRIXei7h7tjdmjeNdcjL',
      production: 'ENUbmwT3q-OAVKEff_3w1x1dBdk2lXn1hxSUw3xN1kbgxDBhVn57oynfI7_5bpuKDe08zW-BK8yxbsWu'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'small',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: total,
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        // save db
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>


