@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Danh Sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Tittle</th>
                        <th>Content</th>
                        <th>Link</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($slide as $sl )
                    <tr class="odd gradeX" align="center">
                        <th>{{$sl->id}}</th>
                        <th>{{$sl->name}}</th>
                        <th><img src="source/image/home/{{$sl->image}}" alt=""  width="150px"/></th>
                        <th>{{$sl->tittle}}</th>
                        <th>{{$sl->content}}</th>
                        <th>{{$sl->link}}</th>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/slide/sua/{{$sl->id}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/slide/xoa/{{$sl->id}}"> Xoá</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
