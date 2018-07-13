<div class="form-group row">
    {!! Form::label('name', 'Заголовок:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::text('name', $menu->name, ['class'=>'form-control']) !!}
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
            <option>Не выбрано</option>
            @foreach ($routeCollection as $routeName => $route)
                <option value="{{ $routeName }}" @if($menu->route_name === $routeName) selected @endif>
                    {{ $route['uri'] }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    {!! Form::label('menu_type_id', 'Тип меню:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::select('menu_type_id', $menuTypes, $menu->menu_type_id, ['class' => 'form-control select'] ); !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('published', 'Опубликовано:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-xs-10">
        {!! Form::select('published', ['1' => 'Показывать', '0' => 'Не показывать'], 1 , ['class' => 'form-control select'] ); !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('parent_id', 'Родительский пункт меню:', ['class' => 'col col-md-2 col-form-label']) !!}
    <div class="col col-md-2">
        <select name="parent_id" class="form-control select2">
            <option value="0">Не выбрано</option>
            @foreach ($parentMenuItem as $item)
                <option value="{{ $item->id }}" @if($menu->parent_id === $item->id) selected @endif>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>



