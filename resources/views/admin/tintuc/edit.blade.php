@extends('admin.master')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
    
            <form action="" method="POST" name="frmEditProduct" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label>Chọn Loại thể loại</label>
                    <select class="form-control" name="theloai_id" id="js-theloai_id">
                        <option value="">Chọn Thể Loại</option>
                        <?php showOption($parent_theloai, $idTheLoai); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Chọn Loại loại tin</label>
                    <select class="form-control" name="loaitin_id" id="js-loaitin_id">
                        <option value="">Chọn Loại Tin</option>
                        <?php showOption($parent_loaitin, $idLoaiTin); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tiêu Đề</label>
                    <input class="form-control" name="txtTieuDe" placeholder="Please Enter Username" value="{{ old('txtTieuDe', isset($tintuc)?$tintuc['TieuDe']:null) }}" />
                </div>
                <div class="form-group">
                    <label>Tóm Tắt</label>
                    <textarea class="form-control" rows="3" id="txtTomTat" name=" txtTomTat" value="">{{ old('txtTomTat', isset($tintuc)?$tintuc['TomTat']:null) }}</textarea>
                    <!-- CKEDITOR -->
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#txtTomTat'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </div>
                <div class="form-group">
                    <label>Nội Dung</label>
                    <textarea class="form-control" rows="3" id="txtContent" name="txtContent" value="">{{ old('txtContent', isset($tintuc)?$tintuc['NoiDung']:null) }}</textarea>
                    <!-- CKEDITOR -->
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#txtContent'))
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </div>
                <div class="form-group">
                    <label>Hình Ảnh</label>
                    <img style="width:170px;" src="{{ asset('public/upload/tintuc/' . $tintuc->Hinh) }}" alt="">
                    <input type="file" name="fImages">
                </div>
                <div class="form-group">
                    <label>Nổi Bật</label>
                    <label class="radio-inline">
                        <input name="rdoLevel" checked value="1" type="radio">Có
                    </label>
                    <label class="radio-inline">
                        <input name="rdoLevel" value="0" type="radio">Không
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Thêm Tin Tức</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </form>
        </div>
    </div>

</div>

<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bình Luận
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nội Dung</th>
                        <th>Ngày Đăng</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    @foreach ($tintuc->comment as $cmt)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt  }}</td>
                        <td>{{ $cmt->user->name  }}</td>
                        <td>{{ $cmt->NoiDung  }}</td>
                        <td>{{ $cmt->created_at  }}</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ url('admin/comment/delete',$cmt->id) }}">Delete</a></td>
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

@endsection