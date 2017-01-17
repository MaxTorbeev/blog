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

                @foreach($post->tags as $tag)
                    <a href="{{ route('tags.show',  ['id' => $tag->alias]) }}">
                        <span class="badge badge-primary">{{ $tag->name }}</span>
                    </a>
                @endforeach
            </div>
            <div class="col-md-9">
                @foreach($post->photos as $photo)
                    <img src="/{{ $photo->path . '/' . $photo->thumbnail_filename }}" class="img-responsive" alt="{{ $photo->original_name }}">
                @endforeach
            </div>
        </div>
    </div>
@stop