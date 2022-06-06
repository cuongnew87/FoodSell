@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
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
                <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token('')}}">
                    <div class="form-group">
                        <label>Tên Slide</label>
                        <input type="text"class="form-control" name="name" placeholder="Nhập Tên Slide ">
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <input type="file"class="form-control" name="image" placeholder="Chọn Ảnh  ">
                    </div>
                    <div class="form-group">
                        <label>Chú Thích</label>
                        <input type="text"class="form-control" name="tittle" placeholder="Nhập Chú Thích ">
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <input type="text"class="form-control" name="content" placeholder="Nhập Nội Dung">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text"class="form-control" name="link" placeholder="Nhập Liên Kết">
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Slide</button>
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
