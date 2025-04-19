@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $order->id }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Заказы</li>
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
                                <div class="card-header d-flex p-3">
                                    <div class="mr-3">
                                        <a href="#" class="btn btn-primary">Редактировать</a>
                                    </div>
                                    <form action="{{ route('admin.order.delete', $order->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td>{{ $order->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Имя</td>
                                                <td>{{ $order->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Телефон</td>
                                                <td>{{ $order->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Почта</td>
                                                <td>{{ $order->email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Адрес</td>
                                                <td>{{ $order->address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Способ доставки</td>
                                                <td>{{ $order->delivery_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>Стоимость доставки</td>
                                                <td>{{ $order->delivery_cost }}</td>
                                            </tr>
                                            <tr>
                                                <td>Способ оплаты</td>
                                                <td>{{ $order->payment_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>Итого</td>
                                                <td>{{ $order->total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Статус</td>
                                                <td>{{ $order->status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата создания</td>
                                                <td>{{ $order->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата обновления</td>
                                                <td>{{ $order->updated_at }}</td>
                                            </tr>
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
            <!-- /.content -->

@endsection
