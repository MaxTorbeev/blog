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

    <title>{{ config('mxtcore.title', 'MaxTor blog') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token(), ]); ?>
    </script>
</head>
<body>
<nav class="navbar navbar-light bg-faded">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">MaxTor.name v 2</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active"> <a class="nav-link" href="#">Главная <span class="sr-only">(current)</span></a></li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">Блог</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Портфолио</a></li>
            @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="{{ url('/logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>

@yield('scripts.footer')

@include('partials.flash')

</body>
</html>