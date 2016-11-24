@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование категории</h2>

    {!! Form::model($category, ['url' => route('categories.update', [$category->id]), 'files' => true, 'method' => 'PATCH']) !!}
    @include ('blog::dashboard.categories.form', ['submitButtonText' => 'Редактировать категорию'])
    {!! Form::close() !!}
@endsection