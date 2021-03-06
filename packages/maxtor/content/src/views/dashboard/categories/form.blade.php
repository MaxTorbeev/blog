
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::label('name', 'name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('slug', 'Ссылка:') !!}
            {!! Form::text('slug', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            {!! Form::label('description', 'Описание:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'id'=>'editor']) !!}
        </div>
    </div>
    <div class="col-sm-4">

        <div class="form-group">
            {!! Form::label('published', 'Опубликовано:') !!}
            {!! Form::select('published', ['0' => 'Нет', '1' => 'Да'], null, ['class'=>'form-control select']) !!}
        </div>

        {{--<div class="form-group">--}}
        {{--{!! Form::label('published_at', 'Publish on:') !!}--}}
        {{--{!! Form::input('data', 'published_at', $posts->published_at, ['class'=>'form-control' ]) !!}--}}
        {{--</div>--}}

        <div class="form-group">
            {!! Form::label('parent_id', 'Родительская категория:') !!}
            {!! Form::select('parent_id', $categories, $category->parent_id, ['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('metadesc', 'meta-description:') !!}
        {!! Form::input('text', 'metadesc', $category->metadesc, ['class'=>'form-control' ]) !!}
        </div>

        <div class="form-group">
        {!! Form::label('metakey', 'meta-keywords:') !!}
        {!! Form::input('text', 'metakey', $category->metakey, ['class'=>'form-control' ]) !!}
        </div>

    </div>
</div>
{{--<alert></alert>--}}

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn btn-secondary">Назад</a>
</div>


@section('footer')

@endsection