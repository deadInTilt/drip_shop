@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('shop/images/inner-pages/breadcum-bg.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                            <h2>Каталог</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Главная</a></li>
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
                                <li> <a href="#0" class="img-box">
                                        <div class="inner">
                                            <img src="{{ asset('storage') . '/' . $category->preview_image }}" alt="" />
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
                        <div class="shop-grid-sidebar"> <button class="remove-sidebar d-lg-none d-block"> <i
                                    class="flaticon-cross"> </i> </button>
                            <div class="sidebar-holder">
                                <form action="#0" class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated">
                                    <div class="footer-input-box p-0 "> <input type="email" placeholder="Элекронная почта"
                                                                               name="email"> <button type="submit" class="subscribe_btn"> <i
                                                class="flaticon-magnifying-glass"></i> </button> </div>
                                </form>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Выберите категорию</h4>
                                    <div class="checkbox-item">
                                        <form>
                                            @foreach($categories as $category)
                                            <div class="form-group"> <input type="checkbox" id="bedroom"> <label
                                                    for="bedroom">{{ $category->title }}</label>
                                            </div>
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Цвет </h4>
                                    <ul class="color-option">
                                        <li> <a href="#0" class="color-option-single"> <span> Black</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg2"> <span> Yellow</span> </a>
                                        </li>
                                        <li> <a href="#0" class="color-option-single bg3"> <span> Red</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg4"> <span> Blue</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg5"> <span> Green</span> </a>
                                        </li>
                                        <li> <a href="#0" class="color-option-single bg6"> <span> Olive</span> </a>
                                        </li>
                                        <li> <a href="#0" class="color-option-single bg7"> <span> Lime</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg8"> <span> Pink</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg9"> <span> Cyan</span> </a> </li>
                                        <li> <a href="#0" class="color-option-single bg10"> <span> Magenta</span> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Цена</h4>
                                    <div class="slider-box">
                                        <div id="price-range" class="slider"></div>
                                        <div class="output-price"> <label for="priceRange">Price:</label> <input
                                                type="text" id="priceRange" readonly> </div> <button class="filterbtn"
                                                                                                     type="submit"> Filter </button>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0">
                                    <h4>Теги </h4>
                                    <ul class="popular-tag">
                                        @foreach($tags as $tag)
                                        <li><a href="#0">{{ $tag->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div
                                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                                    <div class="left-box wow fadeInUp animated">
                                        <p>Показано 10 из 50 результатов</p>
                                    </div>
                                    <div
                                        class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                                        <div class="short-by">
                                            <div class="select-box"> <select class="wide">
                                                    <option data-display="Новое">Featured </option>
                                                    <option value="1">Лучшее </option>
                                                    <option value="2">По наименованию, А-Я</option>
                                                    <option value="3">По наименованию, Я-А</option>
                                                    <option value="3">Цена, по возрастанию</option>
                                                    <option value="3">Цена, по убыванию</option>
                                                </select> </div>
                                        </div>
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
                                                        <a href="shop-details-3.html" class="d-block"> <img
                                                                src="{{ asset('storage/' . $product->preview_image) }}"
                                                                class="first-img" alt="" />
                                                            <img src="{{ asset('storage/' . $product->preview_image) }}"
                                                                 alt="" class="hover-img" />
                                                        </a>
                                                        <a href="cart.html" class="addcart btn--primary style2">
                                                            Добавить в корзину </a>
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
                                                                            <h2> {{ $product->price }} РУБ <del> 20000 РУБ </del></h2>
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
                                                    <!--End Quick View-->
                                                    <div class="products-three-single-content text-center"> <span> {{ $product->category->title }}</span>
                                                        <h5><a href="shop-details-3.html">{{$product->title}}</a></h5>
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
                                                        <a href="shop-details-2.html" class="d-block"> <img
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
                                                                            <h2> {{ $product->price }} РУБ <del> 20000 РУБ </del></h2>
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
                                                        <h5><a href="shop-details-2.html">{{ $product->title }}</a></h5>
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
                            <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                                <ul class="pagination text-center">
                                    <li class="next"><a href="#0"><i class="flaticon-left-arrows"
                                                                     aria-hidden="true"></i> </a></li>
                                    <li><a href="#0">1</a></li>
                                    <li><a href="#0" class="active">2</a></li>
                                    <li><a href="#0">3</a></li>
                                    <li><a href="#0">...</a></li>
                                    <li><a href="#0">10</a></li>
                                    <li class="next"><a href="#0"><i class="flaticon-next-1"
                                                                     aria-hidden="true"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End product-grid-->
    </main>
@endsection
