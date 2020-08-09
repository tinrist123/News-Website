@extends('admin.master')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.blocks.error')
                <form action="" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label>Tên Slide</label>
                        <input class="form-control" name="txtTen" placeholder="Please Enter Slide" value="{{ old('txtTen') }}" />
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
                        <label>Link</label>
                        <input class="form-control" name="txtLink" placeholder=" Please Enter Link" value="{{ old('txtLink') }}" />
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="fImages">
                    </div>
                    <button type="submit" class="btn btn-default">User Add</button>
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