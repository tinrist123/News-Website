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
                    <div class="form-group">
                        <label>Tên User</label>
                        <input class="form-control" name="txtUser" value="{{ old('txtUser', isset($user)?$user['name']:null) }}" disabled />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{ old('txtEmail', isset($user)?$user['email']:null) }}" />
                    </div>
                    @if (Auth::user()->id != $id)
                    <div class="form-group">
                        <label>User quyen</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1" type="radio" @if ($user['quyen']==1) checked @endif>SuperAdmin
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="2" @if ($user['quyen']==2) checked @endif type="radio">Admin
                        </label> <label class="radio-inline">
                            <input name="rdoLevel" value="3" @if ($user['quyen']==3) checked @endif type="radio">Member
                        </label>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-default">User Edit</button>
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