@extends('layouts.app')

@section('content')
    @can('update', $post)
        <a href="#">Редактирование </a>
    @endcan
    <div class="blog-content">
        <div class="entry-header">
            <h2 class="entry-title">{{ $post->title }}</h2>
        </div>

        <div class="entry-content">
            {{ $post->full_text }}
        </div>
    </div>
@stop