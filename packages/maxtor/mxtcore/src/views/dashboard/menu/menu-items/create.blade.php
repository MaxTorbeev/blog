@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($menu = new \MaxTor\MXTCore\Models\Menu(), ['url' => route('admin.menu.store')]) !!}
    @include ('mxtcore::dashboard.menu.menu-items.form', ['submitButtonText' => 'Добавить новый пункт меню' ])
    {!! Form::close() !!}
@stop