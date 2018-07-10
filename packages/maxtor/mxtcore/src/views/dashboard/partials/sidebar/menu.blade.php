<li class="nav-item  @if(count($item->children) > 0) nav-dropdown @endif">
    @if($item->url_path)
        <a
            href="{{ $item->url_path }}"
            class="
                nav-link @if(count($item->children) > 0) nav-dropdown-toggle @endif
                @if(\Route::currentRouteName() === $item->route_name) active @endif
            "
        >
            @if(count($item->parent)) - @endif {{ $item->title }}
        </a>
    @else
        {{ $item->title }}
    @endif

    @if (count($item->children) > 0)
        <ul class="nav-dropdown-items">
            @foreach($item->children as $item)
                @include('mxtcore::dashboard.partials.sidebar.menu', $item)
            @endforeach
        </ul>
    @endif
</li>
