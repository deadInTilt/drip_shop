@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Купоны</h1>
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
                                <div class="card-header">
                                    <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary">Создать</a>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Наименование</th>
                                            <th>Процент скидки</th>
                                            <th>Фиксированная цена</th>
                                            <th>Истекает</th>
                                            <th>Кол-во использований</th>
                                            <th>Использован</th>
                                            <th>Дата создания</th>
                                            <th>Дата обновления</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($coupons as $coupon)
                                            <tr>
                                                <td>{{ $coupon->id }}</td>
                                                <td>
                                                    <a href="{{ route('admin.coupon.show', $coupon->id) }}">{{ $coupon->name }}</a>
                                                </td>
                                                <td>{{ $coupon->discount_percent }}</td>
                                                <td>{{ $coupon->discount_fixed }}</td>
                                                <td>{{ $coupon->expires_at }}</td>
                                                <td>{{ $coupon->max_uses }}</td>
                                                <td>{{ $coupon->used }}</td>
                                                <td>{{ $coupon->created_at }}</td>
                                                <td>{{ $coupon->updated_at }}</td>
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
