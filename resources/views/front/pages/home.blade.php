 @extends('front.layout.index')

 @section('content')
 <!-- Page Content -->
 <div class="container">

     @include('front.layout.slide')

     <div class="space20"></div>


     <div class="row main-left">
         @include('front.layout.menu')

         <div class="col-md-9">
             <div class="panel panel-default">
                 <div class="panel-heading" style="background-color:#337AB7; color:white;">
                     <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                 </div>

                 <div class="panel-body">
                     <!-- item -->
                     @foreach($theloai as $item)
                     @if (count($item->loaitin) > 0)
                     <div class="row-item row">
                         <h3>
                             <a href="category.html"> {{ $item->Ten }}</a>
                             @foreach ($item->loaitin as $loaitin)
                             <small><a class="text-muted" href="{{ url('loaitin/'.$loaitin->id.'/'.$item->TenKhongDau) }}"><i>{{ $loaitin->Ten }}</i></a> / </small>
                             @endforeach
                         </h3>
                         <?php
                            $data = $item->tintuc->where('NoiBat', 1)->sortByDesc('id')->take(5);

                            $firstNews = $data->shift(); // Trả về kiểu mảng
                            ?>
                         <div class="col-md-8 border-right">
                             <div class="col-md-5">
                                 <a href="{{ url('tintuc/'.$firstNews->id.'/'.$firstNews->TieuDeKhongDau) }}">
                                     <img class="img-responsive" src="{{ asset('public/upload/tintuc/'. $firstNews['Hinh']) }}" alt="">
                                 </a>
                             </div>

                             <div class="col-md-7">
                                 <h3>{{ $firstNews['TieuDe'] }}</h3>
                                 <p>{{ $firstNews['TomTat'] }}</p>
                                 <a class="btn btn-primary" href="{{ url('tintuc/'.$firstNews->id.'/'.$firstNews->TieuDeKhongDau) }}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                             </div>

                         </div>

                         <div class="col-md-4">
                             @foreach($data as $news)
                             <a href="{{ url('tintuc/'.$news->id.'/'.$news->TieuDeKhongDau.'-news') }}">
                                 <h4>
                                     <span class="glyphicon glyphicon-list-alt"></span>
                                     {{ $news->TieuDe}}
                                 </h4>
                             </a>
                             @endforeach
                         </div>

                         <div class="break"></div>
                     </div>
                     @endif
                     @endforeach
                     <!-- end item -->

                 </div>
             </div>
         </div>
     </div>
     <!-- /.row -->
 </div>
 <!-- end Page Content -->
 @endsection