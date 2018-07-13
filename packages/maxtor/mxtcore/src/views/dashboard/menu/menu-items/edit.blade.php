@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.menu.edit', $menu) }} @endsection

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Редактрирование пункта меню «{{ $menu->name }}»
            </div>
            <div class="card-body">
                {!! Form::model($menu, ['url' => route('admin.menu.update', [ $menu->id ])]) !!}
                @method('PUT')
                @include ('mxtcore::dashboard.menu.menu-items.form', ['submitButtonText' => 'Редактировать пункт меню' ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop