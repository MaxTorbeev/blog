<div class="form-group row">
    {!! Form::label('title', 'Заголовок:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('title', $menu->title, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('url', 'Внешний url:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('url', $menu->url, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('route_name', 'Имя маршрута Laravel:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        <select name="route_name" class="form-control select2">
            @foreach ($routeCollection as $route)
                <option value="{{ $route->getName() }}">{{ $route->uri() }}<small></small></option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('published', 'Опубликовано:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        <label class="switch switch-primary">
            <input type="checkbox" class="switch-input" checked="{{ $menu->published }}">
            <span class="switch-slider"></span>
        </label>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('parent_id', 'Родительский пункт меню:', ['class' => 'col col-xs-3 col-form-label']) !!}
    <div class="col col-xs-9">
        {!! Form::select('parent_id', $parentMenuItem, 'null', ['class'=>'form-control select']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>



