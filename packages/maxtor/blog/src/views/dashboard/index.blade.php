@extends('mxtcore::layouts.dashboard')

@section('content')
    <h1>Create new post</h1>
    <hr>

    {{--@if (count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}


    {!! Form::model($post = new \MaxTor\Blog\Models\Post(), ['url' => 'posts', 'files' => true]) !!}
    @include ('blog::form', ['submitButtonText' => 'Добавить новый материал' ])
    {!! Form::close() !!}

@stop