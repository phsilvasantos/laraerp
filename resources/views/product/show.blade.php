@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Информация о продукте</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Назад</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Код продукта:</strong>
                {{ $product->product_code }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {{ $product->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Категория продукта:</strong>
                {{$product->product_category->category_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Позиционирование продукта:</strong>
                @if($product->product_or_item == 0 )
                    Готовая продукция
                @elseif($product->product_or_item == 1)
                    Полуфабрикаты
                @else
                    Сырье
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Цена:</strong>
                {{$product->product_price}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Универсальный код:</strong>
                {{$product->common_code->code_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Поставщики:</strong>
                {{$product->manufacturer->manufacturer_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Товарный статус:</strong>
                @if($product->product_status == 1)
                    Положить на полки
                @else
                    С полки
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <strong>Ведомость материалов</strong>
        <table>
            <tr>
                <td>Название</td>
                <td>количество</td>
            </tr>
            @each('product.child', $product_table, 'product_table')
        </table>
        </div>
    </div>
@endsection
