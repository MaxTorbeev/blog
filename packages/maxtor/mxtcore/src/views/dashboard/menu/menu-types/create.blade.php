@extends('mxtcore::layouts.dashboard')

@section('content')

    <div id="app">
        <counter subject="Likes"></counter>
        <counter subject="Dislikes"></counter>
    </div>

    <template id="counter-template">
        <button @click="count += 1">@{{ subject }}: @{{ count }}</button>
    </template>

@endsection