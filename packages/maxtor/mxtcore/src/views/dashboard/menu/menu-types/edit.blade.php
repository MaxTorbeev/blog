@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($menuType, ['url' => route('admin.menu-types.update', ['menu_type' => $menuType->id])]) !!}
    @include ('mxtcore::dashboard.menu.menu-types.form', ['submitButtonText' => 'Добавить новый тип меню' ])
    {!! Form::close() !!}
@endsection