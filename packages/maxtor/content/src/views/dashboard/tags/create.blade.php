@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($tag = new \MaxTor\Blog\Models\Tag(), ['url' => 'tags', 'files' => true]) !!}
    @include ('blog::dashboard.tags.form', ['submitButtonText' => 'Добавить новый тег' ])
    {!! Form::close() !!}

@stop