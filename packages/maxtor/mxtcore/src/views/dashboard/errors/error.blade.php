@extends('mxtcore::layouts.dashboard')

@section('content')

    <h1>{{ $e->getMessage() }}</h1>

    <div>file: {{ $e->getFile() }}</div>
    <div>code: {{ $e->getCode() }}</div>

@endsection