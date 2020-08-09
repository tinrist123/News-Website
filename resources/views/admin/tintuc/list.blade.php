@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Hình Ảnh</th>
                        <th>Tiêu Đề</th>
                        <th>Tóm Tắt</th>
                        <th>Thể Loại</th>
                        <th>Loại Tin</th>
                        <th>Số Lượt Xem</th>
                        <th>Nổi Bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach($tintuc as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>
                            <img style=" width:100%;" src="{{ asset('public/upload/tintuc/' . $item->Hinh) }}" alt="">
                        </td>
                        <td>{{ $item->TieuDe  }}</td>
                        <td>{{ $item->TomTat }}</td>
                        <td>{{ $item->loaitin->Ten }}</td>
                        <td>{{ $item->loaitin->theloai->Ten }}</td>
                        <td>{{ $item->SoLuotXem }}</td>
                        <td>{{ $item->NoiBat  }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có muốn xóa sản phẩm này ?') " href="{{ url('admin/tintuc/delete',$item->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/tintuc/edit',$item->id) }}">Edit</a></td>
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