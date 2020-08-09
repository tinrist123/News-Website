@extends('admin.master')
<!-- /.col-lg-12 -->
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>Adding</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ url('admin/theloai/add') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên Thể Loại</label>
                        <input class="form-control" name="txtName" placeholder="Nhập Tên Thể Loại" />
                    </div>
                    <button type="submit" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection()