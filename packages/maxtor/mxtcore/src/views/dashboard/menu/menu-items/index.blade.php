@extends('mxtcore::layouts.dashboard')

@section('content')
    <a href="{{ route('dashboard.components', ['alias' => $page->alias, 'method' => 'createMenuItem']) }}"></a>
@endsection