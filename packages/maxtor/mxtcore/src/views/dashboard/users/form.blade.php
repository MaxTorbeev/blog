<div class="form-group row {{ $errors->has('name') ? 'has-danger' : '' }}">
    {!! Form::label('name', 'Логин пользователя:', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col col-xs-8">
        {!! Form::text('name', $user->title, ['class'=>'form-control']) !!}
        @if ($errors->has('name'))
            <small class="form-control-feedback">{{ $errors->first('name') }}</small>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-danger' : '' }}">
    {!! Form::label('email', 'Email:', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col col-xs-8">
        {!! Form::text('email', $user->title, ['class'=>'form-control']) !!}
        @if ($errors->has('email'))
            <small class="form-control-feedback">{{ $errors->first('email') }}</small>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('new_password') ? 'has-danger' : '' }}">
    {!! Form::label('new_password', 'Пароль, если хотите сменить:', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col col-xs-8">
        {!! Form::text('new_password', null, ['class'=>'form-control']) !!}
        @if ($errors->has('new_password'))
            <small class="form-control-feedback">{{ $errors->first('new_password') }}</small>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('password_confirmation') ? 'has-danger' : '' }}">
    {!! Form::label('new_password_confirmation', 'Повторите пароль:', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col col-xs-8">
        {!! Form::text('new_password_confirmation', null, ['class'=>'form-control']) !!}
        @if ($errors->has('new_password_confirmation'))
            <small class="form-control-feedback">{{ $errors->first('new_password_confirmation ') }}</small>
        @endif
    </div>
</div>

<div class="form-group row {{ $errors->has('role') ? 'has-danger' : '' }}">
    {!! Form::label('role', 'Роль пользователя:', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col col-xs-8">
        {!! Form::select('role', $roles, null, ['class'=>'form-control custom-select']) !!}
        @if ($errors->has('role'))
            <small class="form-control-feedback">{{ $errors->first('role') }}</small>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="col-auto">
        {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
    <div class="col-auto">
        <a href="{{ route('dashboard.components', ['alias' => $page->slug]) }}" class="btn btn-dark">
            К списку пользователей
        </a>
    </div>
</div>
