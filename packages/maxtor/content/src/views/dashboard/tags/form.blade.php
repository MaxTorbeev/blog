<div class="form-group">
    {!! Form::label('name', 'Название тега:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Ссылка:') !!}
    {!! Form::text('slug', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <tinymce name="description">
        {{ $tag->description }}
    </tinymce>
</div>

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-sm btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Назад</a>
</div>

