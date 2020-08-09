@extends('front.layout.index')
@section('title') Tin Tức @endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $tintuc->TieuDe}}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">Tín Ngô</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{ asset('public/upload/tintuc/'.$tintuc->Hinh) }}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $tintuc->created_at }} </p>
            <hr>
            <!-- Post Content -->
            <p class="lead">{!! $tintuc->NoiDung !!}</p>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::check())
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form method="post" role="form" action="{{ url('comment/'.$tintuc->id) }}">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="txtContent" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

            <hr>
            @endif
            <!-- Posted Comments -->

            <!-- Comment -->
            @if (Session::has('flash_message'))
            <div class="alert alert-warning alert-{{ Session::get('atr') }}">
                {{ Session::get('flash_message') }}
            </div>
            @endif
            @foreach($comments as $cmt)
            <div class="media">
                <a class="pull-left" href="#">
                    <img style="width:70px ;" class="media-object" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $cmt->user->name }}
                        <small>{{ $cmt->created_at }} </small>
                    </h4>
                    {{ $cmt->NoiDung }}
                </div>
            </div>
            @endforeach


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    @foreach($tinlienquan as $itemLienQuan)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'. $itemLienQuan->id .'/'. $itemLienQuan->TieuDeKhongDau) }}">
                                <img class="img-responsive" src="{{ asset('public/upload/tintuc/'.$itemLienQuan->Hinh) }}" alt="">
                            </a>
                        </div>
                        <!-- // -->
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$itemLienQuan->id.'/'.$itemLienQuan->TieuDeKhongDau) }}"><b> {{ $itemLienQuan->TieuDe }}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                    @foreach($tinnoibat as $itemNoiBat)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'.$itemNoiBat->id.'/'.$itemNoiBat->TieuDeKhongDau) }}">
                                <img class="img-responsive" src="{{ asset('public/upload/tintuc/'.$itemNoiBat->Hinh) }}" alt="">
                            </a>
                        </div>
                        <!--  -->
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$itemNoiBat->id.'/'.$itemNoiBat->TieuDeKhongDau) }}"><b>{{ $itemNoiBat->TieuDe }}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach

                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection