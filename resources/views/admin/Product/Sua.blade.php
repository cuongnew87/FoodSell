@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err )
                      {{$err}}<br>
                    @endforeach
                </div>
                @endif

                @if(Session::has('thongbao'))
                <div class="alert alert-success">
                    {{Session::get('thongbao')}}
                </div>
                @endif
                <form action="admin/Product/sua/{{$product->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token('')}}">
                    <div class="form-group">
                        <label>Chọn Loại Sản Phẩm</label>
                        <select class="form-control" name = "id_type">
                            @foreach ($type as $type )
                            <option value="{{$type->id}}"
                                @if($type->id == $product->id_type)
                                {{"selected"}}
                                @endif
                                >{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nhập Tên Sản Phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhâp Sản Phẩm" value="{{$product->name}}" />
                    </div>
                    <div class="form-group">
                        <img src="source/image/product/{{$product->image}}" alt="" width="200px">
                    </div>
                    <div class="form-group">
                        <label>Chọn Ảnh Sản Phẩm</label>
                        <input class="form-control" type="file" name="image" placeholder="Chọn Ảnh" value="{{$product->image}}" />
                    </div>
                    <div class="form-group">
                        <label>Chú Thích </label>
                        <textarea class="form-control"  name ="description" rows="3">
                            {{$product->description}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label>Giá Gốc</label>
                        <input class="form-control"  type = "text" name="unit_price" placeholder="Nhập Giá Gốc" value="{{$product->unit_price}}"/>
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input class="form-control" type = "text" name="promotion_price" placeholder="Nhập Giá Khuyến Mãi" value="{{$product->promotion_price}}" />
                    </div>
                    <div class="form-group">
                        <label>Sản Phẩm Mới ?</label>
                        <label class="radio-inline">
                            <input name="new" value="1" checked="" type="radio"
                            @if($product->new == 1)
                            {{"checked"}}
                            @endif
                            >Có
                        </label>
                        <label class="radio-inline">
                            <input name="new" value="0" type="radio"
                            @if($product->new == 0)
                            {{"checked"}}
                            @endif
                            >Không
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái ?</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio"
                            @if($product->status == 1)
                            {{"checked"}}
                            @endif
                            >Còn hàng
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio"
                            @if($product->status == 0)
                            {{"checked"}}
                            @endif
                            >Hết hàng
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


@endsection
