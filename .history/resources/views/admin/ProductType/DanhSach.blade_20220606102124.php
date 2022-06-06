@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại Sản Phẩm
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
                        <th>STT</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Sửa</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <?php index = 1; ?>
                    @foreach ($type as $type )
                    <tr class="odd gradeX" align="center">
                        <th><?php echo index = 1; ?></th>
                        <th>{{$type->name}}</th>
                        <th>{{$type->product_category->name}}</th>
                        {{-- product_category ở đây chính là function trong model loại sản phẩm --}}
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/TypeProduct/sua/{{$type->id}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/TypeProduct/xoa/{{$type->id}}">Xoá</a></td>
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
