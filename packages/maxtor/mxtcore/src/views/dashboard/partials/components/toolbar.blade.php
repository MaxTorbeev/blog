
<nav class="navbar navbar-toggleable-md navbar-light bg-faded mb-1">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            @foreach($menu as $item)
            <li class="nav-item active">
                <a href="{{ $item['url'] }}" class="btn btn-primary btn btn-sm mr-1">{{ $item['title'] }}</a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>