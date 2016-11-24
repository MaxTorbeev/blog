@extends('mxtcore::layouts.dashboard')

@section('content')
    <table class="table table-sm ">
        <thead class="thead-inverse">
        <tr>
            <th>Заголовок материала</th>
            <th>Категория</th>
            <th>Автор</th>
            <th>Просмотры</th>
            <th>id</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td><a href="{{ url( '/admin/' . $page->alias . '/edit', [1]) }}">{{ $post->title }}</a></td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->hits }}</td>
                <th scope="row">{{ $post->id }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection