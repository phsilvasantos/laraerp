@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Управление полномочиями</h2>
            </div>
            <div class="pull-right">
                {{--@permission('permission-create')--}}
                {{--<a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Разрешение</a>--}}
                {{--@endpermission--}}
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a href="javascript:void(0);" class="btn btn-primary act-button-expand-all "> ＋ Расширить все</a>
    <a href="javascript:void(0);" class="btn btn-primary act-button-collapse-all"> — Свернуть все</a></br>

    <table class="table table-bordered collaptable">
        <tr class="active">
            <th>Названия</th>
            <th>Описание</th>
            <th>Статус</th>
            <th width="280px">Действие</th>
        </tr>
        @each('permissions.child', $categories, 'category')
    </table>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
{{--    <script src="{{ asset('js/jquery.min.js') }}"></script>--}}

    <script>
        $(document).ready(function(){
            $('.collaptable').aCollapTable({
                startCollapsed: true,
                addColumn: false,
                plusButton: '<span class="i"> ＋ </span>',
                minusButton: '<span class="i"> — </span>'
            });
        });
    </script>
@endsection
