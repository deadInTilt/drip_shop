@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование товара</h1>
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
                    <div class="row mb-2 mt-2 w-25">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Наименование" value="{{ $product->title }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea name="description" class="form-control" placeholder="Описание">{{ $product->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="price" class="form-control" placeholder="Цена" value="{{ $product->price }}">
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="quantity" class="form-control" placeholder="Остаток" value="{{ $product->quantity }}">
                                    @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="brand_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите бренд</option>
                                        @foreach($brands as $brand)
                                            <option {{ $product->brand_id == $brand->id ? ' selected' : '' }} value="{{ $brand->id }}">{{ $brand->title }}</option>
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
                                            <option {{ $product->category_id == $category->id ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="group_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите группу</option>
                                        @foreach($groups as $group)
                                            <option {{ $product->group_id == $group->id ? ' selected' : '' }} value="{{ $group->id }}">{{ $group->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="color_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Выберите цвет</option>
                                        @foreach($colors as $color)
                                            <option {{ $product->color_id == $color->id ? ' selected' : '' }} value="{{ $color->id }}">{{ $color->title }}</option>
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
                                            <option {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Загрузите превью</label>
                                    <div class="w-50">
                                        <img src="{{ asset('/storage/' . $product->preview_image) }}" alt="preview_image" class="w-50 mb-3">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="inputGroupFile02" name="preview_image">
                                        @error('preview_image')
                                        <div class="text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Обновить">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->

@endsection
