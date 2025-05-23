@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание купона</h1>
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
                        <form action="{{ route('admin.coupon.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Наименование">
                            </div>
                            <div class="form-group">
                                <input type="text" name="discount_percent" class="form-control" placeholder="Процент скидки">
                            </div>
                            <div class="form-group">
                                <input type="text" name="discount_fixed" class="form-control" placeholder="Фиксированная цена">
                            </div>
                            <div class="form-group">
                                <input type="date" name="expires_at" class="form-control" placeholder="Истекает">
                            </div>
                            <div class="form-group">
                                <input type="text" name="max_uses" class="form-control" placeholder="Кол-во использований">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Создать">
                            </div>
                        </form>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->

@endsection
