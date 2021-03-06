@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Новый заказ на продажу</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sale.index') }}"> Назад</a>
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
    {!! Form::open(array('route' => 'sale.store','method'=>'POST','id'=>'form')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Номер заказа на продажу:</strong>
                {!! Form::text('sale_no','Автоматически генерируется', array('placeholder' => 'No','class' => 'form-control', 'disabled' => true)) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <strong>Клиент:</strong>
                {!! Form::select('customer_id', $customer, [], array('class' => 'form-control chosen','id'=>'categories')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Менеджер:</strong>
                {!! Form::text('user_id', $user_name, array('placeholder' => 'id','class' => 'form-control', 'disabled' => true)) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered" id="tableA">
                <tr>
                    <th width="100px">No</th>
                    <th>Товары</th>
                    <th>Количество</th>
                    {{--<th>定價</th>--}}
                    <th>Цена продажи</th>
                    <th>Подуровень</th>
                    <th width="280px">Действие</th>
                </tr>

                <tr class="form-group fieldGroup" id="tr1">
                    <td width="100px" class="no" >1</td>
                    <td>
                        {!! Form::select('product_id[]', $product, [], array('class' => 'form-control chosen','id'=>'product')) !!}
                    </td>
                    <td>
                        {!! Form::number('qty[]', null, array('placeholder' => '0','class' => 'form-control qty','min'=>0)) !!}
                    </td>
                    {{--<td>--}}
{{--                        {!! Form::text('product_price', 0, array('placeholder' => '','class' => 'form-control', 'disabled' => true)) !!}--}}
                    {{--</td>--}}
                    <td>
                        {!! Form::number('price[]', null, array('placeholder' => '0','class' => 'form-control price','min'=>0)) !!}
                    </td>
                    <td>
                        {!! Form::number('subtotal', 0, array('placeholder' => '','class' => 'form-control', 'disabled' => true)) !!}
                    </td>
                    <td>
                        <div class="input-group-addon">
                            <a href="javascript:void(0)" class="btn btn-success addMore"><span
                                        class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
                                Добавить</a>
                        </div>
                    </td>

                </tr>
                <tr class="form-group fieldGroupCopy" style="display: none;">
                    <td>
                        {!! Form::select('product_id[]', $product, [], array('class' => 'form-control Copychosen','id'=>'productCopy')) !!}
                    </td>
                    <td>
                        {!! Form::number('qty[]', 1, array('placeholder' => '0','class' => 'form-control qty','min'=>0)) !!}
                    </td>
                    {{--<td>--}}
{{--                        {!! Form::text('product_price', 0, array('placeholder' => '','class' => 'form-control', 'disabled' => true)) !!}--}}
                    {{--</td>--}}
                    <td>
                        {!! Form::number('price[]', 1, array('placeholder' => '0','class' => 'form-control price','min'=>0)) !!}
                    </td>
                    <td>
                        {!! Form::number('subtotal', 0, array('placeholder' => '','class' => 'form-control', 'disabled' => true)) !!}
                    </td>
                    <td>
                        <div class="input-group-addon">
                            <a href="javascript:void(0)" class="btn btn-danger remove"><span
                                        class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
                                Удалить</a>
                        </div>
                    </td>

                </tr>


            </table>
            <h2>Общий</h2>
            {!! Form::number('total', 0, array('placeholder' => '','class' => 'form-control', 'disabled' => true,'id'=>'total')) !!}<br>



        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary submit">Подтвердить</button>
        </div>
    </div>

    {!! Form::close() !!}
@stop
@section('js')
    <!-- Bootstrap css library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

    <!-- Bootstrap js library -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}
    <!-- Chosen v1.8.2 -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.min.css"/>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.min.js"></script>

    <script type="text/javascript">
//        $(document).on('change', '#categories', function () {
//            var categories = $('#categories :selected').val();//注意:selected前面有個空格！
//            $.ajaxSetup({
//                headers: {
//                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                }
//            });
//            $.ajax({
//                url: "/purchase/manufacturer",
//                method: "POST",
//                data: {
//                    categories: categories
//                },
//                success: function (res) {
//                    //處理回吐的資料
//                    var obj = jQuery.parseJSON(res);
//                    var len = $("#tableA tr").length;
//                    if (len > 3) {
//                        var i = 3
//                        while (i < len) {
//                            $("#tableA tr:nth-child(3)").remove();
//                            i++;
//                        }
//                    }
//                    $('#product').empty();
//                    $('#productCopy').empty();
//                    $.each(obj, function (index, value) {
//                        console.log(value);
//                        $('#product').append('<option value="' + value['id'] + '">' + value['product_name'] + '</option>');
//                        $('#productCopy').append('<option value="' + value['id'] + '">' + value['product_name'] + '</option>');
//                    });
//                    $(".chosen").trigger("chosen:updated");
//
//
//                }
//            })//end ajax
//        });
        $(document).ready(function () {
            //group add limit
            var fnExpr = function () {
                $(".qty , .price").bind('keyup mouseup', function () {
                    var len = $("#tableA tr").length;
                    len = len - 2;
                    var i = 1;
                    var total=0;
                    while (i<=len) {
                        var qty=$("#tr"+i+" td:eq(2) input[type='number']").val();
                        var price=$("#tr"+i+" td:eq(4) input[type='number']").val();
                        if(qty*price>0){
                            $("#tr"+i+" td:eq(5) input[type='number']").val(qty*price);
                            total+=qty*price;
                            $("#total").val(total);
                        }
                        console.log(qty+"/"+price+"="+qty*price);
//                            alert(len +$("#tr"+i+" td:eq(2) input[type='number']").val());
                        i++;
                    }


                });

            };
            fnExpr();

            $(".addMore").click(function () {

                var n = $("#tableA tr:nth-last-child(2) td").eq(0).html();
                console.log(n);
                if (isNaN(n)) n = 1;
                else n++;
                $(".Copychosen").chosen("destroy");
                $(".productCopy_chosen").remove();

                var fieldHTML = '<tr class="form-group fieldGroup" id=tr'+n+'>' + '<td width="100px">' + n + '</td>' + $(".fieldGroupCopy").html() + '</tr>';

                $('table').find('.fieldGroup:last').after(fieldHTML);
                    $(".Copychosen").chosen({width: "95%"});

                fnExpr();

            });


            //remove fields group
            $("body").on("click", ".remove", function () {
                $(this).parents(".fieldGroup").remove();
                var len = $("#tableA tr").length;
                len = len - 2;
                if (len > 1) {
                    var i = 2;
                    while (len > 1) {
                        $("#tableA tr:nth-last-child(" + i + ") td").eq(0).html(len);
                        $("#tableA tr:nth-last-child(" + i + ")").attr("id","tr"+len);
                        i++;
                        len--;
                    }
                }

            });
        });
        $(".chosen").chosen({width: "95%"});


    </script>
@endsection
