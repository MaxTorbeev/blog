
<div class="row">
    <div class="col-md-8">
        <div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
            {!! Form::label('name', 'Имя расширения:', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $extension->name, ['class'=>'form-control']) !!}
                @if ($errors->has('name'))
                    <small class="form-control-feedback">{{ $errors->first('name') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('controller_path') ? 'has-danger' : '' }}">
            {!! Form::label('controller_path', 'Используемый контроллер:', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('controller_path', $extension->controller_path, ['class'=>'form-control']) !!}
                @if ($errors->has('controller_path'))
                    <small class="form-control-feedback">{{ $errors->first('controller_path') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('enabled') ? 'has-danger' : '' }}">
            {!! Form::label('enable', 'Включить расширение? ', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::select('enabled', ['0' => 'Нет', '1' => 'Да'], 1, ['class'=>'form-control select']) !!}
                @if ($errors->has('enabled'))
                    <small class="form-control-feedback">{{ $errors->first('enabled') }}</small>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
</div>


