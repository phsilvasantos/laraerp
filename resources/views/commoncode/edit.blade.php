@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Редактировать общий код</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('commoncode.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Упс!</strong> Возникли проблемы.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($common, ['method' => 'PATCH','route' => ['commoncode.update', $common->id]]) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Названия:</strong>
                {!! Form::text('code_name', null, array('placeholder' => 'Код','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Родительская категория:</strong>
                {!! Form::select('parent', $parents,$common->parent_id) !!}

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Соответствующая система:</strong>
                {!! Form::select('permission', $permissions, $common->permission_id) !!}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Обновить</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
