@extends('mxtcore::layouts.dashboard')

@section('content')
    <a href="{{ route('dashboard.components', ['alias' => $page->alias, 'method' => 'createMenuItem']) }}" class="btn btn-outline-info">
        Добавить пункт меню
    </a>
@endsection