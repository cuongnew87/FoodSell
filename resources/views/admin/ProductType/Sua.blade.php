@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Sản Phẩm
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
                <form action="admin/TypeProduct/sua/{{$type->id}}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token('')}}">
                    <div class="form-group">
                        <label>Chọn Danh Mục Sản Phẩm Mới</label>
                        <select class="form-control" name ="id_category">
                            @foreach ($category as $category )
                             <option value="{{$category->id}}"
                             @if($type->id_category == $category->id)
                             {{"selected"}}
                             @endif
                             >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại Sản Phẩm </label>
                        <input class="form-control" name="name" placeholder="Nhập Tên Loại Sản Phẩm Cần Sửa" value="{{$type->name}}" />
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
