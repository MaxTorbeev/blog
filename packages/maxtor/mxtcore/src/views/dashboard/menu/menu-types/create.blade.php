@extends('mxtcore::layouts.dashboard')

@section('content')
    <style>
        .completed{
            text-decoration: underline;
        }
    </style>

    <alert type="error">
        <strong>Error</strong> Your account has not been updated.
    </alert>

    <menu-items></menu-items>


    <form-table
            id="1"
            action="/admin/manage-menus/apiItem"
    >

    </form-table>

    {{--<form method="POST" action="{{ route('post.destroy', [1]) }}">--}}
        {{--{{ method_field('DELETE') }}--}}
        {{--{{ csrf_field() }}--}}
        {{--<button type="submit">Delete Post</button>--}}
    {{--</form>--}}
@endsection