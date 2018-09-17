@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($tag = new \MaxTor\Content\Models\Tag(), ['url' => 'tags', 'files' => true]) !!}
    @include ('content::dashboard.tags.form', ['submitButtonText' => 'Добавить новый тег' ])
    {!! Form::close() !!}

@stop