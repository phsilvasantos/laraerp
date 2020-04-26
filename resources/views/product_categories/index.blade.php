@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Категория продукта</h2>
            </div>
            <div class="pull-right">
                @permission('product_categories-create')
                <a class="btn btn-success" href="{{ route('product_categories.create') }}">Новая категория продуктов</a>
                @endpermission
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr class="active">
            <th>Категория продукта</th>
            <th width="280px">Действие</th>
        </tr>
        @each('product_categories.child', $product_categories, 'category')
    </table>
    {{--    {!! $permissions->render() !!}--}}
@endsection
