@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.content.posts') }} @endsection

@section('content')

    <ul class="nav nav-pills mb-2">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.posts.create') }}">Добавить пост</a>
        </li>
    </ul>

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
                <td><a href="{{ route('admin.posts.index')  }}">{{ $post->title }}</a></td>
                <td>{{ $post->category->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{ $post->hits }}</td>
                <th scope="row">{{ $post->id }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection