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

    <article class="blog post">

        <div class="swiper-container hBlogImagesSlider">
            <div class="swiper-wrapper">
                @foreach($post->photos as $photo)
                    <div class="swiper-slide">
                        <img src="/{{ $photo->path . '/' . $photo->thumbnail_filename }}" class="img-fluid" alt="{{ $photo->original_name }}">
                    </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>


        <h1 class="post_title">{{ $post->title }}</h1>

        <ul class="post_info">
            <li class="post_info_item">
                <blog-hits-counter component="posts" post-id="{{ $post->id }}"></blog-hits-counter>
            </li>
            <li class="post_info_item">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> {{ $post->published_at }}</span>
            </li>
            <li class="post_info_item">
                <span><i class="fa fa-user-o" aria-hidden="true"></i> {{ $post->author->name }}</span>
            </li>
        </ul>

        <div class="post_introText mtn lead">
            {{ $post->intro_text }}
            {{--@include("partials.share")--}}
        </div>

        <div class="post_fullText">
            {!! $post->full_text !!}
        </div>



    </article>


@stop