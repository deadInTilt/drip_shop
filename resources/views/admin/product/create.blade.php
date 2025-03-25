@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание товара</h1>
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
                    <div class="col-sm-6">
                        <h4 class="m-0">Характеристика товара</h4>
                    </div><!-- /.col -->
                    <div class="row mb-2 mt-2">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание" value="{{ old('description') }}"></textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="price" class="form-control" placeholder="Цена" value="{{ old('price') }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <input type="text" name="quantity" class="form-control" placeholder="Остаток" value="{{ old('quantity') }}">
                                    @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="brand_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите бренд</option>
                                    @foreach($brands as $brand)
                                        <option {{ old('brand_id') == $brand->id ? ' selected' : '' }} value="{{ $brand->id }}">{{ $brand->title }}</option>
                                    @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите категорию</option>
                                        @foreach($categories as $category)
                                        <option {{ old('category_id') == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите Цвет</option>
                                        @foreach($colors as $color)
                                            <option {{ old('color_id') == $color->id ? ' selected' : '' }} value="{{ $color->id }}">{{ $color->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('color_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Теги</label>
                                    <select name="tags_ids[]" class="tags" multiple="multiple" data-placeholder="Выберите тег" style="width: 100%;">
                                        @foreach($tags as $tag)
                                        <option {{ is_array(old('tags_ids[]')) && in_array($tag->id, old('tag_ids[]')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Загрузите превью</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="preview_image">
                                        @error('preview_image')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Создать">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
