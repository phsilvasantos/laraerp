@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Покупки</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('purchase.create') }}">Новый список продвижения</a>
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
            <th>Номер заказа на покупку</th>
            <th>Производитель</th>
            <th>Менеджер</th>
            <th>дата</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($purchases as $key => $purchase)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $purchase->purchases_no }}</td>
                <td>{{ $purchase->manufacturer->manufacturer_name }}</td>
                <td>{{ $purchase->user->user_name }}</td>
                <td>{{ $purchase->created_at }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('purchase.show',$purchase->id) }}">Посмотреть детали</a>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $purchases->render() !!}
@endsection
