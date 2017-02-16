@extends('mxtcore::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
                {{--{{ dd(\Illuminate\Support\Facades\Auth::user()->roles) }}--}}
                @can('edit_forum')
                    <h1>Can edit_forum</h1>
                @endcan

                @can('manage_money')
                <h1>Can manage_money</h1>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
