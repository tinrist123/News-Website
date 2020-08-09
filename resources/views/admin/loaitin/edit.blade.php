@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    @csrf
                    <select class="form-control" name="sltTheloai_id">
                        <option value=""> Nhập Loại Thể Loại</option>
                        <?php showOption($parent_theloai, $loaitin_clicked->idTheLoai, ''); ?>
                    </select>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtName" value="{{ old('txtName',isset($loaitin_clicked)? $loaitin_clicked->Ten :null) }}" />
                    </div>
                    <button type="submit" class="btn btn-default">Loại Tin Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection