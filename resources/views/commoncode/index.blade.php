@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Общее управление кодом</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('commoncode.create') }}">Добавить общий код</a>
                {{--@endpermission--}}
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
            <th>Название</th>
            <th>Родительская категория</th>
            <th>Соответствующая система</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($commons as $key => $common)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $common->code_name }}</td>
                @if($common->parent_id=='#')
                    <td>#</td>
                @else
                    <td>{{ $common->parent->code_name }}</td>
                @endif
                <td>{{ $common->permission->display_name }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('commoncode.show',$common->id) }}">Просмотр</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('commoncode.edit',$common->id) }}">Редатировать</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $commons->render() !!}
@endsection
