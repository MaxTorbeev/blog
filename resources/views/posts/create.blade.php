@extends('layouts.app')

@section('content')
    <h1>Create new post</h1>
    <hr>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($article = new \App\Posts\Models\Post(), ['url' => 'posts', 'files' => true]) !!}
    @include ('posts.form', ['submitButtonText' => 'Добавить новый материал' ])
    {!! Form::close() !!}

@stop