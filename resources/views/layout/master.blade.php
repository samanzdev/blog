<!doctype html>
<html lang="fa">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('assets/img/favicon.png') }}">

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body class="rtl">
<!-- Navigation-->
@include('layout.navigation')
<!--/-->

<!--category-->
@yield('category')
<!--/-->

<!--blog-grid-->
@yield('main')
<!--/-->

<!--newslettre-->
@include('layout.newslettre')
<!--/-->

<!--footer-->
@include('layout.footer')
<!--/-->

<!--Search-form-->
@include('layout.searchForm')
<!--/-->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- JS Plugins  -->
<script src="{{ asset('assets/js/switch.js') }}"></script>

<!-- JS main  -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@yield('script')
@include('sweet::alert')
</body>

</html>
