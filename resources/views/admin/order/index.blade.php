@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Заказы</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Главная</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Имя</th>
                                            <th>Телефон</th>
                                            <th>Почта</th>
                                            <th>Адрес</th>
                                            <th>Способ доставки</th>
                                            <th>Стоимость доставки</th>
                                            <th>Способ оплаты</th>
                                            <th>Итого</th>
                                            <th>Статус</th>
                                            <th>Дата создания</th>
                                            <th>Дата обновления</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('admin.order.show', $order->id) }}">{{ $order->id }}</a>
                                                </td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->email }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->delivery_method }}</td>
                                                <td>{{ $order->delivery_cost }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->total }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->updated_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

@endsection
