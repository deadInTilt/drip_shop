@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Товары</h1>
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
                                    <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Создать</a>
                                    <a href="{{ route('admin.product.import-index') }}" class="btn btn-primary">Загрузить</a>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Наименование</th>
                                            <th>Описание</th>
                                            <th>Бренд</th>
                                            <th>Цена</th>
                                            <th>Остаток</th>
                                            <th>Категория</th>
                                            <th>Группа</th>
                                            <th>Цвет</th>
                                            <th>Теги</th>
                                            <th>Изображение</th>
                                            <th>Дата создания</th>
                                            <th>Дата обновления</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>
                                                    <a href="{{ route('admin.product.show', $product->id) }}">{{ $product->title }}</a>
                                                </td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->brand->title }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->category->title }}</td>
                                                <td>{{ $product->group_id ? $product->group->title : 'Не задана' }}</td>
                                                <td>
                                                    <div style="width: 16px; height: 16px; background: {{ '#' . ($product->color_id ? $product->color->color : 'Не указан') }}; border: 1px solid #000"></div>
                                                </td>
                                                <td>{{ $product->tags->pluck('title')->implode(', ') }}</td>
                                                <td>{{ $product->preview_image }}</td>
                                                <td>{{ $product->created_at }}</td>
                                                <td>{{ $product->updated_at }}</td>
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
