<html lang="ko">
<head>
    <title>라라벨 포트폴리오</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <link href="{{ asset('/images/logo3.png') }}" type="image" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>

    <link rel="stylesheet" href="{{ asset('/css/BoardList.css') }}">
    @yield('stylesheet')
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    @yield('script')
</head>
<style>
    * { margin :0; padding:0;}
    a {text-decoration:none; color:#333; }
    a:hover {text-decoration: none;}
    li {list-style:none;}
    body{background:#f2f4f7;}
    @yield('style')
</style>
<body>
    @include('boards.partial.BoardList')
    @include('flash::message')
    @yield('content')
</body>

</html>
