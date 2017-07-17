<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="/amazeui/css/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="/amazeui/css/amazeui.min.css">
    <link rel="stylesheet" href="/amazeui/css/amazeui.cropper.css">
    <link rel="stylesheet" href="/amazeui/css/custom_up_img.css">
    <link rel="stylesheet" type="text/css" href="/css/jquery.pinwheel-0.1.0.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('style')
</head>
<body>
    <div id="app">
        @include('home.layouts._header')
        <div class="container">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="/js/jquery.pinwheel-0.1.0.js"></script>
    
    @yield('script')
</body>
</html>