@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Người Dùng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                @if(Session::has('thongbao'))
                <div class="alert alert-success">
                    {{Session::get('thongbao')}}
                </div>
                @endif
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($product as $product )
                    <tr class="odd gradeX" align="center">
                        <th><?php echo $index; ?></th>
                        <th>{{$product->name}}</th>
                        <th>{{$product->product_type->name}}</th>
                        <th>{{$product->product_type->product_category->name}}</th>
                        <th><img src="source/image/product/{{$product->image}}" alt="" width="150px"></th>
                        <th>{{$product->unit_price}}</th>
                        <th>{{$product->promotion_price}}</th>
                        <th>{{$product->new}}</th>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/Product/sua/{{$product->id}}">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="admin/Product/xoa/{{$product->id}}">Xoá</a></td>
                    </tr>
                    <?php $index++; ?>
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
