@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>quyen</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($listUser as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt  }}</td>
                        <td>{{ $user['name']  }}</td>
                        <td>{{ $user['email']  }}</td>
                        <td>
                            {{ (($user['quyen']==1)?'SuperAdmin':(($user['quyen']==2)?'Admin':'member'))  }}
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn chắc chắn xóa chứ ?') " href="{{ URL::route('admin.user.getDelete',$user['id']) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('admin.user.getEdit',$user['id']) }}">Edit</a></td>
                    </tr>
                    <?php $stt++; ?>
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