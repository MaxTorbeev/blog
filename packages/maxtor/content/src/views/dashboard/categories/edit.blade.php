@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование категории</h2>

    {!! Form::model($category, ['url' => route('admin.categories.update', [$category->id]), 'files' => true]) !!}
    @method('PATCH')
    @include ('content::dashboard.categories.form', ['submitButtonText' => 'Редактировать категорию'])
    {!! Form::close() !!}
@endsection