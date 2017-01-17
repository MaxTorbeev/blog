@extends('mxtcore::layouts.dashboard')

@section('content')

    <nav class="navbar navbar-toggleable-md navbar-light bg-faded mb-1">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link btn btn-success" href="{{ route('dashboard.components', ['alias' => $page->alias, 'method' => 'create']) }}">Добавить тег</a>
                </li>
            </ul>
        </div>
    </nav>

    <table class="table table-sm ">
        <thead class="thead-inverse">
        <tr>
            <th>Заголовок категории</th>
            <th>Материалы</th>
            <th>Автор</th>
            <th>Просмотры</th>
            <th>id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
        <tr>
            <td><a href="{{ url( '/admin/' . $page->alias . '/edit', [$tag->id]) }}">{{ $tag->title }}</a></td>
            <td>{{ count($tag->posts) }}</td>
            <td>{{ $tag->author->name }}</td>
            <td>{{ $tag->hits }}</td>
            <th scope="row">{{ $tag->id }}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop