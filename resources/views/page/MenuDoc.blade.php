<style>
    .range-wrap {
  position: relative;
  margin: 0 auto 3rem;
}
.range {
  width: 100%;
}
.bubble {
  background: red;
  color: white;
  padding: 4px 12px;
  position: absolute;
  border-radius: 4px;
  left: 50%;
  transform: translateX(-50%);
}
.bubble::after {
  content: "";
  position: absolute;
  width: 2px;
  height: 2px;
  background: red;
  top: -1px;
  left: 50%;
}
</style>
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
        <div class="price-range"><!--price-range-->
            <h2>Lọc Theo Giá</h2>
            <div class="well text-center">
                {{-- <input type="text" class="span2" value="" data-slider-min="{{$min_price}}" data-slider-max="{{$max_price}}" data-slider-step="1000" data-slider-value="{{$max_price}}" id="sl2"><br />
                <b class="pull-left">{{$min_price}} đ</b> <b class="pull-right">{{$max_price}} đ</b>--}}
                <div class="range-wrap">
                    <input type="range" class="range" min="{{$min_price}}" max="{{$max_price}}" step="1000" value="{{$max_price}}">
                    <output class="bubble"></output>
                </div>
                <b class="pull-left" id="pull-min" value="{{$min_price}}">{{$min_price}} đ</b> <b class="pull-right" id="pull-max" value="{{$max_price}}">{{$max_price}} đ</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="source/images/home/banner.jpeg" alt="" width="100%" />
        </div><!--/shipping-->
        <div class="shipping text-center"><!--shipping-->
            <img src="source/images/home/banner1.png" alt="" width="100%" />
        </div><!--/shipping-->
        <div class="shipping text-center"><!--shipping-->
            <img src="source/images/home/banner2.jpg" alt="" width="100%" />
        </div><!--/shipping-->

    </div>
</div>
