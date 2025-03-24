@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $product->title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Товары</li>
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
                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary">Редактировать</a>
                                    </div>
                                    <form action="{{ route('admin.product.delete', $product->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td><strong>ID</strong></td>
                                                <td>{{ $product->id }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Наименование</strong></td>
                                                <td>{{ $product->title }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Описание</strong></td>
                                                <td>{{ $product->description }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Бренд</strong></td>
                                                <td>{{ $product->brand->title }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Цена</strong></td>
                                                <td>{{ $product->price }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Остаток</strong></td>
                                                <td>{{ $product->quantity }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Категория</strong></td>
                                                <td>{{ $product->category->title }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Теги</strong></td>
                                                <td>{{ $product->tags->pluck('title')->implode(', ') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Изображение</strong></td>
                                                <td>{{ $product->preview_image }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Дата создания</strong></td>
                                                <td>{{ $product->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Дата обновления</strong></td>
                                                <td>{{ $product->updated_at }}</td>
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
