@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Thêm</small>
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
                <form action="admin/Product/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token('')}}">

                    <div class="form-group">
                        <label>Chọn Loại Sản Phẩm</label>
                        <select class="form-control" name = "id_type">
                            @foreach ($type as $type )
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nhập Tên Sản Phẩm</label>
                        <input class="form-control" name="name" placeholder="Nhâp Sản Phẩm" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label>Chọn Ảnh Sản Phẩm</label>
                        <input class="form-control" type="file" name="image" placeholder="Chọn Ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Chú Thích </label>
                        <textarea class="form-control"  name ="description" rows="3"  ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Thêm Ảnh Liên Quan</label>
                        <input class="form-control" type="file" name="image_lienquan[]" placeholder="Chọn Ảnh" />
                    </div>
                    <div class="form-group">
                        <label>Giá Gốc</label>
                        <input class="form-control"  type = "number" name="unit_price" placeholder="Nhập Giá Gốc" />
                    </div>
                    <div class="form-group">
                        <label>Giá Khuyến Mãi</label>
                        <input class="form-control" type = "number" name="promotion_price" placeholder="Nhập Giá Khuyến Mãi" />
                    </div>
                    <div class="form-group">
                        <label>Sản Phẩm Mới ?</label>
                        <label class="radio-inline">
                            <input name="new" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="new" value="0" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
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
