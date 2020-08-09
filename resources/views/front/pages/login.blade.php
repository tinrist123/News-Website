@extends('front.layout.index')
@section('title') Login @endsection
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- slider -->
    <div class="row carousel-holder">
        <div class="col-lg-8 pt-4" style="margin-left:250px; padding-top: 3em;">
            @include('admin.blocks.error')
            @if (Session::has('flash_message'))
            <div class="alert alert-warning alert-{{ Session::get('atr') }}">
                {{ Session::get('flash_message') }}
            </div>
            @endif
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-heading">Đăng nhập</div>

                <div class="panel-body">
                    <form method="post" action="">
                        @csrf
                        <div>
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="txtUser">
                        </div>
                        <br>
                        <div>
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="txtPass">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default submit">Đăng nhập
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
<!-- end Page Content -->
@endsection