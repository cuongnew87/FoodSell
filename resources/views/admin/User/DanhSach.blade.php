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
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($users as $user )
                    <tr class="odd gradeX" align="center">
                        <th><?php echo $index; ?></th>
                        <th><img width="150" src="source\image\user\<?php echo $user->avatar; ?>"></th>
                        <th>{{$user->name}}</th>
                        <th>{{$user->email}}</th>
                        <th>{{$user->phone}}</th>
                        @if($user->role_id == 0)<th>Admin</th>
                        @elseif($user->role_id == 1)<th>User</th>
                        @endif
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
