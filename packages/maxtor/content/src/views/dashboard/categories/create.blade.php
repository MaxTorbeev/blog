@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Создание новой категории</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($category = new \MaxTor\Blog\Models\Category(), ['url' => route('categories.store'), 'files' => true, 'method' => 'POST']) !!}
    @include ('blog::dashboard.categories.form', ['submitButtonText' => 'Добавить категорию'])
    {!! Form::close() !!}
@endsection