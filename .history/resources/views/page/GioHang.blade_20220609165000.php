@extends('master')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">home</a></li>
              <li class="active">Xem Giỏ Hàng</li>
            </ol>
        </div>

        @if(Session::has('thongbao'))
        <div class="alert alert-success">
            {{Session::get('thongbao')}}
        </div>
        @endif
        <form action="cap-nhat-review-cart" method="post">
            <input type="hidden" name="_token" value="{{csrf_token('')}}">

            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Sản Phẩm</td>
                            <td class="description"></td>
                            <td class="price">Đơn Giá</td>
                            <td class="price">Trạng thái</td>
                            <td class="quantity">Số Lượng</td>
                            <td class="total">Thanh Toán</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_buy as $buy )

                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="source/image/product/{{$buy->image}}" alt="" width="100px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$buy->name}}</a></h4>
                            </td>
                            <td class="cart_price">
                                @if ($buy->promotion_price != 0)
                                <span class="" id="promotion_price{{$buy->id}}">{{$buy->promotion_price}}.đ</span>
                                @else
                                <span class="" id="unit_price{{$buy->id}}">{{$buy->unit_price}}.đ</span>
                                @endif
                            </td>
                            <td>
                                @if($buy->status == 0)
                                    <span class="">Hết hàng</span>
                                @elseif($buy->status == 1)
                                    <span class="">Còn hàng</span>
                                @endif
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up"  onclick="tang({{$buy->id}})"> + </a>
                                    <input type="hidden" name = "id[]" value="{{$buy->id}}">
                                    <input class="cart_quantity_input" type="text" id ="{{$buy->id}}" onchange="changeQuantity({{$buy->id}})" name="soluong[]" value="{{$buy->soluong}}" size="2" min="0">
                                    <a class="cart_quantity_down"  onclick="giam({{$buy->id}})"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price" id="payment{{$buy->id}}">{{$buy->thanhtoan}}.đ</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="xoa-review-cart/{{$buy->id}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <section id="do_action">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">

                        </div>
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>Phí Ship<span>Free</span></li>
                                    <li>Total <span id="total">{{$total}}.đ</span></li>
                                </ul>
                                <div class="total_area_button">
                                        <input  class= "get" type="submit" value="Cập Nhật Giỏ Hàng">
                                        <a class="btn btn-default check_out" href="thanh-toan">Thanh Toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </form>

    </div>
</section> <!--/#cart_items-->


@endsection

<style>
    .cart_quantity_up , .cart_quantity_down{
        cursor: pointer;
    }
    a.btn.btn-default.check_out {
    margin-top: 0px;
    }

    .cart_quantity_button button{
        border: none;
        display: inline-block;
        font-size: 16px;
        height: 28px;
        overflow: hidden;
        text-align: center;
        width: 35px;
        float: left;
        line-height: 28px;
    }
    input.get {
    margin-left: 41px;
    border: none;
    padding: 4px 20px;

}

}

</style>

<script>

    function changeQuantity(id)
    {
        changePayment(id);
        changeTotal(id);
    }

    function tang(id){
        var soluong = document.getElementById(id).value;
        soluong++;
        document.getElementById(id).value = soluong;
        changePayment(id);
        changeTotal(id);
    }
    function giam(id){
        var soluong = document.getElementById(id).value;
        soluong--;
        if(document.getElementById(id).value <= 0)
        {
            soluong = 0;
        }
        document.getElementById(id).value = soluong;
        changePayment(id);
        changeTotal(id);
    }

    function changePayment(id)
    {
            if(document.getElementById("promotion_price" + id) != null){
                var soluong = document.getElementById(id).value;
                var dongia = parseInt(document.getElementById("promotion_price" + id).innerHTML, 0);
                var thanhtoan = soluong * dongia;
                document.getElementById("payment"+id).innerHTML = thanhtoan + '.đ';

            }
            if(document.getElementById("unit_price" + id) != null){
                var soluong = document.getElementById(id).value;
                var dongia = parseInt(document.getElementById("unit_price" + id).innerHTML, 0);
                var thanhtoan = soluong * dongia;
                document.getElementById("payment"+id).innerHTML = thanhtoan + '.đ';
            }
    }
    function changeTotal(id)
    {
        var tong = 0;
        var total = document.getElementById("total").innerHTML;
        var thanhtoan = document.getElementsByClassName("cart_total_price");
        for(var i = 0;i < thanhtoan.length; i++){
            tong = tong + parseInt(thanhtoan[i].innerHTML);
        }
        document.getElementById('total').innerHTML = tong + '.đ';
        return tong;
    }

</script>
