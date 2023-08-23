<html>
<head>
     <title>{{ __('messages.title') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Bootstrap CSS end -->
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap JS and jQuery end-->
    <!-- Ajax start -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Ajax end -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <!--header start-->
        <div id="appheader">@include('header')</div>
    <!-- header end-->
    <!--content start-->
        <div id="appcontent">@include('content')</div>
    <!-- content end-->

    <!--footer start-->

    <!--footer end-->
</body>
</html>