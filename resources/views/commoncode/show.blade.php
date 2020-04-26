@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Просмотр общий код</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('commoncode.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {{ $common->code_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Родительская категория:</strong>
                @if($common->parent_id=='#')
                    <td>#</td>
                @else
                    <td>{{ $common->parent->code_name }}</td>
                @endif            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Соответствующая система:</strong>
                {{ $common->permission->display_name }}
            </div>
        </div>
    </div>
@endsection
