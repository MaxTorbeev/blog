@extends('mxtcore::layouts.dashboard')

@section('content')
    <h1>Расширения</h1>
    <hr>
    @foreach($extensions as $extension)
        {!! Form::model($extension, ['metod' => 'PATCH',  'url' => route('extensions.update', ['id' => $extension->id]), 'class' => 'form-table input-group']) !!}
            <input type="hidden" name="_method" value="PATCH">
            <div class="tr">
                <span class="input-group-addon">id:{{ $extension->id }}:</span>
                <div class="td">
                    {!! Form::input('text', 'name', $extension->name, ['class'=>'form-control' ]) !!}
                </div>

                <span class="input-group-addon">namespace:</span>
                <div class="td">
                    {!! Form::input('namespace', 'namespace', $extension->namespace, ['class'=>'form-control' ]) !!}
                </div>

                <div class="td">
                    @if ( $extension->enabled == 1)
                    <button type="button" class="btn btn-warning btn-block">Отключить</button>
                    @else
                    <button type="button" class="btn btn-success btn-block">Включить</button>
                    @endif
                </div>

                <div class="td">
                    {!! Form::submit( 'Изменить', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    @endforeach
@endsection