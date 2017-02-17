@extends('mxtcore::layouts.app')

@section('content')
    <h1 class="text-center">Упс.. Что то пошло не так!</h1>
    @if (\Illuminate\Support\Facades\Auth::user())
        {{ $e->getCode() }}
        {{ $e->getMessage() }}
    @endif
@endsection