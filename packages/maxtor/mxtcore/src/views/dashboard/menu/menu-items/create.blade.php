@extends('mxtcore::layouts.dashboard')

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Добавить пункт меню
            </div>
            <div class="card-body">
                {!! Form::model($menu = new \MaxTor\MXTCore\Models\Menu(), ['url' => route('admin.menu.store')]) !!}
                @include ('mxtcore::dashboard.menu.menu-items.form', ['submitButtonText' => 'Добавить новый пункт меню' ])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop