@extends('mxtcore::layouts.dashboard')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($extension, ['url' => route('extensions.store')]) !!}
    @include ('mxtcore::dashboard.extensions.form', ['submitButtonText' => 'Добавить новое расширение' ])
    {!! Form::close() !!}
@endsection