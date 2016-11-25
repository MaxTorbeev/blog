@extends('mxtcore::layouts.dashboard')

@section('content')
    <style>
        .completed{
            text-decoration: underline;
        }
    </style>
    <div id="app">
        <alert type="error">
            <strong>Error</strong> Your account has not been updated.
        </alert>
        <menu-items></menu-items>
    </div>
@endsection