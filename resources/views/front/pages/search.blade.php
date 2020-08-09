@extends('front.layout.index')
@section('title') Category @endsection
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">
        @include('front.layout.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Tìm Kiếm : {{ $keyword }}</b></h4>
                </div>
                @if(count($tintuc) > 0)
                @foreach($tintuc as $item)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="{{ url('tintuc/'.$item->id.'/'.$item->TieuDeKhongDau) }}">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="{{ asset('public/upload/tintuc/'.$item->Hinh) }}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{!! doimau($item->TieuDe,$keyword) !!}</h3>
                        <p>{!! doimau($item->TomTat,$keyword) !!}</p>
                        <a class="btn btn-primary" href="{{ url('tintuc/'.$item->id.'/'.$item->TenKhongDau) }}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach

                <div style="text-align: center;">
                    {{ $tintuc->links() }}
                </div>
                @else
                <h2>Không thể tìm được</h2>

                @endif
            </div>
        </div>

    </div>

</div>
<!-- end Page Content -->
@endsection


<?php
function doimau($str, $keyword)
{
    return str_replace($keyword, "<span style='color:red;'>$keyword</span>", $str);
}
?>