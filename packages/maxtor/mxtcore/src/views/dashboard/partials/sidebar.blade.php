<nav class="sidebar">
    <div class="sidebar_logo">
        MXTCore
    </div>
    <ul class="sidebar_menu">
        @foreach($dashboardMenu as $item)
        <li><a href="{{ route('dashboard.components', ['alias' => $item->alias]) }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</nav>