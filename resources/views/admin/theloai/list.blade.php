@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể Loại
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>alias</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach($theloai as $item)
                    <tr class="even gradeC" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item->Ten }}</td>
                        <td>{{ $item->TenKhongDau }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có muốn xóa thật không !')" href="{{ url('admin/theloai/delete',$item->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/theloai/edit',$item->id) }}">Edit</a></td>
                    </tr>
                    <?php $stt++;  ?>
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