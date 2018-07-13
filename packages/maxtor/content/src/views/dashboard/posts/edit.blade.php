@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование материала</h2>

    <a href="{{ route('post.show', [$post->slug]) }}" target="_blank">Перейти на страницу</a>

    {!! Form::model($post, ['url' =>  route('admin.posts.update', [$post->id]), 'files' => true, 'method' => 'PATCH']) !!}
        @include ('content::dashboard.posts.form', [
            'submitButtonText'  => 'Редактировать материал',
            'deletePost'        => 'true'
        ])
    {!! Form::close() !!}
@endsection