@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация о продажах</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sale.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Номер заказа на продажу:</strong>
                {{ $sale->sales_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>Клиент:</strong>
                {{$sale->customer->customer_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Менеджер:</strong>
                {{ $sale->user->user_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered" id="tableA">
                <tr>
                    <th width="100px">No</th>
                    <th>Товары</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>Подуровень</th>
                </tr>
                @foreach ($details as $key => $detail)

                <tr >
                    <td width="100px" class="no">
                        {{$detail->sale_detail_no}}
                    </td>
                    <td>
                        {{ $detail->product->product_name }}
                    </td>
                    <td>
                        {{$detail->sale_qty}}
                    </td>
                    <td>
                        {{$detail->sale_price}}
                    </td>
                    <td>
                        {{$detail->sale_qty*$detail->sale_price}}
                    </td>

                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Общий</td>
                    <td>{{$total}}</td>
                </tr>



            </table>

        </div>
    </div>

@endsection
