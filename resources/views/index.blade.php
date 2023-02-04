<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome-4.3.0/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style1.css') }}" />
    <script src="{{asset('assets/js/modernizr.custom.js')}}"></script>
    <title>Реактивная улитка</title>
</head>
<body>

<div id="app">
    <div class="container">
        <button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
        <v-menu></v-menu>
        <router-view></router-view>
    </div>


{{--    <router-view></router-view>--}}
</div>
<script src="{{ asset('assets/js/classie.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="/js/app.js"></script>
</body>
</html>
