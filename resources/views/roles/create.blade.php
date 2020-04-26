@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создать новую роль</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Назад</a>
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
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Названия:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Названия','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Отображаемое название:</strong>
                {!! Form::text('display_name', null, array('placeholder' => 'Отображаемое название','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Описание','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Разрешение:</strong>
                <br/>
                <ul id="tree">
                    @foreach($permission as $value)
                        @if($value->status != 0)
                            <li>
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>
                                @foreach($value->children as $subvalue)
                                    <ul>
                                        <li>
                                            <label>{{ Form::checkbox('permission[]', $subvalue->id, false, array('class' => 'name')) }}
                                                {{ $subvalue->display_name }}</label>
                                            <ul>
                                                <li>
                                                    @foreach($subvalue->children as $basevalue)
                                                        <label>{{ Form::checkbox('permission[]', $basevalue->id, false, array('class' => 'name')) }}
                                                            {{ $basevalue->display_name }}</label>
                                                    @endforeach
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </div>
    </div>
    {!! Form::close() !!}

@stop

@section('js')
    <script src={{ asset('js/checkbox.js') }}></script>
    <script>
        $('#tree').checktree();
    </script>

@endsection