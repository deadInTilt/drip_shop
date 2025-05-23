@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $coupon->name }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Купоны</li>
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
                                        <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-primary">Редактировать</a>
                                    </div>
                                    <form action="{{ route('admin.coupon.delete', $coupon->id) }}" method="post">
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
                                                <td>{{ $coupon->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Наименование</td>
                                                <td>{{ $coupon->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Процент скидки</td>
                                                <td>{{ $coupon->discount_percent }}</td>
                                            </tr>
                                            <tr>
                                                <td>Фиксированная цена</td>
                                                <td>{{ $coupon->discount_fixed }}</td>
                                            </tr>
                                            <tr>
                                                <td>Истекает</td>
                                                <td>{{ $coupon->expires_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Кол-во использований</td>
                                                <td>{{ $coupon->max_uses }}</td>
                                            </tr>
                                            <tr>
                                                <td>Использовано</td>
                                                <td>{{ $coupon->used }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата создания</td>
                                                <td>{{ $coupon->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата обновления</td>
                                                <td>{{ $coupon->updated_at }}</td>
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
