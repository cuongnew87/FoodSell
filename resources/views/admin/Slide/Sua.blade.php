@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
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
                <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token('')}}">

                    <div class="form-group">
                        <label>Tên Slide</label>
                        <input type="text"class="form-control" name="name" placeholder="Nhập Tên Slide" value="{{$slide->name}}">
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <img src="source/image/home/{{$slide->image}}" alt="" width="150px">
                        <input type="file"class="form-control" name="image" placeholder="Chọn Ảnh Cần Sửa" value="{{$slide->image}}">
                    </div>
                    <div class="form-group">
                        <label>Chú Thích</label>
                        <input type="text"class="form-control" name="tittle" placeholder="Nhập Chú Thích " value="{{$slide->tittle}}">
                    </div>
                    <div class="form-group">
                        <label>Nội Dung</label>
                        <input type="text"class="form-control" name="content" placeholder="Nhập Nội Dung" value="{{$slide->content}}">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text"class="form-control" name="link" placeholder="Nhập Liên Kết" value="{{$slide->link}}">
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Slide</button>
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
