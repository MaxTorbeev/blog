@extends('mxtcore::layouts.dashboard')

@section('content')
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
        @foreach($categories as $category)
        <tr>
            <td><a href="{{ url( '/admin/' . $page->alias . '/edit', [1]) }}">{{ $category->title }}</a></td>
            <td>{{ count($category->posts) }}</td>
            <td>{{ $category->author->name }}</td>
            <td>{{ $category->hits }}</td>
            <th scope="row">{{ $category->id }}</th>
        </tr>
        @endforeach
        </tbody>
    </table>
@stop