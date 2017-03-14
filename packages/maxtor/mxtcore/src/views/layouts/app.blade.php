<!DOCTYPE html>
<html lang="ru">
<head>
    <base href="{{ config('mxtcore.baseUrl') }}" target="_top">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ config('mxtcore.keywords') }}">
    <meta name="description" content="{{ config('mxtcore.description') }}">
    <meta name="generator" content="{{ config('mxtcore.generator') }}">

    @yield('meta')

    <title>{{ config('mxtcore.title', 'MaxTor blog') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token(), ]); ?>
    </script>
</head>
<body class="frontend">
    <div class="frontend_container">
        <aside class="col-lg-2 col-md-3 frontend_aside">

            <a class="navbar_brand" href="{{ url('/') }}">MaxTor.name</a>

            <ul class="navbar_mainmenu navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Блог</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('post.index') }}">Технологии</a></li>
            </ul>

            <div class="navbar_mainmenu-bottom">
                <ul class="navbar_mainmenu navbar-nav">
                    @if (Auth::guest())
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Вход</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Регистрация</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('/admin') }}">Dashboard</a></li>
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </li>
                    @endif
                </ul>
            </div>

        </aside>

        <main class="col-lg-10 col-md-9 frontend_main">
            <div class="row">
                <div class="col-sm-9">
                    @yield('content')
                </div>
                <div class="col-sm-3">
                    @yield('sidebar')
                </div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="/js/app.js"></script>

        @yield('scripts.footer')

        @include('partials.flash')

    </div>

</body>
</html>
