
<div class="row">
    <div class="col-md-8">

        <div class="form-group row">
            {!! Form::label('title', 'Заголовок:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('title', $menu->title, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('alias', 'Алиас:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::text('alias', $menu->alias, ['class'=>'form-control']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('extensions_id', 'Расширение:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::select('extensions_id', $extensions, null, ['class'=>'form-control select']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('menu_type_id', 'Тип меню:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::select('menu_type_id', $menuTypes, null, ['class'=>'form-control select']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('parent_id', 'Родительский элемент:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::select('parent_id', $parentMenuItem, 'null', ['class'=>'form-control select']) !!}
            </div>
        </div>

        <div class="form-group row">
            {!! Form::label('published', 'Опубликовано:', ['class' => 'col-xs-3 col-form-label']) !!}
            <div class="col-xs-9">
                {!! Form::select('published', ['0' => 'Нет', '1' => 'Да'], 1, ['class'=>'form-control select']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit( $submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>

    </div>
</div>


