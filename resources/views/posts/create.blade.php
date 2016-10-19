@extends('layout')

@section('content')
    <h1>Create new post</h1>
    <hr>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        @include('posts.form')
    </form>
@stop