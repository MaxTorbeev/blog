<div class="row">
    <div class="col-md-8">
        <div class="form-group  {{ $errors->has('title') ? 'has-danger' : '' }}">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
            @if ($errors->has('title'))
                <small class="form-control-feedback">{{ $errors->first('title') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group  {{ $errors->has('alias') ? 'has-danger' : '' }}">
            {!! Form::label('alias', 'Алиас:') !!}
            {!! Form::text('alias', null, ['class'=>'form-control']) !!}
            @if ($errors->has('alias'))
                <small class="form-control-feedback">{{ $errors->first('alias') }}</small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="form-group  {{ $errors->has('intro_text') ? 'has-danger' : '' }}">
            {!! Form::label('intro_text', 'Вводный текст:') !!}
            {!! Form::textarea('intro_text', null, ['class'=>'form-control', 'rows'=>'3', ]) !!}
            @if ($errors->has('intro_text'))
                <small class="form-control-feedback">{{ $errors->first('intro_text') }}</small>
            @endif
        </div>
        <div class="form-group  {{ $errors->has('full_text') ? 'has-danger' : '' }}">
            {!! Form::label('full_text', 'Полный текст:') !!}

            <tinymce name="full_text"> {{ $post->full_text }} </tinymce>
            @if ($errors->has('full_text'))
                <small class="form-control-feedback">{{ $errors->first('full_text') }}</small>
            @endif
        </div>
    </div>
    <div class="col-sm-4">

        <div class="form-group  {{ $errors->has('enabled') ? 'has-danger' : '' }}">
            {!! Form::label('preview_photo_id', 'Изображение вводного текста:') !!}

            {!! Form::select('preview_photo_id', $photos, null, ['class'=>'form-control selectPreviewPhoto', 'data-post-id' => $post->id]) !!}
        </div>

        <div class="form-group  {{ $errors->has('enabled') ? 'has-danger' : '' }}">
            {!! Form::label('published', 'Опубликовано:') !!}
            {!! Form::select('published', array('0' => 'Нет', '1' => 'Да'), null, ['class'=>'form-control select']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_at', 'Publish on:') !!}
            {!! Form::input('data', 'published_at', $post->published_at, ['class'=>'form-control' ]) !!}
        </div>

        <div class="form-group  {{ $errors->has('enabled') ? 'has-danger' : '' }}">
            {!! Form::label('cat_id', 'Категории:') !!}
            {!! Form::select('cat_id', $categories, null, ['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tag_list', 'Tags:') !!}
            {!! Form::select('tag_list[]', $tags, $post->tags->pluck('id')->all(), ['class'=>'form-control select2' , 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('metadesc', 'meta-description:') !!}
            {!! Form::input('text', 'metadesc', $post->metadesc, ['class'=>'form-control' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('metakey', 'meta-keywords:') !!}
            {!! Form::input('text', 'metakey', $post->metakey, ['class'=>'form-control' ]) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary']) !!}
    <a href="{{ url()->previous() }}" class="btn btn btn-secondary">Назад</a>
</div>

@section('footer')

@endsection