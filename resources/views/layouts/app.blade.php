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
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet" integrity="sha384-Li5uVfY2bSkD3WQyiHX8tJd0aMF91rMrQP5aAewFkHkVSTT2TmD2PehZeMmm7aiL" crossorigin="anonymous">    
    {{-- <link href="/twbs/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="/summernote/summernote.css" rel="stylesheet">
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
    <script src="/summernote/summernote.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $(document).ready(function(){
            $('#summernote').summernote();
        });
    </script>
</body>
</html>
