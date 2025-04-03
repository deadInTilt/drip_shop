@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Группы</h1>
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
                                    <a href="{{ route('admin.group.create') }}" class="btn btn-primary">Создать</a>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Наименование</th>
                                            <th>Описание</th>
                                            <th>Дата создания</th>
                                            <th>Дата обновления</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($groups as $group)
                                            <tr>
                                                <td>{{ $group->id }}</td>
                                                <td>
                                                    <a href="{{ route('admin.group.show', $group->id) }}">{{ $group->title }}</a>
                                                </td>
                                                <td>{{ $group->description }}</td>
                                                <td>{{ $group->created_at }}</td>
                                                <td>{{ $group->updated_at }}</td>
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
