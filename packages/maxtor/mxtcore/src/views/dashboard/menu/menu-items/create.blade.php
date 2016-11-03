@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($menu, ['url' => route('menu.store')]) !!}
    @include ('mxtcore::dashboard.menu.menu-items.form', ['submitButtonText' => 'Добавить новый пункт меню' ])
    {!! Form::close() !!}
@stop