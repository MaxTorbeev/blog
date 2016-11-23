@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-xs-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs float-xs-left">
                <li class="nav-item"><a href="/login" class="nav-link">Вход</a></li>
                <li class="nav-item"><a class="nav-link active">Регистрация</a></li>
            </ul>
        </div>
        <div class="card-block">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-xs-2 col-form-label">Логин</label>
                    <div class="col-xs-10">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-xs-2 col-form-label">E-Mail адрес</label>
                    <div class="col-xs-10">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required >
                        @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                    </div>
                </div>


                <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-xs-2 col-form-label">Пароль</label>
                    <div class="col-xs-10">
                        <input id="password" type="password" class="form-control" name="password" required >
                        @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                        @endif
                    </div>
                </div>

                <div class="form-group row {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password-confirm" class="col-xs-2 col-form-label">Повторите пароль</label>
                    <div class="col-xs-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                        @endif
                    </div>
                </div>

               <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
