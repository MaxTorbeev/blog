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
    <link href="/css/app.dashboard.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([ 'csrfToken' => csrf_token(), ]); ?>
    </script>
</head>
<body class="dashboard">

<div class="container dashboard_container">
    <div class="row dashboard_row">
        <aside class="col-lg-2 col-md-3 dashboard_aside">
            @include('mxtcore::dashboard.partials.sidebar')
        </aside>

        <main class="col-lg-10 col-md-9 dashboard_main">
            @yield('content')
        </main>
    </div>


    <footer class="dashboard_footer">
        @include('mxtcore::dashboard.partials.footer')
    </footer>

</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
