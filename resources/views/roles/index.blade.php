@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ролевое управление</h2>
            </div>
            <div class="pull-right">
                @permission('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}"> Создать новую роль</a>
                @endpermission
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Названия</th>
            <th>Описание</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($roles as $key => $role)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $role->display_name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    @permission('role-show')
                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Просмотр</a>
                    @endpermission
                    @permission('role-edit')
                    @if($role->id != 1)
                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Редактировать</a>
                    @endif
                    @endpermission
                    @permission('role-delete')
                    @if($role->id != 1)
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Удалить', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endif
                    @endpermission
                </td>
            </tr>
        @endforeach
    </table>
    {!! $roles->render() !!}
@endsection
