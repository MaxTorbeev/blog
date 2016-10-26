@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="card text-xs-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs float-xs-left">
                    <li class="nav-item"><span class="nav-link active">Вход</span></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Регистрация</a></li>
                </ul>
            </div>
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-xs-2 col-form-label">E-Mail Address</label>
                        <div class="col-xs-10">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-xs-2 col-form-label">Password</label>
                        <div class="col-xs-10">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input">
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Remember Me</span>
                    </label>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
