<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('images/template/logo_small.svg') }}" width="120" alt="{{ config('mxtcore.title', 'MaxTor blog') }}">
        <img class="navbar-brand-minimized" src="{{ asset('images/template/logo_small.svg') }}" width="30" height="30" alt="{{ config('mxtcore.title', 'MaxTor blog') }}">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin.menu.index') }}">Пункты меню</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('admin.users.index') }}">Пользователи</a>
        </li>
        <li class="nav-item px-3">
            <a class="nav-link" href="#">Settings</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-list"></i>
            </a>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" href="#">
                <i class="icon-location-pin"></i>
            </a>
        </li>
        <li class="nav-item dropdown">

            <ul class="nav navbar-nav float-sm-right">
                @if (!Auth::guest())

                @endif
            </ul>

            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-bell-o"></i> Updates
                    <span class="badge badge-info">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-tasks"></i> Tasks
                    <span class="badge badge-danger">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-comments"></i> Comments
                    <span class="badge badge-warning">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i> Profile
                </a>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> Settings
                </a>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-usd"></i> Payments
                    <span class="badge badge-secondary">42</span>
                </a>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-file"></i> Projects
                    <span class="badge badge-primary">42</span>
                </a>
                <div class="divider"></div>

                <a class="dropdown-item" href="#">
                    <i class="fa fa-shield"></i> Lock Account
                </a>

                <a class="dropdown-item" href="{{ url('/logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>