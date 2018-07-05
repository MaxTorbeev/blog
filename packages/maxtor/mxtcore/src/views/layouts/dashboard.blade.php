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
    <link href="{{ asset('/css/reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.dashboard.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token(), ]); ?>
    </script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">

    @include('mxtcore::dashboard.partials.header')

    <div id="app" class="app-body">
        <div class="sidebar">
            @include('mxtcore::dashboard.partials.sidebar')
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        <main class="main">
            <div class="container-fluid">
                <div class="content_topBar">
                    <div class="row">
                        <div class="col-sm-8">
                            <h1 class="content_pageHeader">
                                @if( !empty($page->title) )
                                    {{ $page->title }}
                                @endif
                            </h1>
                        </div>
                        <div class="col-sm-4">
                            <ul class="nav navbar-nav float-sm-right">
                                @if (!Auth::guest())
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
                    </div>

                </div>
                <div class="content_main">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <footer class="app-footer">
        @include('mxtcore::dashboard.partials.footer')
        @include('partials.flash')
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}"></script>

    @if(session('flash'))
        <script>
            document.addEventListener('DOMContentLoaded', flash('{{ session('flash') }}') );
        </script>
    @endif
</body>
</html>
