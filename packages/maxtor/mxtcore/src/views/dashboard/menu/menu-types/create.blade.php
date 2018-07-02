@extends('mxtcore::layouts.dashboard')

@section('content')
    {!! Form::model($menuType = new \MaxTor\MXTCore\Models\MenuType(), ['url' => route('admin.menu-types.store')]) !!}
    @include ('mxtcore::dashboard.menu.menu-types.form', ['submitButtonText' => 'Добавить новый тип меню' ])
    {!! Form::close() !!}
@endsection