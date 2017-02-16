@extends('mxtcore::layouts.app')


@section('meta')
    <meta name="keywords" content="{{ $post->metakey }}">
    <meta name="description" content="{{ $post->metadesc }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->intro_text }}">
    <meta property="og:site_name" content="maxtor.name">
    <meta property="og:url" content="{{  route('post.show', ['alias' => $post->alias]) }}">
    <meta property="og:type" content="article">
    {{--<meta property="og:image" content="{{ asset($photo->path . '/' . $photo->thumbnail_filename) }}">--}}
@endsection

@section('content')
    @can('update', $post)
        <a href="#">Редактирование </a>
    @endcan

    <article class="post">
        <div class="row">

            <div class="col col-3">
                @foreach($post->photos as $photo)
                    <img src="/{{ $photo->path . '/' . $photo->thumbnail_filename }}" class="img-fluid" alt="{{ $photo->original_name }}">
                @endforeach
            </div>

            <div class="col col-9">

                <h1 class="post_title">{{ $post->title }}</h1>

                <ul class="post_info">
                    <li class="post_info_item">
                        <span>Опубликовано: {{ $post->published_at }}</span>
                    </li>
                    <li class="post_info_item">
                        <span>Пользователем: {{ $post->user }}</span>
                    </li>
                </ul>

                <div class="post_introText mtn lead">
                    {{ $post->intro_text }}
                    {{--@include("partials.share")--}}
                </div>

                <div class="post_fullText">
                    {!! $post->full_text !!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col col-9">

            </div>
        </div>
    </article>


@stop