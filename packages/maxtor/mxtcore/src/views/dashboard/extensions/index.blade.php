@extends('mxtcore::layouts.dashboard')

@section('content')
    {{--@todo сделать дерективу, которая генерирует меню управления--}}
    <a href="{{ route('dashboard.components', ['alias' => $page->alias, 'method' => 'create']) }}" class="btn btn-success">Добавить расширение</a>

    @foreach($extensions as $extension)
        {!! Form::model($extension, ['method' => 'PATCH',  'url' => route('extensions.update', ['id' => $extension->id]), 'class' => 'form-table input-group']) !!}
            <input type="hidden" name="_method" value="PATCH">
            <div class="tr">
                <span class="input-group-addon input-group-addon-sm">id:{{ $extension->id }}:</span>
                <div class="td">
                    {!! Form::input('text', 'name', $extension->name, ['class'=>'form-control form-control-sm' ]) !!}
                </div>

                <span class="input-group-addon input-group-addon-sm">controller path:</span>
                <div class="td">
                    {!! Form::input('controller_path', 'controller_path', $extension->controller_path, ['class'=>'form-control form-control-sm' ]) !!}
                </div>

                <div class="td">
                    @if ( $extension->enabled == 1)
                    <button type="button" class="btn btn-sm btn-warning btn-block">Отключить</button>
                    @else
                    <button type="button" class="btn btn-sm btn-success btn-block">Включить</button>
                    @endif
                </div>

                <div class="td">
                    {!! Form::submit( 'Изменить', ['class' => 'btn btn-sm btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    @endforeach
@endsection