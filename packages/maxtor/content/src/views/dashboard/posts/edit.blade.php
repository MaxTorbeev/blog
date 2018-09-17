@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.content.posts.edit', $post) }} @endsection

@section('content')
    <h2>Редактирование материала</h2>

    {!! Form::model($post, ['url' =>  route('admin.posts.update', [$post->id]), 'files' => true, 'method' => 'PATCH']) !!}
        @include ('content::dashboard.posts.form', [
            'submitButtonText'  => 'Редактировать материал',
            'deletePost'        => 'true'
        ])
    {!! Form::close() !!}
@endsection