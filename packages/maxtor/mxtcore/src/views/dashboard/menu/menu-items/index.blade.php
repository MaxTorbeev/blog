@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.menu') }} @endsection

@section('content')

    <a href="{{ route('admin.menu.create') }}" class="btn btn-outline-info">
        Добавить пункт меню
    </a>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Пункты меню
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm">
                <tbody>

                @foreach($menu as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="{{ route('admin.menu.edit', ['id' => $item->id]) }}">
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.menu-types.edit', ['menu_type' => $item->menuType->id]) }}">
                            {{ $item->menuType->name }}
                        </a>
                    </td>
                    <td><a href="{{ $item->url_path }}" target="_blank">{{ $item->url_path }}</a></td>
                    <td>
                        @if($item->published)
                            <span class="badge badge-success">Active</span>
                        @endif
                    </td>
                    <td>
                        @can('delete_menu_item', \MaxTor\MXTCore\Models\Menu::class)
                            <delete action="{{ route('admin.menu.destroy', ['id' => $item->id]) }}">X</delete>
                        @endcan
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection