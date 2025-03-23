@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $role->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Роли</li>
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
                                        <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary">Редактировать</a>
                                    </div>
                                    <form action="{{ route('admin.role.delete', $role->id) }}" method="post">
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
                                                <td>{{ $role->id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Наименование</td>
                                                <td>{{ $role->title }}</td>
                                            </tr>
                                            <tr>
                                                <td>Описание</td>
                                                <td>{{ $role->description }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата создания</td>
                                                <td>{{ $role->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>Дата обновления</td>
                                                <td>{{ $role->updated_at }}</td>
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
