@extends('mxtcore::layouts.dashboard')

@section('content')

    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Редактрирование пункта меню «{{ $menu->title }}»
            </div>
            <div class="card-body">
                {!! Form::model($menu, ['url' => route('admin.menu.store')]) !!}
                @include ('mxtcore::dashboard.menu.menu-items.form', ['submitButtonText' => 'Редактировать пункт меню' ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop