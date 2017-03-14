@extends('mxtcore::layouts.app')

@section('content')
    <div class="blog">
        @foreach($posts as $post)
            <div class="blog_listItem">

                @if($post->previewImage)
                    <a href="{{ route('post.show',  ['alias' => $post->alias]) }}">
                        <img src="/{{ $post->previewImage->getThumbnail() }}"  class="blog_listItem_img img-fluid" alt="{{ $post->title }}">
                    </a>
                @endif

                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        @if($post->published_at)
                            <div class="blog_listItem_publish">
                                <span class="day">{{ date('d', strtotime($post->published_at)) }}</span>/{{ date('m', strtotime($post->published_at)) }}
                                <small>
                                    {{ $post->category->title }}
                                </small>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <h3 class="blog_listItem_title">
                            <a href="{{ route('post.show',  ['alias' => $post->alias]) }}">{{ $post->title }}</a>
                        </h3>
                    </div>
                </div>

                <div class="offset-md-2 offset-sm-2">
                    <p class="blog_listItem_text">{{ $post->intro_text }}</p>

                    <a class="btn btn-primary-gradient btn-sm btn-rounded" href="{{ route('post.show',  ['alias' => $post->alias]) }}" target="_blank">
                        Подробнее
                    </a>

                </div>
            </div>
        @endforeach
    </div>

@endsection