<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <title>@if(Request::is('/')) {{ config('app.name') }} @endif @yield('title')</title>

    <!-- Styles -->
    <link href="/twbs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>        
    <!-- Scripts -->
    <script src="/jquery/jquery.min.js"></script>
    <script src="/twbs/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
