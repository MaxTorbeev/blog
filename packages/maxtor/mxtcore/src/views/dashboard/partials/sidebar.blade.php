@if($dashboardMenu !== null)
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            @foreach($dashboardMenu as $item)
                @include('mxtcore::dashboard.partials.sidebar.menu')
            @endforeach
        </ul>
    </nav>
@endif
