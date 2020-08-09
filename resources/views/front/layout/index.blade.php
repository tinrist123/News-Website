<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href=" {{ asset('public/front/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('public/front/css/shop-homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('public/front/css/my.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')
    <!-- jQuery -->
    <script src="{{ asset('public/front/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('public/front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/front/js/my.js') }}"></script>

    @yield('script')
</body>

</html>

<script>
    $(document).ready(function() {
        $("#changePassword").change(function() {
            if ($(this).is(":checked")) {
                $(".password").removeAttr('disabled');
            } else {
                $(".password").attr('disabled', '');
            }
        });
    });
</script>