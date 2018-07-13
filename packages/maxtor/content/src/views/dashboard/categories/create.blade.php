@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Создание новой категории</h2>

    {!! Form::model($category = new \MaxTor\Content\Models\Category(), ['url' => route('admin.categories.store'), 'files' => true, 'method' => 'POST']) !!}
    @include ('content::dashboard.categories.form', ['submitButtonText' => 'Добавить категорию'])
    {!! Form::close() !!}
@endsection