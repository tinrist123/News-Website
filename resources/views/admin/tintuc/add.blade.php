@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.blocks.error')
                <form id="addingNewsForm" action="" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label>Chọn Loại thể loại</label>
                        <select class="form-control" name="theloai_id" id="js-theloai_id">
                            <option value="">Chọn Thể Loại</option>
                            <?php showOption($parent_theloai, 0); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Chọn Loại loại tin</label>
                        <select class="form-control" name="loaitin_id" id="js-loaitin_id">
                            <option value="">Chọn Loại Tin</option>
                            <?php showOption($parent_loaitin, 0); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="txtTieuDe" placeholder="Please Enter Username" value="{{ old('txtName') }}" />
                    </div>
                    <div class="form-group">
                        <label>Tóm Tắt</label>
                        <textarea class="form-control" rows="3" id="txtTomTat"" name=" txtTomTat" value="{{ old('txtContent') }}"></textarea>
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
                        <textarea class="form-control" rows="3" id="txtContent" name="txtContent" value="{{ old('txtContent') }}"></textarea>
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
                        <input type="file" name="fImages">
                    </div>
                    <div class="form-group">
                        <label>Nổi Bật</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="0" checked="" type="radio">Không
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
@endsection