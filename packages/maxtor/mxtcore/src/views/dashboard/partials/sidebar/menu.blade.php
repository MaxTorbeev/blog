<li class="nav-item nav-dropdown">
    <a class="nav-link" href="{{ route('dashboard.components'). '/' . $item->alias }}" >
        {{ $item->title }}
    </a>
    @if (count($item->children) > 0)
        <ul class="nav">
            @foreach($item->children as $item)
                @include('mxtcore::dashboard.partials.sidebar.menu', $item)
            @endforeach
        </ul>
    @endif
</li>
