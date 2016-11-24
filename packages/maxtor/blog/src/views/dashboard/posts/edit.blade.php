@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование материала</h2>

    {!! Form::model($post, ['url' =>  route('post.update', [$post->id]), 'files' => true, 'method' => 'PATCH']) !!}
        @include ('blog::form', ['submitButtonText' => 'Редактировать материал'])
    {!! Form::close() !!}
@endsection