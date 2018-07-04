@if($dashboardMenu !== null)
    <nav class="sidebar-nav">
        <ul class="nav">
            @foreach($dashboardMenu as $item)
                @include('mxtcore::dashboard.partials.sidebar.menu')
            @endforeach
            {{--@each('mxtcore::dashboard.partials.sidebar.menu', $dashboardMenu, 'item', '')--}}
        </ul>
    </nav>
@endif