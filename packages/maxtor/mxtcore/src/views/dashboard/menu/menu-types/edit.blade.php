@extends('mxtcore::layouts.dashboard')

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Редактирование типа меню «{{ $menuType->title }} <small>[ {{ $menuType->slug }}]</small>»
            </div>
            <div class="card-body">
                {!! Form::model($menuType, ['url' => route('admin.menu-types.update', ['menu_type' => $menuType->id])]) !!}
                @include ('mxtcore::dashboard.menu.menu-types.form', ['submitButtonText' => 'Редактировать тип меню' ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection