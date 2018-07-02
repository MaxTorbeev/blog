@extends('mxtcore::layouts.dashboard')

@section('content')
    <a href="{{ route('admin.menu.create') }}" class="btn btn-outline-info">
        Добавить пункт меню
    </a>
@endsection