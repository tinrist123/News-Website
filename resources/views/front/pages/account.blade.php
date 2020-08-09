@extends('front.layout.index')
@section('title') Account @endsection
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            @include('admin.blocks.error')
            @if (Session::has('flash_message'))
            <div class="alert alert-warning alert-{{ Session::get('atr') }}">
                {{ Session::get('flash_message') }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Thông tin tài khoản</div>
                <div class="panel-body">
                    <form method="post" action="">
                        @csrf
                        <div>
                            <label>Họ tên</label>
                            <input type="text" class="form-control" placeholder="Username" name="txtName" aria-describedby="basic-addon1" value="{{ old('txtName',isset($user)?$user->name:null) }}">
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtEmail" aria-describedby="basic-addon1" disabled value="{{ old('txtEmail',isset($user)?$user->email:null) }}">
                        </div>
                        <br>
                        <div>
                            <input type="checkbox" id="changePassword" name="checkpassword">
                            <label>Đổi mật khẩu</label>
                            <input type="password" class="form-control password" name="txtPass" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <div>
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control password" name="passwordAgain" aria-describedby="basic-addon1" disabled>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default">Sửa
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