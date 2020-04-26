@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Управление клиентами</h2>
            </div>
            <div class="pull-right">
                {{--@permission('customer-create')--}}
                <a class="btn btn-success" href="{{ route('customer.create') }}"> Создать нового клиента</a>
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
            <th>Код клиента</th>
            <th>Имя</th>
            <th>Ответственное лицо</th>
            <th>Контактное лицо</th>
            <th>Телефон</th>
            <th>Факс</th>
            <th>Email</th>
            <th>Почтовый индекс</th>
            <th>Адрес</th>
            <th>Номер-GUI</th>
            <th width="280px">Действие</th>
        </tr>
        @foreach ($customers as $key => $customer)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $customer->customer_code }}</td>
                <td>{{ $customer->customer_name }}</td>
                <td>{{ $customer->customer_owner }}</td>
                <td>{{ $customer->customer_liaison }}</td>
                <td>{{ $customer->customer_phone }}</td>
                <td>{{ $customer->customer_fax }}</td>
                <td>{{ $customer->customer_email }}</td>
                <td>{{ $customer->customer_ZipCode }}</td>
                <td>{{ $customer->customer_address }}</td>
                <td>{{ $customer->customer_GUInumber }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('customer.show',$customer->id) }}">Просмотр</a>
                    {{--@permission('company-edit')--}}
                    <a class="btn btn-primary" href="{{ route('customer.edit',$customer->id) }}">Редактировать</a>
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $customers->render() !!}
@endsection
