<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Admin - Khoa Phạm</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link rel="stylesheet" href="https://unpkg.com/metismenu/dist/metisMenu.min.css">


    <!-- Custom CSS -->
    <link href="{{ url('public/admin/dist/css/sb-admin-2.css') }} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/admin/bower_components/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="col-lg-12 pt-4" style="margin:2em 0;">
                    @if (Session::has('flash_message'))
                    <div class="alert alert-success alert-warning">
                        {{ Session::get('flash_message') }}
                    </div>
                    @endif
                </div>
                <div class="col-md-12">
                    @include('admin.blocks.error')
                </div>

                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="POST">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="txtUser" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="txtPass" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        $("div.alert").delay(2500).fadeOut();

        function xacnhanxoa(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>
</body>

</html>