@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Danh Sách</small>
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
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Danh Mục</th>
                        <th>Ảnh</th>
                        <th>Giá Gốc</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($product as $product )
                    <tr class="odd gradeX">
                        <th><?php echo $index; ?></th>
                        <th>{{$product->name}}</th>
                        <th>{{$product->product_type->name}}</th>
                        <th>{{$product->product_type->product_category->name}}</th>
                        <th><img src="source/image/product/{{$product->image}}" alt="" width="150px"></th>
                        <th>{{$product->unit_price}}</th>
                        @if($product->status == 0)
                        <th>Hết hàng</th>
                        @elseif($product->status == 1)
                        <th>Còn hàng</th>
                        @endif
                        <td style="display:flex; flex-direction:column; align-items:center;">
                            <a href="admin/Product/sua/{{$product->id}}"><i class="fa fa-pencil fa-fw"></i>Sửa</a>
                            <a href="admin/Product/xoa/{{$product->id}}"><i class="fa fa-trash-o fa-fw"></i>Xoá</a>
                        </td>
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
