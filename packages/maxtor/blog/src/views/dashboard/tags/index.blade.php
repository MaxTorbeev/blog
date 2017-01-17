@extends('mxtcore::layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col col-5">
            {!! Form::model($tag = new \MaxTor\Blog\Models\Tag(), ['url' => route('tags.store'), 'files' => true]) !!}
                @include ('blog::dashboard.tags.form', ['submitButtonText' => 'Добавить новый тег' ])
            {!! Form::close() !!}
        </div>
        <div class="col col-7">
            <table class="table table-sm ">
                <thead class="thead-inverse">
                <tr>
                    <th>Тег</th>
                    <th>Материалы</th>
                    <th>Автор</th>
                    <th>Алиас</th>
                    <th>id</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td><a href="{{ url( '/admin/' . $page->alias . '/edit', [$tag->id]) }}">{{ $tag->name }}</a></td>
                        <td>{{ count($tag->posts) }}</td>
                        <td>
                            {{ $tag->author->name }}
                        </td>
                        <td>{{ $tag->alias }}</td>
                        <th scope="row">{{ $tag->id }}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop