@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Управление производством</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('manufacturer.create') }}"> Создать нового производителя</a>
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
            <th>Код производителя</th>
            <th>Название</th>
            <th>Ответственное лицо</th>
            <th>Контактное лицо</th>
            <th>Телефон</th>
            <th>Факс</th>
            <th>Email</th>
            <th>Почтовый индекс</th>
            <th>Адрес</th>
            <th>Номер GUI</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($manufacturers as $key => $manufacturer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $manufacturer->manufacturer_code }}</td>
                <td>{{ $manufacturer->manufacturer_name }}</td>
                <td>{{ $manufacturer->manufacturer_owner }}</td>
                <td>{{ $manufacturer->manufacturer_liaison }}</td>
                <td>{{ $manufacturer->manufacturer_phone }}</td>
                <td>{{ $manufacturer->manufacturer_fax }}</td>
                <td>{{ $manufacturer->manufacturer_email }}</td>
                <td>{{ $manufacturer->manufacturer_ZipCode }}</td>
                <td>{{ $manufacturer->manufacturer_address }}</td>
                <td>{{ $manufacturer->manufacturer_GUInumber }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('manufacturer.show',$manufacturer->id) }}">Просмотр</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('manufacturer.edit',$manufacturer->id) }}">Редактировать</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $manufacturers->render() !!}
@endsection
