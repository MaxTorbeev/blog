
<div class="row">
    <div class="col-md-8">

        <div class="form-group row ">
            {!! Form::label('name', 'Имя расширения:', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $extension->name, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row ">
            {!! Form::label('controller_path', 'Используемый контроллер:', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('controller_path', $extension->controller_path, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('enabled', 'Включить расширение? ', ['class' => 'col-xs-4 col-form-label']) !!}
            <div class="col-xs-8">
                {!! Form::select('enabled', ['0' => 'Нет', '1' => 'Да'], 1, ['class'=>'form-control select']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>

    </div>
</div>


