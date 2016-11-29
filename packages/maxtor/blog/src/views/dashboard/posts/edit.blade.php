@extends('mxtcore::layouts.dashboard')

@section('content')
    <h2>Редактирование материала</h2>

    {!! Form::model($post, ['url' =>  route('post.update', [$post->id]), 'files' => true, 'method' => 'PATCH']) !!}
        @include ('blog::form', [
        'submitButtonText' => 'Редактировать материал',
        'deletePost' => 'true'
        ])
    {!! Form::close() !!}

    <form method="POST" action="{{ route('post.destroy', [$post->id]) }}" v-ajax>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <button type="submit">Delete Post</button>
    </form>
@endsection