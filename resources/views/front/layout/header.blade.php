 <!-- Navigation -->
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
     <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="{{ url('/') }}">Laravel Tin Tức</a>
         </div>
         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
                 <li>
                     <a href="#">Giới thiệu</a>
                 </li>
                 <li>
                     <a href="{{ url('contact-us') }}">Liên hệ</a>
                 </li>
             </ul>

             <form class="navbar-form navbar-left" role="search" method="post" action="search">
                 @csrf
                 <div class="form-group">
                     <input type="text" name="keyword" class="form-control" placeholder="Search">
                 </div>
                 <button type="submit" class="btn btn-default">Submit</button>
             </form>

             <ul class="nav navbar-nav pull-right">
                 @if(!Auth::check())
                 <li>
                     <a href="{{ url('register') }}">Đăng ký</a>
                 </li>
                 <li>
                     <a href="{{ url('login') }}">Đăng nhập</a>
                 </li>
                 @endif
                 @if(Auth::check())
                 <li>
                     <?php
                        $alias = convert_vi_to_en(Auth::user()->name);
                        ?>
                     <a href="{{ url('user/'.Auth::user()->id.'/'. $alias ) }}">
                         <span class="glyphicon glyphicon-user"></span>
                         {{ Auth::user()->name }}
                     </a>
                 </li>
                 <li>
                     <a href="{{ url('logout') }}">Đăng xuất</a>
                 </li>
                 @endif

             </ul>
         </div>
         <!-- /.navbar-collapse -->
     </div>
     <!-- /.container -->
 </nav>