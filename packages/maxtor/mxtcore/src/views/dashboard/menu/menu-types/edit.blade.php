@extends('mxtcore::layouts.dashboard')

@section('breadcrumbs') {{ Breadcrumbs::render('admin.menu-types.edit', $menuType) }} @endsection

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Редактирование типа меню «{{ $menuType->name }} <small>[ {{ $menuType->name }}]</small>»
            </div>
            <div class="card-body">
                {!! Form::model($menuType, ['url' => route('admin.menu-types.update', ['menu_type' => $menuType->id])]) !!}
                @method('PUT')
                @include ('mxtcore::dashboard.menu.menu-types.form', ['submitButtonText' => 'Редактировать тип меню' ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection