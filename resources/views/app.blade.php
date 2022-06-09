<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trading KKN</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tempat untuk ngelist orang-orang yg pengin tuker KKN :D">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Trading KKN">
    <meta name="generator" content="Trading KKN">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href={{ asset('favicon"/site.webmanifest"') }}>

    <!-- ** Plugins Needed for the Project ** -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link href="{{ asset('kross/css/radio.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">
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
