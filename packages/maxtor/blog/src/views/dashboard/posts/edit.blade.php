@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование материала</h2>

    <a href="{{ route('post.show', [$post->alias]) }}" target="_blank">Перейти на страницу</a>

    {!! Form::model($post, ['url' =>  route('post.update', [$post->id]), 'files' => true, 'method' => 'PATCH']) !!}
        @include ('blog::dashboard.posts.form', [
        'submitButtonText' => 'Редактировать материал',
        'deletePost' => 'true'
        ])
    {!! Form::close() !!}
    <h3>Добавить изображения</h3>
    {!! Form::model(
           $post,
           [
               'action' => ['\MaxTor\Blog\Controllers\PostsController@addPhoto', $post->alias],
               'id' => 'addPhotoForm',
               'class' => 'dropzone',
               'files' => true
           ])
       !!}
    {!! Form::close() !!}

    <form method="POST" action="{{ route('post.destroy', [$post->id]) }}">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit">Delete Post</button>
    </form>
@endsection