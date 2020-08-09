@extends('front.layout.index')
@section('title') Register @endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-lg-5 pt-4" style="margin-left:250px; padding-top: 3em;">
            @include('admin.blocks.error')
            @if (Session::has('flash_message'))
            <div class="alert alert-warning alert-{{ Session::get('atr') }}">
                {{ Session::get('flash_message') }}
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">

                <div class="panel-heading">Đăng ký tài khoản</div>
                <div class="panel-body">
                    <form action="" method="POST">
                        @csrf
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Username" name="txtName" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Nhập mật khẩu</label>
                            <input type="password" class="form-control" name="txtPass" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="txtRePass" aria-describedby="basic-addon1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Đăng ký
                        </button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection