<div class="form-group row">
    {!! Form::label('title', 'Заголовок:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('title', $menuType->title, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('slug', 'Псевдоним:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('slug', $menuType->slug, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('description', 'Описание:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('description', $menuType->description, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

