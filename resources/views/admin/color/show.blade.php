@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $color->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Цвета</li>
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
                                        <a href="{{ route('admin.color.edit', $color->id) }}" class="btn btn-primary">Редактировать</a>
                                    </div>
                                    <form action="{{ route('admin.color.delete', $color->id) }}" method="post">
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
                                                <td>{{ $color->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Наименование</td>
                                                <td>{{ $color->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Цвет</td>
                                                <td>
                                                    <div style="width: 16px; height: 16px; background: {{ '#' . $color->color }}; border: 1px solid #000"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Дата создания</td>
                                                <td>{{ $color->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата обновления</td>
                                                <td>{{ $color->updated_at }}</td>
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
