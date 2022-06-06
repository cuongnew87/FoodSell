@extends('master')
@section('content')
<section id="advertisement">
    <div class="container">
        <div class="advertisement">
            <div class="infor">
                <h4 class="head">
                    Giới Thiệu
                </h4>
                <h1 class="heading">
                    Tasty Kitchen
                    <br>
                    Nơi Thăng Hoa Của Ẩm Thực
                </h1>
            </div>
        </div>
    </div>
</section>
<div class="information">
    <div class="container">
       <div class="row">
           <div class="col-sm-6">
               <div class="left">
                   <h2>TASTY KITCHEN
                    MANG ẨM THỰC CAO CẤP
                    ĐẾN TẬN NHÀ</h2>
                    <p>Là mô hình kinh doanh F&B kiểu mới – nhà hàng trực tuyến,
                        chúng tôi tiên phong trong việc cung cấp giải pháp bữa ăn cao cấp đến bàn ăn gia đình bạn.</p>
                    <p>Với hệ thống bếp không ngừng được đầu tư và mở rộng; cùng những nguyên liệu tự nhiên, tươi ngon được lựa chọn kỹ lưỡng từ các nông trại uy tín hàng đầu Việt Nam; qua bàn tay sáng tạo, tận tâm của đội ngũ đầu bếp nhiều năm kinh nghiệm, chúng tôi tự hào mang đến cho bạn những món ăn không chỉ ngon mà còn đa dạng,
                         tinh tế, đẹp mắt, chất lượng, sức khỏe và ngày càng đáng trải nghiệm hơn.</p>
                    <button class = "nut">Đặt Món Ngay</button>
               </div>
           </div>
           <div class="col-sm-6">
               <div class="right">
                   <img src="source\image\home\imgabout_1_v2.jpg" alt="" width="100%">

               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-sm-12">
               <div class="box">
                   <h4 class="head">
                    TASTY KITCHEN
                   </h4>
                   <h2>GIÁ TRỊ CỐT LÕI</h2>
                   <p>TASTY Kitchen tiên phong cho concept
                       <br>
                       " Nhà Hàng Tại Gia" ở Việt Nam với chất lượng dẫn đầu, mang phong cách ẩm thực mới lạ độc đáo đến thực khách</p>

                       <div class="list">
                           <div class="item">
                               <div class="item-1">
                                <img src="source\image\gioithieu\icon_conscientious_heart.png" alt="">
                                <h3>Tận Tâm</h3>
                               </div>


                           </div>
                           <div class="item">
                            <div class="item-1">
                             <img src="source\image\gioithieu\icon_acknowledge.png" alt="">
                             <h3>Am Hiểu</h3>
                            </div>


                        </div>
                        <div class="item">
                            <div class="item-1">
                             <img src="source\image\gioithieu\icon-creation.png" alt="">
                             <h3>Sáng Tạo</h3>
                            </div>


                        </div>
                        <div class="item">
                            <div class="item-1">
                             <img src="source\image\gioithieu\icon-delicate.png" alt="">
                             <h3>Tinh Tế</h3>
                            </div>


                        </div>
                        <div class="item">
                            <div class="item-1">
                             <img src="source\image\gioithieu\icon-loves.png" alt="">
                             <h3>Yêu Thương</h3>
                            </div>


                        </div>






                       </div>
                       <p>TASTY Kitchen với niềm đam mê ẩm thực mong muốn mang đến cho bạn nhiều lựa chọn ở tiêu chuẩn cao hơn:</p>
               </div>

           </div>
       </div>

    </div>


</div>


@endsection



<style>
    .nut{
        background: #d83a3a;
    border: 0;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    font-size: 16px;
    font-weight: 600;
    height: 42px;
    line-height: 42px;
    margin-bottom: 20px;
    padding: 0;
    text-align: center;
    width: 172px;
    }
    .left{
        height: 900px;
        text-align: justify;
    }
    .right
    {
        height: 900px;
    }
    .right img{
        margin-top: 20px;
    }
    .advertisement{
        height: 200px;
        background-image: url('source/image/home/bg-td-top-pc.jpg');
        background-size: cover;

    }
    .head{
        border-bottom: 3px solid white;
        display: inline;
    }
    .head,.heading{
        color: white;
        text-transform: uppercase;
    }
    .infor{
        text-align: center;
        padding-top: 45px;
    }
    .information{
        height: 1200px;
        margin-top: -45px;
    }
    .box{
        height: 900px;
        background-image: url('source/image/gioithieu/bg-about.jpg');
        background-size: cover;
        color: white;

        text-align: center;
        margin-top: -320px;

    }
    .list{
        width: 100%;

        height: 300px;
        display: flex;
    }
    .item{
        width: 200px;
        height: 200px;
       border: 1px solid white;
        margin: 0 auto;
        margin-top: 15px;
        text-align: center;
        position: relative;

    }
    .item-1{
        text-align: center;
        position: absolute;

        width: 150px;
        height: 150px;
        left: 25px;
        top: 30px;





    }

</style>
