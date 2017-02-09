@extends('mxtcore::layouts.app')

@section('content')
    <div class="card-columns">

    @foreach($posts as $post)
        <div class="card">
            @if($post->previewImage)
                <a href="{{ route('post.show',  ['alias' => $post->alias]) }}">
                    <img src="/{{ $post->previewImage->getThumbnail() }}"  class="card-img-top img-fluid" alt="{{ $post->title }}">
                </a>
            @endif
            <div class="card-block">
                <h4 class="card-title">
                    <a href="{{ route('post.show',  ['alias' => $post->alias]) }}">{{ $post->title }}</a>
                </h4>
                <p class="card-text">{{ $post->intro_text }}</p>
                @if($post->published_at)
                    <p class="card-text"><small class="text-muted">{{ $post->published_at }}</small></p>
                @endif
            </div>
        </div>
    @endforeach

    </div>
@endsection