@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.blocks.error')
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Chọn Thể Loại</label>
                        <select class="form-control" name="sltTheloai_id">
                            <option value=""> Nhập Loại Thể Loại</option>
                            <?php showOption($parent_theloai, 0, ''); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Loại Tin</label>
                        <input class="form-control" name="txtName" placeholder="Please Enter Username" value="{{ old('txtUser') }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Add Loại Tin</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection