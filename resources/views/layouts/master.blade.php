<html>
<head>
    <title>라라벨 포트폴리오</title>
    <link href="{{ asset('/images/logo3.png') }}" type="image" rel="shortcut icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/BoardList.css') }}">
    @yield('stylesheet')
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
    @yield('script')
</head>
<style>
    * { margin :0; padding:0;}
    a {text-decoration:none; color:#333; }
    a:hover {text-decoration: none;}
    li {list-style:none;}

    @yield('style')
</style>   
<body>
    @include('boards.partial.boardList')
    @include('flash::message')
    @yield('content')
</body>

</html>
