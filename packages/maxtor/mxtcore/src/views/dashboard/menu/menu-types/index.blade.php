@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.menu-types') }} @endsection

@section('content')
    <a href="{{ route('admin.menu-types.create') }}" class="btn btn-outline-info">
        Добавить тип меню
    </a>

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Типы меню
        </div>
        <div class="card-body">
            <table class="table table-responsive-sm">
                <tbody>

                @foreach($menuTypes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="{{ route('admin.menu-types.edit', ['id' => $item->id]) }}">
                            {{ $item->name }}
                        </a>
                    </td>
                    <td>
                        @if($item->published)
                            <span class="badge badge-success">Active</span>
                        @endif
                    </td>
                    <td>
                        @can('delete_menu_item', \MaxTor\MXTCore\Models\Menu::class)
                            <delete action="{{ route('admin.menu-types.destroy', ['id' => $item->id]) }}">X</delete>
                        @endcan
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

@endsection