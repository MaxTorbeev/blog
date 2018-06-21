@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($user = new \App\User(), ['url' => route('users.store')]) !!}
    @include ('mxtcore::dashboard.users.form', ['submitButtonText' => 'Создать нового пользователя пользователя' ])
    {!! Form::close() !!}
@endsection