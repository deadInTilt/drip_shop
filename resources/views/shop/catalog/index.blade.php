@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('storage/images/shoes/catalog_main.jpeg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                            <h2>Каталог</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="{{ route('shop.home.index') }}"><i class="flaticon-home pe-2"></i>Главная</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Каталог</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Product Categories One-->
        <section class="product-categories-one pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp animated">
                        <div class="product-categories-one__inner">
                            <ul>
                                @foreach($categories as $category)
                                    <li> <a href="{{ route('shop.catalog.index', ['category_id' => $category->id]) }}" class="img-box">
                                            <div class="inner">
                                                <img src="{{ asset($category->makeThumbnail('70x70')) }}" alt="" />
                                            </div>
                                        </a>
                                        <div class="title"> <a href="#0">
                                                <h6>{{ $category->title }}</h6>
                                            </a> </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Product Categories One-->
        <!--Start product-grid-->
        <div class="product-grid pt-60 pb-120">
            <div class="container">
                <div class="row gx-4">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop-grid-sidebar">
                            <button class="remove-sidebar d-lg-none d-block">
                                <i class="flaticon-cross"> </i>
                            </button>
                            <div class="sidebar-holder">
                                <form method="GET" action="{{ route('shop.catalog.index') }}" class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated">

                                    {{-- Скрытое поле с поиском --}}
                                    @if(request()->has('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif

                                    {{-- Скрытое поле с категорией --}}
                                    @if(request()->has('category_id'))
                                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                    @endif

                                    {{-- Скрытое поле с брендом --}}
                                    @if(request()->has('brands'))
                                        <input type="hidden" name="brands[]" value="{{ request('brands[]') }}">
                                    @endif

                                    {{-- Скрытое поле с цветом --}}
                                    @if(request()->has('colors'))
                                        <input type="hidden" name="colors[]" value="{{ request('colors[]') }}">
                                    @endif

                                    {{-- Скрытое поле с ценой --}}
                                    @if(request()->has('price.from'))
                                        <input type="hidden" name="price[from]" value="{{ request('price.from') }}">
                                    @endif

                                    {{-- Скрытое поле с ценой --}}
                                    @if(request()->has('price.to'))
                                        <input type="hidden" name="price[to]" value="{{ request('price.to') }}">
                                    @endif

                                    {{-- Скрытое поле с тегом --}}
                                    @if(request()->has('tags'))
                                        <input type="hidden" name="tags[]" value="{{ request('tags[]') }}">
                                    @endif



                                    <div class="footer-input-box p-0 ">
                                        <input type="search"
                                               placeholder="Поиск товаров"
                                               value="{{ request('search') }}"
                                               name="search">
                                        <button type="submit" class="subscribe_btn">
                                            <i class="flaticon-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </form>

                                <form method="GET" action="{{ route('shop.catalog.index') }}">

                                    {{-- Скрытое поле с поиском --}}
                                     @if(request()->has('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif

                                    {{-- Скрытое поле с категорией --}}
                                    @if(request()->has('category_id'))
                                        <input type="hidden" name="category_id" value="{{ request('category_id') }}">
                                    @endif

                                    {{-- Категории --}}
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Выберите категорию</h4>
                                        <div class="checkbox-item">
                                            @foreach($categories as $category)
                                                <div class="form-group">
                                                    <input name="categories[]"
                                                           type="checkbox"
                                                           value="{{ $category->id }}"
                                                           {{ in_array($category->id, request()->input('categories', [])) ? 'checked' : '' }}
                                                           id="category_{{ $category->id }}">
                                                    <label for="category_{{ $category->id }}">{{ $category->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Выберите бренд</h4>
                                        <div class="checkbox-item">
                                            @foreach($brands as $brand)
                                                <div class="form-group">
                                                    <input name="brands[]"
                                                           type="checkbox"
                                                           value="{{ $brand->id }}"
                                                           {{ in_array($brand->id, request()->input('brands', [])) ? 'checked' : '' }}
                                                           id="brand_{{ $brand->id }}">
                                                    <label for="brand_{{ $brand->id }}">{{ $brand->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Цвета --}}
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Цвет</h4>
                                        <div class="checkbox-item">
                                            @foreach($colors as $color)
                                                <div class="form-group">
                                                    <input name="colors[]"
                                                           type="checkbox"
                                                           value="{{ $color->id }}"
                                                           {{ in_array($color->id, request()->input('colors', [])) ? 'checked' : '' }}
                                                           id="color_{{ $color->id }}">
                                                    <label for="color_{{ $color->id }}">{{ $color->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Цена --}}
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Цена</h4>
                                        <div class="slider-box">
                                            <div class="output-price">
                                                <label for="min_price">Минимальная цена:</label>
                                                <input type="text"
                                                       id="min_price"
                                                       name="price[from]"
                                                       value="{{ request('price.from') }}"
                                                       placeholder="0">
                                            </div>
                                            <div class="output-price">
                                                <label for="max_price">Максимальная цена:</label>
                                                <input type="text"
                                                       id="max_price"
                                                       name="price[to]"
                                                       value="{{ request('price.to') }}"
                                                       placeholder="{{ ($priceRange['max'] ? $priceRange['max']->price : 'не указано') }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Теги --}}
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <h4>Теги</h4>
                                        <div class="checkbox-item">
                                            @foreach($tags as $tag)
                                                <div class="form-group">
                                                    <input name="tags[]"
                                                           type="checkbox"
                                                           value="{{ $tag->id }}"
                                                           {{ in_array($tag->id, request()->input('filters.tags', [])) ? 'checked' : '' }}
                                                           id="tag_{{ $tag->id }}">
                                                    <label for="tag_{{ $tag->id }}">{{ $tag->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- Кнопка фильтра --}}
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <button class="btn btn-secondary mt-2" type="submit">Применить фильтр</button>
                                    </div>
                                    <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                        <a href="{{ route('shop.catalog.index') }}" class="btn btn-secondary mt-2">Сбросить фильтр</a>
                                    </div>
                                    {{-- Сохраняем текущую сортировку --}}
                                    @if(request('sort'))
                                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div
                                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                                    <div class="left-box wow fadeInUp animated">
                                    </div>
                                    <div
                                        class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                                        <form method="GET" action="{{ route('shop.catalog.index') }}" class="d-flex align-items-center">
                                            <div class="short-by me-3">
                                                <div class="select-box">
                                                    <select name="sort" class="wide" onchange="this.form.submit()">
                                                        <option value="" disabled {{ request('sort') ? '' : 'selected' }}>Сортировка</option>
                                                        <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Новое</option>
                                                        <option value="best" {{ request('sort') === 'best' ? 'selected' : '' }}>Лучшее</option>
                                                        <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>По наименованию, А-Я</option>
                                                        <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>По наименованию, Я-А</option>
                                                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Цена, по возрастанию</option>
                                                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Цена, по убыванию</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                        <div
                                            class="product-view-style d-flex justify-content-md-between justify-content-center">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active"
                                                            id="pills-grid-tab"
                                                            data-bs-toggle="pill"
                                                            data-bs-target="#pills-grid"
                                                            type="button"
                                                            role="tab"
                                                            aria-selected="true">
                                                        <i class="flaticon-grid"></i>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button
                                                        class="nav-link" id="pills-list-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#pills-list"
                                                        type="button"
                                                        role="tab"
                                                        aria-selected="false">
                                                        <i class="flaticon-list"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                            <button class="slidebarfilter d-lg-none d-flex">
                                                <i class="flaticon-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                         aria-labelledby="pills-grid-tab">
                                        <div class="row">
                                            <!--Start item card-->
                                            @foreach($products as $product)
                                            <div class="col-xl-4 col-lg-6 col-6 ">
                                                <div class="products-three-single  wow w-100 ">
                                                    <div class="products-three-single-img">
                                                        <a href="{{ route('shop.product.index', $product->id) }}" class="d-block"> <img
                                                                src="{{ asset($product->makeThumbnail('1000x1200')) }}"
                                                                class="first-img" alt="" />
                                                            <img src="{{ asset($product->makeThumbnail('1000x1200')) }}"
                                                                 alt="" class="hover-img" />
                                                        </a>
                                                        <form action="{{ route('shop.cart.add') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <button type="submit" class="addcart btn--primary style2">Добавить в корзину</button>
                                                        </form>
                                                        <div class="products-grid__usefull-links">
                                                            <ul>
                                                                <li><a href="#0"> <i class="flaticon-heart"> </i> <span>
                                                                            Избранное</span>
                                                                    </a> </li>
                                                                <li><a href="#popup2" class="popup_link"> <i
                                                                            class="flaticon-visibility"></i>
                                                                        <span> Быстрый просмотр</span>
                                                                    </a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--Quick View-->
                                                    <div id="popup2" class="product-gird__quick-view-popup mfp-hide">
                                                        <div class="container">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-lg-6">
                                                                    <div class="quick-view__left-content">
                                                                        <div class="tabs">
                                                                            <div class="popup-product-thumb-box">
                                                                                <ul>
                                                                                    <li
                                                                                        class="tab-nav popup-product-thumb ">
                                                                                        <a href="#tab9111111b"> <img
                                                                                                src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                                                alt="" /> </a> </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="popup-product-main-image-box">
                                                                                <div id="tab9111111b"
                                                                                     class="tab-item popup-product-image">
                                                                                    <div
                                                                                        class="popup-product-single-image">
                                                                                        <img src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                                             alt="" /> </div>
                                                                                </div> <button class="prev"> <i
                                                                                        class="flaticon-back"></i>
                                                                                </button> <button class="next"> <i
                                                                                        class="flaticon-next"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="popup-right-content">
                                                                        <h3>{{ $product->title }}</h3>
                                                                        <div class="ratting"> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i>
                                                                            <span>(123)</span> </div>
                                                                        <p class="text"> {{ $product->description }} </p>
                                                                        <div class="price">
                                                                            <h2> {{ $product->price }} </h2>
                                                                            <h6>РУБ</h6>
                                                                            @if($product->quantity)
                                                                                <div class="product-quantity-check"> <i class="flaticon-select"></i>
                                                                                    <p>В наличии</p>
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="color-varient"> <a href="#0"
                                                                                                       class="color-name pink">
                                                                                <span>Pink</span> </a> <a href="#0"
                                                                                                          class="color-name red"> <span>Red</span>
                                                                            </a> <a href="#0"
                                                                                    class="color-name yellow"><span>Yellow</span>
                                                                            </a> <a href="#0" class="color-name blue">
                                                                                <span>Blue</span> </a> <a href="#0"
                                                                                                          class="color-name black">
                                                                                <span>Black</span> </a> </div>
                                                                        <div class="add-product">
                                                                            <h6>Qty:</h6>
                                                                            <div class="button-group">
                                                                                <div class="qtySelector text-center">
                                                                                    <span class="decreaseQty"><i
                                                                                            class="flaticon-minus"></i>
                                                                                    </span> <input type="number"
                                                                                                   class="qtyValue" value="1" />
                                                                                    <span class="increaseQty"> <i
                                                                                            class="flaticon-plus"></i>
                                                                                    </span> </div> <button
                                                                                    class="btn--primary "> Добавить
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--End Quick View-->
                                                    <div class="products-three-single-content text-center"> <span> {{ $product->category->title }}</span>
                                                        <h5><a href="{{ route('shop.product.index', $product->id) }}">{{$product->title}}</a></h5>
                                                        <p>{{ $product->price }} РУБ </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!--End item card-->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-list" role="tabpanel"
                                         aria-labelledby="pills-list-tab">
                                        <div class="row ">
                                            @foreach($products as $product)
                                            <div class="col-12">
                                                <div class="product-grid-two list mt-30 ">
                                                    <div class="product-grid-two__img">
                                                        <a href="{{ route('shop.product.index', $product->id) }}" class="d-block"> <img
                                                                src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                class="first-img" alt="" /> <img
                                                                src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                alt="" class="hover-img" /> </a>
                                                    </div>
                                                    <div id="popupb" class="product-gird__quick-view-popup mfp-hide">
                                                        <div class="container">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-lg-6">
                                                                    <div class="quick-view__left-content">
                                                                        <div class="tabs">
                                                                            <div class="popup-product-thumb-box">
                                                                                <ul>
                                                                                    <li
                                                                                        class="tab-nav popup-product-thumb ">
                                                                                        <a href="#tab9111111b"> <img
                                                                                                src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                                                alt="" /> </a> </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="popup-product-main-image-box">
                                                                                <div id="tab9111111b"
                                                                                     class="tab-item popup-product-image">
                                                                                    <div
                                                                                        class="popup-product-single-image">
                                                                                        <img src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                                             alt="" /> </div>
                                                                                </div> <button class="prev"> <i
                                                                                        class="flaticon-back"></i>
                                                                                </button> <button class="next"> <i
                                                                                        class="flaticon-next"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="popup-right-content">
                                                                        <h3>{{ $product->title }}</h3>
                                                                        <div class="ratting"> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i>
                                                                            <span>(123)</span> </div>
                                                                        <p class="text"> {{ $product->description }} </p>
                                                                        <div class="price">
                                                                            <h2> {{ $product->price }} РУБ</h2>
                                                                            <h6> В наличии</h6>
                                                                        </div>
                                                                        <div class="color-varient"> <a href="#0"
                                                                                                       class="color-name pink">
                                                                                <span>Pink</span> </a> <a href="#0"
                                                                                                          class="color-name red"> <span>Red</span>
                                                                            </a> <a href="#0"
                                                                                    class="color-name yellow"><span>Yellow</span>
                                                                            </a> <a href="#0" class="color-name blue">
                                                                                <span>Blue</span> </a> <a href="#0"
                                                                                                          class="color-name black">
                                                                                <span>Black</span> </a> </div>
                                                                        <div class="add-product">
                                                                            <h6>Qty:</h6>
                                                                            <div class="button-group">
                                                                                <div class="qtySelector text-center">
                                                                                    <span class="decreaseQty"><i
                                                                                            class="flaticon-minus"></i>
                                                                                    </span> <input type="number"
                                                                                                   class="qtyValue" value="1" />
                                                                                    <span class="increaseQty"> <i
                                                                                            class="flaticon-plus"></i>
                                                                                    </span> </div> <button
                                                                                    class="btn--primary "> Добавить
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-method"> <a href="#0"> <img
                                                                                    src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                                    alt=""> </a> <a href="#0"> <img
                                                                                    src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                                    alt=""> </a> <a href="#0"> <img
                                                                                    src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                                    alt=""> </a> <a href="#0"> <img
                                                                                    src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                                    alt=""> </a> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-grid-two-content text-center">
                                                        <span> {{ $product->category->title }}</span>
                                                        <h5><a href="{{ route('shop.product.index', $product->id) }}">{{ $product->title }}</a></h5>
                                                        <p><del>20000 РУБ</del>
                                                            {{ $product->price }} РУБ</p>
                                                        <p class="text"> {{ $product->description }} </p>
                                                        <div class="product-grid-two__overlay-box">
                                                            <div class="title">
                                                                <h6><a href="cart.html">Добавить в корзину</a></h6>
                                                            </div>
                                                            <div class="icon">
                                                                <ul>
                                                                    <li><a href="#popupb" class="popup_link"><i
                                                                                class="flaticon-eye"></i></a> </li>
                                                                    <li><a href="wishlist.html"><i
                                                                                class="flaticon-heart"></i></a> </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-grid justify-content-center wow fadeInUp animated">
                                <div>
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End product-grid-->
        <!-- recent-products Start -->
        <section class="recent-products pb-120 overflow-hidden wow fadeInUp">
            <div class="container ">
                <div class="row">
                    <div class="col-12 wow fadeInUp animated">
                        <div class="section-head text-center">
                            <h2> Просмотренные товары </h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-30 wow fadeInUp animated">
                    <div class="catagory-slider">
                        @foreach($viewedProducts as $product)
                            <div class="col-xl-4 col-lg-6 col-6 ">
                                <div class="products-three-single  wow w-100 ">
                                    <div class="products-three-single-img">
                                        <a href="{{ route('shop.product.index', $product->id) }}" class="d-block"> <img
                                                src="{{ asset($product->makeThumbnail('1000x1200')) }}"
                                                class="first-img" alt="" />
                                            <img src="{{ asset($product->makeThumbnail('1000x1200')) }}"
                                                 alt="" class="hover-img" />
                                        </a>
                                        <form action="{{ route('shop.cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="addcart btn--primary style2">Добавить в корзину</button>
                                        </form>
                                        <div class="products-grid__usefull-links">
                                            <ul>
                                                <li><a href="#0"> <i class="flaticon-heart"> </i> <span>
                                                                            Избранное</span>
                                                    </a> </li>
                                                <li><a href="#popup2" class="popup_link"> <i
                                                            class="flaticon-visibility"></i>
                                                        <span> Быстрый просмотр</span>
                                                    </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Quick View-->
                                    <div id="popup2" class="product-gird__quick-view-popup mfp-hide">
                                        <div class="container">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-lg-6">
                                                    <div class="quick-view__left-content">
                                                        <div class="tabs">
                                                            <div class="popup-product-thumb-box">
                                                                <ul>
                                                                    <li
                                                                        class="tab-nav popup-product-thumb ">
                                                                        <a href="#tab9111111b"> <img
                                                                                src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                                alt="" /> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <div class="popup-product-main-image-box">
                                                                <div id="tab9111111b"
                                                                     class="tab-item popup-product-image">
                                                                    <div
                                                                        class="popup-product-single-image">
                                                                        <img src="{{ asset('storage/') . '/' . $product->preview_image }}"
                                                                             alt="" /> </div>
                                                                </div> <button class="prev"> <i
                                                                        class="flaticon-back"></i>
                                                                </button> <button class="next"> <i
                                                                        class="flaticon-next"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="popup-right-content">
                                                        <h3>{{ $product->title }}</h3>
                                                        <div class="ratting"> <i
                                                                class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i>
                                                            <span>(123)</span> </div>
                                                        <p class="text"> {{ $product->description }} </p>
                                                        <div class="price">
                                                            <h2> {{ $product->price }} </h2>
                                                            <h6>РУБ</h6>
                                                            @if($product->quantity)
                                                                <div class="product-quantity-check"> <i class="flaticon-select"></i>
                                                                    <p>В наличии</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="color-varient"> <a href="#0"
                                                                                       class="color-name pink">
                                                                <span>Pink</span> </a> <a href="#0"
                                                                                          class="color-name red"> <span>Red</span>
                                                            </a> <a href="#0"
                                                                    class="color-name yellow"><span>Yellow</span>
                                                            </a> <a href="#0" class="color-name blue">
                                                                <span>Blue</span> </a> <a href="#0"
                                                                                          class="color-name black">
                                                                <span>Black</span> </a> </div>
                                                        <div class="add-product">
                                                            <h6>Qty:</h6>
                                                            <div class="button-group">
                                                                <div class="qtySelector text-center">
                                                                                    <span class="decreaseQty"><i
                                                                                            class="flaticon-minus"></i>
                                                                                    </span> <input type="number"
                                                                                                   class="qtyValue" value="1" />
                                                                    <span class="increaseQty"> <i
                                                                            class="flaticon-plus"></i>
                                                                                    </span> </div> <button
                                                                    class="btn--primary "> Добавить
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Quick View-->
                                    <div class="products-three-single-content text-center"> <span> {{ $product->category->title }}</span>
                                        <h5><a href="{{ route('shop.product.index', $product->id) }}">{{$product->title}}</a></h5>
                                        <p>{{ $product->price }} РУБ </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section> <!-- recent-products End -->
    </main>
@endsection
