@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($extension, ['url' => route('extensions.store')]) !!}
    @include ('mxtcore::dashboard.extensions.form', ['submitButtonText' => 'Добавить новое расширение' ])
    {!! Form::close() !!}
@endsection