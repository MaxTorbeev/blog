@extends('mxtcore::layouts.app')

@section('content')
    <h1 class="text-center">Страница не найдена</h1>
    @if (\Illuminate\Support\Facades\Auth::user())
        {{ $e->getCode() }}
        {{ $e->getMessage() }}
    @endif
@endsection