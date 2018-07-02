@extends('mxtcore::layouts.dashboard')

@section('content')
    <h1>Create new post</h1>
    <hr>

    @if(Session::has('flash_message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($post = new \MaxTor\Content\Models\Post(), ['url' => 'posts', 'files' => true]) !!}
        @include ('content::dashboard.posts.form', ['submitButtonText' => 'Добавить новый материал' ])
    {!! Form::close() !!}

@stop