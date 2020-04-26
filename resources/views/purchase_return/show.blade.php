@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация о выходе покупки</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('purchase_return.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Номер возврата покупки:</strong>
                {{ $purchase->purchases_no }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>Поставщики:</strong>
                {{$purchase->manufacturer->manufacturer_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Менеджер:</strong>
                {{ $purchase->user->user_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered" id="tableA">
                <tr>
                    <th width="100px">No</th>
                    <th>Товары</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th>подуровень</th>
                </tr>
                @foreach ($details as $key => $detail)

                <tr >
                    <td width="100px" class="no">
                        {{$detail->purchase_detail_no}}
                    </td>
                    <td>
                        {{ $detail->product->product_name }}
                    </td>
                    <td>
                        {{$detail->purchase_qty}}
                    </td>
                    <td>
                        {{$detail->purchase_price}}
                    </td>
                    <td>
                        {{$detail->purchase_qty*$detail->purchase_price}}
                    </td>

                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>общий</td>
                    <td>{{$total}}</td>
                </tr>



            </table>

        </div>
    </div>

@endsection
