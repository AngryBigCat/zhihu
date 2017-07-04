<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>知乎</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/amazeui/css/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="/amazeui/css/amazeui.min.css">
    <link rel="stylesheet" href="/amazeui/css/amazeui.cropper.css">
    <link rel="stylesheet" href="/amazeui/css/custom_up_img.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('style')
    <style type="text/css">
        .header{
            position: fixed;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('home.layouts._header')
        <div class="container">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
    
    <script src="/amazeui/js/amazeui.min.js" charset="utf-8"></script>
    <script src="/amazeui/js/cropper.min.js" charset="utf-8"></script>
</body>
</html>