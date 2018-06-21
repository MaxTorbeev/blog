@extends('mxtcore::layouts.dashboard')

@section('content')


    @include('mxtcore::dashboard.partials.components.toolbar', [
        'menu' => [
                [
                    'url'      => route('dashboard.components', ['alias' => $page->alias, 'method' => 'addUser']),
                    'title'    => 'Добавить пользователя'
                ]
            ]
    ])

    @can('edit_forum')
        <h1>Редактирование форума</h1>
    @endcan

    <table class="table table-sm ">
        <thead class="thead-inverse">
        <tr>
            <th>Пользователь</th>
            <th>Email</th>
            <th>Роли</th>
            <th>Создан</th>
            <th>id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><a href="{{ route('dashboard.components', ['alias' => $page->alias, 'method' => 'edit', 'id' => $user->id ]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                        {{ $role->label }}
                    @endforeach
                </td>
                <td>{{ $user->created_at }}</td>
                <th scope="row">{{ $user->id }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection