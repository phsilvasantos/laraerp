@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Создать продукт</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Назад</a>
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
    {!! Form::open(array('id'=>'send-form')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Код продукта:</strong>
                {!! Form::text('product_code', null, array('placeholder' => 'Код', 'class' => 'form-control', 'id' => 'product_code')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {!! Form::text('product_name', null, array('placeholder' => 'Названия','class' => 'form-control', 'id' => 'product_name')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Категория продукта:</strong>
                <select name="category_id" id="category_id">
                    @each('product_categories.child_select', $product_categories, 'category')
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Цена:</strong>
                {!! Form::text('product_price', null, array('placeholder' => 'Price','class' => 'form-control', 'id' => 'product_price')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Универсальный код:</strong>
                {!! Form::select('common_id',  $common_code, [], array('class' => 'form-control', 'id' => 'common_id')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Поставщики:</strong>
                {!! Form::select('manufacturer_id', $manufacturer, [], array('class' => 'form-control', 'id' => 'manufacturer_id')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Товарный статус:</strong>
                <input id="product_status" name="product_status" type="checkbox" value="1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Позиционирование продукта:</strong>
                {!! Form::select('product_or_item',['Готовая продукция','Полуфабрикаты','Сырье'], [], array('class' => 'form-control', 'id' => 'product_or_item', 'onchange'=>'ShowHideDiv(this)')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <table id="tblAppendGrid">
                </table>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class='btn btn-small'>
                {!! Form::submit('Создать',['class'=>'btn btn-primary form-control'])!!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@stop
@section('js')
    <script id="jsSource" type="text/javascript">
        $(function () {
            // Initialize appendGrid
            $('#tblAppendGrid').appendGrid({
                caption: 'Список сырья',
                initRows: 1,
                columns: [
                    {
                        name: 'product_or_item',
                        display: 'Позиционирование продукта',
                        type: 'select',
                        ctrlOptions: {0: '{Выбрать}', 1: 'Готовая продукция', 2: 'Полуфабрикаты', 3: 'Сырье'},
                        onChange: handleCascadeChange
                    },
                    {
                        name: 'product_name',
                        display: 'Товары',
                        type: 'select',
                        ctrlOptions: {0: '{Выбрать}'},
                        ctrlAttr: {disabled: 'disabled'}
                    },
                    {
                        name: 'qty',
                        display: 'количество',
                        type: 'text',
                        ctrlAttr: {maxlength: 10},
                        ctrlCss: {width: '50px', 'text-align': 'right'},
                        value: 0
                    }
                ],
                rowDataLoaded: function (caller, record, rowIndex, uniqueIndex) {
                    if (0 < record.product_or_item) {
                        var product_or_item = $('#tblAppendGrid').appendGrid('getCellCtrl', 'product_or_item', rowIndex);
                        $(product_or_item).trigger('change');
                        var product_name = $('#tblAppendGrid').appendGrid('getCellCtrl', 'product_name', rowIndex);
                        if (0 < record.product_name) {
                            $(product_name).val(record.product_name);
                        }
                    }
                }
            });

            $('#send-form').on('submit', function (e) {
                var product_code = $('#product_code').val();
                var product_name = $('#product_name').val();
                var category_id = $('#category_id').val();
                var product_price = $('#product_price').val();
                var common_id = $('#common_id').val();
                var manufacturer_id = $('#manufacturer_id').val();
                var product_status = $('#product_status').val();
                var product_or_item = $('#product_or_item').val();
                var data = $('#tblAppendGrid').appendGrid('getAllValue');
//                $.ajaxSetup({
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                })
                e.preventDefault(e);
                $.ajax({
                    method: 'POST',
                    url: '/product',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        product_code: product_code, product_name: product_name, category_id: category_id,
                        product_price: product_price, common_id: common_id, manufacturer_id: manufacturer_id,
                        product_status: product_status, product_or_item: product_or_item, data: data
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data == "success") {
                            window.location.href = '{{route('product.index')}}';
                        }
                    },
                    error: function (data) {

                    }
                })
            });
        });

        function handleCascadeChange(evt, rowIndex) {
            // Get the select elements
            var product_or_item = evt.target;
            var product_name = $('#tblAppendGrid').appendGrid('getCellCtrl', 'product_name', rowIndex);
            product_name.options.length = 0;
            // Check if user selected a valid option
            var product = <?php echo json_encode($product); ?>;
            if (0 < product_or_item.selectedIndex) {
                for (var i = 0; i < product.length; i++) {
                    if (product[i].product_or_item == (product_or_item.selectedIndex) - 1) {
                        product_name.options[i] = new Option(product[i].product_code + ' ' + product[i].product_name, product[i].id);
                    }
                }
                product_name.disabled = false;
            } else {
                product_name.disabled = true;
            }
        }

        function ShowHideDiv() {
            var tblAppendGrid = document.getElementById("tblAppendGrid");
            tblAppendGrid.style.display = ($('#product_or_item').val() != 2) ? "block" : "none";
        }
    </script>
@endsection
