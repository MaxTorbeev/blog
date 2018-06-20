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

    <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    @yield('meta')

    <title>{{ config('mxtcore.title', 'MaxTor blog') }}</title>
    <link href="{{ asset('/css/reboot.css') }}" rel="stylesheet">
    <script>window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token(), ]); ?></script>
</head>
<body class="frontend">
    <div id="app" class="frontend_container">
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

        @yield('scripts.footer')
        @include('partials.flash')

    </div>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/app.js') }}"></script>

    @if (Request::server ("SERVER_NAME") == 'maxtor.name' || Request::server ("SERVER_NAME") == 'www.maxtor.name')
        {{--Yandex.Metrika counter--}}
        <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter28282586 = new Ya.Metrika({ id:28282586, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/28282586" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    @endif

</body>
</html>
