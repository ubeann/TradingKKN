<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trading KKN</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Creative Portfolio Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Trading KKN">
    <meta name="generator" content="Trading KKN">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('kross/plugins/bootstrap/bootstrap.min.css') }}"> --}}
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('kross/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('kross/plugins/themify-icons/themify-icons.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('kross/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="{{ asset('kross/css/primary.css') }}" rel="stylesheet">
    <link href="{{ asset('kross/css/checkbox.css') }}" rel="stylesheet">
</head>

<body>
    {{-- <x-navbar /> --}}
    @yield('content')
    <!-- jQuery -->
    <script src="{{ asset('kross/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    {{-- <script src="{{ asset('kross/plugins/bootstrap/bootstrap.min.js') }}"></script> --}}
    <!-- slick slider -->
    <script src="{{ asset('kross/plugins/slick/slick.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('kross/plugins/shuffle/shuffle.min.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('kross/js/script.js') }}"></script>

    @yield('script')
</body>
