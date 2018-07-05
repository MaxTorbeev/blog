@extends('mxtcore::layouts.dashboard')

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

                @foreach($menuItems as $item):
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="{{ route('admin.menu.edit', ['id' => $item->id]) }}">
                            {{ $item->title }}
                        </a>
                    </td>
                    <td><a href="{{ $item->url_path }}" target="_blank">{{ $item->url_path }}</a></td>
                    <td>
                        @if($item->published)
                            <span class="badge badge-success">Active</span>
                        @endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection