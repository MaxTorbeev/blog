<div class="row">
    <div class="col-md-8">
        <div class="form-group  {{ $errors->has('name') ? 'has-danger' : '' }}">
            {!! Form::label('name', 'Название:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
            @if ($errors->has('name'))
                <small class="form-control-feedback">{{ $errors->first('name') }}</small>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group  {{ $errors->has('slug') ? 'has-danger' : '' }}">
            {!! Form::label('slug', 'Ссылка:') !!}
            {!! Form::text('slug', null, ['class'=>'form-control']) !!}
            @if ($errors->has('slug'))
                <small class="form-control-feedback">{{ $errors->first('slug') }}</small>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="form-group  {{ $errors->has('intro_text') ? 'has-danger' : '' }}">
            {!! Form::label('intro_text', 'Вводный текст:') !!}
            {!! Form::textarea('intro_text', null, ['class'=>'form-control', 'rows'=>'6' ]) !!}
            @if ($errors->has('intro_text'))
                <small class="form-control-feedback">{{ $errors->first('intro_text') }}</small>
            @endif
        </div>
        <div class="form-group  {{ $errors->has('full_text') ? 'has-danger' : '' }}">
            {!! Form::label('full_text', 'Полный текст:') !!}

            <tinymce name="full_text" html="{{ $post->full_text }}"></tinymce>
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
            {!! Form::label('category_id', 'Категории:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control select2']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tag_list', 'Tags:') !!}
            {!! Form::select('tag_list[]', $tags, $post->tags->pluck('id')->all(), ['class'=>'form-control select2' , 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('metadesc', 'meta-description:') !!}
            {!! Form::textarea('metadesc', $post->metadesc, ['class'=>'form-control', 'rows'=>'5' ]) !!}
        </div>

        <div class="form-group">
            {!! Form::label('metakey', 'meta-keywords:') !!}
            {!! Form::input('text', 'metakey', $post->metakey, ['class'=>'form-control' ]) !!}
        </div>
    </div>
</div>

<div class="panel form_buttonGroups form_buttonGroups-fixed">
    <div class="form-group">
        {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('admin.posts.index') }}" class="btn btn btn-secondary">Отменить</a>
    </div>
</div>

@section('footer')

@endsection