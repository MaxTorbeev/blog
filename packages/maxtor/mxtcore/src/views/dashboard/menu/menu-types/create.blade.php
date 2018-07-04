@extends('mxtcore::layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            Добавить новый тип меню
        </div>
        <div class="card-body">
        {!! Form::model($menuType = new \MaxTor\MXTCore\Models\MenuType(), ['url' => route('admin.menu-types.store')]) !!}
        @include ('mxtcore::dashboard.menu.menu-types.form', ['submitButtonText' => 'Добавить новый тип меню' ])
        {!! Form::close() !!}
        </div>
    </div>
@endsection