<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">
    <title>Admin - Tín Ngô</title>

    <!-- Ckedit -->
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="https://unpkg.com/metismenu/dist/metisMenu.min.css">


    <!-- Custom CSS -->
    <link href="{{ url('public/admin/dist/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{ url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }} " rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ url('public/admin/bower_components/datatables-responsive/css/dataTables.responsive.css') }} " rel="stylesheet">
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://unpkg.com/metismenu"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin Area - Tín Ngô</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <?php
                $user_login = Auth::user();
                ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>
                                {{ $user_login->name}}
                            </a>
                        </li>
                        <li><a href="{{ url('admin/user/edit',$user_login->id) }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href=" {{ url('admin/logout') }} "><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/theloai/list') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Thể Loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/theloai/list') }}">List Thể Loại</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/theloai/add') }}">Add Thể Loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Loại Tin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/loaitin/list') }}">Danh Sách Loại Tin</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/loaitin/add') }}">Thêm Loại Tin</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="far fa-cube fa-fw"></i>Tin Tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/tintuc/list') }}">Danh Sách Tin Tức</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/tintuc/add') }}">Thêm Tin Tức</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="far fa-cube fa-fw"></i>Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/slide/list') }}">Danh Sách Slide</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/slide/add') }}">Thêm Slide</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/user/list') }}">Danh Sách User</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/user/add') }}">Thêm User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


        <!-- /.col-lg-12 -->
        <div class="col-lg-12 pt-4" style="margin-left:250px; padding-top: 3em;">
            @if (Session::has('flash_message'))
            <div class="alert alert-success alert-{{ Session::get('atr') }}">
                {{ Session::get('flash_message') }}
            </div>
            @endif
        </div>
        <!--  Đây Là nơi chứa nội dung -->
        @yield('content')
        <!-- End Là nơi chứa nội dung -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('public/admin/bower_components/jquery/dist/jquery.min.js') }} "></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }} "></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('public/admin/bower_components/metisMenu/dist/metisMenu.min.js') }} "></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('public/admin/dist/js/sb-admin-2.js') }}"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="{{ url('public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }} "></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable();
        });

        $("div.alert").delay(2500).slideUp();

        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>

    <script src="{{ asset('resources/js/ajaxAdding.js') }}"></script>
    <script src="{{ asset('public/admin/js/ajaxTinTuc.js') }}"></script>

</body>

</html>