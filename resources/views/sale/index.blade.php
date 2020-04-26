@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Сопровождение продаж</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('sale.create') }}">Новый заказ на продажу</a>
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
            <th>Номер заказа на продажу</th>
            <th>Клиент</th>
            <th>Менеджер</th>
            <th>Дата</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($sales as $key => $sale)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $sale->sales_no }}</td>
                <td>{{ $sale->customer->customer_name }}</td>
                <td>{{ $sale->user->user_name }}</td>
                <td>{{ $sale->created_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('sale.show',$sale->id) }}">Посмотреть детали</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $sales->render() !!}
@endsection
