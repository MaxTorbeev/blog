
<div class="row">
    <div class="col-md-8">
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('alias', 'Алиас:') !!}
            {!! Form::text('alias', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-8">
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('intro_text', 'Вводный текст:') !!}
            {!! Form::textarea('intro_text', null, ['class'=>'form-control', 'rows'=>'3', ]) !!}
        </div>
        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('full_text', 'Полный текст:') !!}
            {!! Form::textarea('full_text', null, ['class'=>'form-control', 'id'=>'editor']) !!}
        </div>
    </div>
    <div class="col-sm-4">

        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('published', 'Опубликовано:') !!}
            {!! Form::select('published', array('0' => 'Нет', '1' => 'Да'), null, ['class'=>'form-control select']) !!}
        </div>

        {{--<div class="form-group">--}}
            {{--{!! Form::label('published_at', 'Publish on:') !!}--}}
            {{--{!! Form::input('data', 'published_at', $posts->published_at, ['class'=>'form-control' ]) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('tag_list', 'Tags:') !!}--}}
            {{--{!! Form::select('tag_list[]', $tags, null, ['class'=>'form-control select2' , 'multiple' ]) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('metadesc', 'meta-description:') !!}--}}
            {{--{!! Form::input('text', 'metadesc', $posts->metadesc, ['class'=>'form-control' ]) !!}--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--{!! Form::label('metakey', 'meta-keywords:') !!}--}}
            {{--{!! Form::input('text', 'metakey', $posts->metakey, ['class'=>'form-control' ]) !!}--}}
        {{--</div>--}}

    </div>
</div>


<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>


@section('footer')

    <script type="text/javascript" src="{!! asset('build/media/ckeditor/ckeditor.js') !!}"></script>

    <script>
        CKEDITOR.replace('body',{
            filebrowserBrowseUrl : '/elfinder/ckeditor'
        });

    </script>

@endsection