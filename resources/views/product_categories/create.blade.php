@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Новая категория продуктов</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product_categories.index') }}"> Назад</a>
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

    {!! Form::open(array('route' => 'product_categories.store','method'=>'POST')) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Название:</strong>
                {!! Form::text('category_name', null, array('placeholder' => 'Category_Названия','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Родительская категория:</strong>
                <label>
                    <input type="checkbox" id="category_parent" name="category_parent" onclick="ShowHideDiv(this)">
                </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" id="child_div" style="display:block">
            <div class="form-group">
                <strong>Подчиненная категория:</strong>
                <select name="category_child">
                    @each('product_categories.child_select', $product_categories, 'category')
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Подтвердить</button>
        </div>
    </div>
    {!! Form::close() !!}

@stop
@section('js')
    <script type="text/javascript">
        function ShowHideDiv(category_parent) {
            var child_div = document.getElementById("child_div");
            child_div.style.display = category_parent.checked ? "none" : "block";
        }
    </script>
@endsection
