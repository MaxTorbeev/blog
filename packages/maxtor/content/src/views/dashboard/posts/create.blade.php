@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.content.posts.create') }} @endsection

@section('content')
    <h1>Новая статья</h1>

    {!! Form::model($post = new \MaxTor\Content\Models\Post(), ['url' => route('admin.posts.store'), 'files' => true]) !!}
        @include ('content::dashboard.posts.form', ['submitButtonText' => 'Добавить новый материал' ])
    {!! Form::close() !!}
@stop