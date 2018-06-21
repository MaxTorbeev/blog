@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($user, ['url' => route('users.update', ['id' => $user->id])]) !!}
    @method('PUT')
    @include ('mxtcore::dashboard.users.form', ['submitButtonText' => 'Редактировать пользователя' ])
    {!! Form::close() !!}
@endsection