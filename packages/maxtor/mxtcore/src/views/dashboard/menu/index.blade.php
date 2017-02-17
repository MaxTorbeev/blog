@php $menuType = '' @endphp

@extends('mxtcore::layouts.dashboard')

@section('content')

    @include('mxtcore::dashboard.partials.components.toolbar', [
        'menu' => [
                    [
                        'url'      => route('dashboard.components', ['alias' => $page->alias, 'method' => 'createmenuitem']),
                        'title'    => 'Добавить пункт меню'
                    ],
                    [
                        'url'      => route('dashboard.components', ['alias' => $page->alias, 'method' => 'createMenuType']),
                        'title'    => 'Добавить новый тип меню'
                    ],
            ]
    ])

    @foreach($menu as $item)
        @if($menuType != $item->menuType->title)
        <h4>{{ $item->menuType->title }}</h4>
        <hr>
        @endif
        {!! Form::model($item, ['metod' => 'PATCH',  'url' => route('menu.update', ['id' => $item->id]), 'class' => 'form-table input-group']) !!}
        <input type="hidden" name="_method" value="PATCH">
        <div class="tr">
            <span class="input-group-addon input-group-addon-sm">{{ $item->id }}:</span>
            <div class="td">
                {!! Form::input('text', 'title', $item->title, ['class'=>'form-control form-control-sm' ]) !!}
            </div>

            <span class="input-group-addon input-group-addon-sm">alias:</span>
            <div class="td">
                {!! Form::input('text', 'alias', $item->alias, ['class'=>'form-control form-control-sm']) !!}
            </div>

            <span class="input-group-addon input-group-addon-sm">type:</span>
            <div class="td">
                {!! Form::select('menu_type_id', $menuTypes, $item->meny_type_id, ['class'=>'form-control form-control form-control-sm']) !!}
            </div>

            <span class="input-group-addon input-group-addon-sm">parent:</span>
            <div class="td">
                {!! Form::select('parent_id', $parentMenuItem, null, ['class'=>'form-control form-control form-control-sm']) !!}
            </div>

            <div class="td">
                {!! Form::select('extensions_id', $extensions, $item->extensions_id, ['class'=>'form-control form-control form-control-sm']) !!}
            </div>

            <div class="td">
                @if ( $item->published == 1)
                    <button type="button" class="btn btn-sm btn-warning btn-block">Откл</button>
                @else
                    <button type="button" class="btn btn-sm btn-success btn-block">Вклю</button>
                @endif
            </div>

            <div class="td">
                {!! Form::submit( 'Изменить', ['class' => 'btn btn-sm btn-primary btn-block']) !!}
            </div>
        </div>
        {!! Form::close() !!}

        @php $menuType = $item->menuType->title @endphp

    @endforeach
@endsection