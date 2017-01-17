@extends('mxtcore::layouts.app')

@section('content')
    @can('update', $post)
        <a href="#">Редактирование </a>
    @endcan
    <div class="blog-content">
        <div class="row">
            <div class="col-md-3">
                <div class="entry-header">
                    <h2 class="entry-title">{{ $post->title }}</h2>
                </div>

                <div class="entry-content">
                    {!! $post->full_text !!}
                </div>
            </div>
            <div class="col-md-9">
                @foreach($post->photos as $photo)
                    <img src="/{{ $photo->path . '/' . $photo->thumbnail_filename }}" class="img-responsive" alt="{{ $photo->original_name }}">
                @endforeach
            </div>
        </div>
    </div>
@stop