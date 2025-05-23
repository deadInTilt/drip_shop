@extends('shop.layouts.main')
@section('content')
    <main>
        <!--Start Shop Details Breadcrumb-->
        <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-details-inner">
                            <ul class="shop-details-menu">
                                <li><a href="index.html">Home</a></li>
                                <li class="active">Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Shop Details Breadcrumb-->
        <!--Start Shop Details Top-->
        <section class="shop-details-top two ">
            <div class="container">
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                        <div class="single-product-box one">
                            <div class="big-product single-product-one slider-for">
                                <div>
                                    <div class="single-item"> <img src="{{ asset('storage') . '/' . $product->preview_image }}" alt="">
                                        <div class="ptag"> <span class="one">-20% </span> </div> <a href="#0"
                                                                                                    class="love"> <i class="flaticon-like"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
                        <div class="shop-details-top-right ">
                            <div class="shop-details-top-right-content-box">

                                {{--Likes--}}
{{--                                <div class="shop-details-top-review-box">--}}
{{--                                    <div class="shop-details-top-review">--}}
{{--                                        <ul>--}}
{{--                                            <li><i class="flaticon-star-1"></i></li>--}}
{{--                                            <li><i class="flaticon-star-1"></i></li>--}}
{{--                                            <li><i class="flaticon-star-1"></i></li>--}}
{{--                                            <li><i class="flaticon-star-1"></i></li>--}}
{{--                                            <li><i class="flaticon-star-1"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <p>(2 Reviews)</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                {{--Info--}}
                                <div class="shop-details-top-title">
                                    <h3>{{ $product->title }}</h3>
                                </div>
                                <ul class="shop-details-top-info">
                                    <li><span>ID:</span> {{ $product->id }}</li>
                                    <li><span>Категория:</span> {{ $product->category->title }}</li>
                                </ul>
                                <div class="shop-details-top-price-box">
                                    <h3> {{ $product->price }} руб</h3>
                                </div>
                                <p class="shop-details-top-product-sale"><span>N</span> штук продано за 12 часов
                                </p>
                                <div class="shop-details-top-size-box">
                                    <h4>Размер: (XS)</h4>
                                    <div class="shop-details-top-size-list-box">
                                        <ul class="shop-details-top-size-list">
                                            <li><a href="#0">XS</a></li>
                                            <li><a href="#0">S</a></li>
                                            <li><a href="#0">M</a></li>
                                            <li><a href="#0">XL</a></li>
                                        </ul>
                                        <p class="shop-details-top-size-guide"><a href="#0">Размеры</a></p>
                                    </div>
                                </div>
                                <div class="shop-details-top-color-sky-box">
                                    <h4>Цвет: ({{ $product->color->title }})</h4>

                                    {{--Group Of Products--}}
                                    <ul class="varients">
                                        <li> <a href="#0" class="shop-details-top-color-sky-img"
                                                data-src="{{ asset('shop/images/shop/products-img1.jpg') }}"> <img
                                                    src="{{ asset('shop/images/shop/shop-details-top-color-sky-img-1.jpg') }}"
                                                    alt=""> </a> </li>
                                        <li> <a href="#0" class="shop-details-top-color-sky-img"
                                                data-src="{{ asset('shop/images/shop/products-img2.jpg') }}"> <img
                                                    src="{{ asset('shop/images/shop/shop-details-top-color-sky-img-2.jpg') }}"
                                                    alt=""> </a> </li>
                                        <li> <a href="#0" class="shop-details-top-color-sky-img"
                                                data-src="{{ asset('shop/images/shop/products-img3.jpg') }}"> <img
                                                    src="{{ asset('shop/images/shop/shop-details-top-color-sky-img-3.jpg') }}"
                                                    alt=""> </a> </li>
                                        <li> <a href="#0" class="shop-details-top-color-sky-img"
                                                data-src="{{ asset('shop/images/shop/products-img4.jpg') }}"> <img
                                                    src="{{ asset('shop/images/shop/shop-details-top-color-sky-img-4.jpg') }}"
                                                    alt=""> </a> </li>
                                    </ul>
                                </div>
                                <p class="shop-details-top-product-sale"><span>N</span> людей просматривают товар</p>
                                <div class="product-quantity">
                                    <h4>Количество</h4>
                                    <div class="product-quantity-box d-flex align-items-center flex-wrap">
                                        <div class="qty mr-2">
                                            <div class="qtySelector text-center"> <span class="decreaseQty"><i
                                                        class="flaticon-minus"></i> </span> <input type="number"
                                                                                                   class="qtyValue" value="1" /> <span class="increaseQty"> <i
                                                        class="flaticon-plus"></i> </span> </div>
                                        </div>

                                        @if($product->quantity)
                                        <div class="product-quantity-check"> <i class="flaticon-select"></i>
                                            <p>В наличии</p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="shop-details-top-order-now"> <i class="flaticon-point"></i>
                                    <p>Закажи сейчас, осталось {{ $product->quantity }} </p>
                                </div>
                                <form action="{{ route('shop.cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn--primary style2">Добавить в корзину</button>
                                </form>
                                <div class="shop-details-top-free-shipping"> <i class="flaticon-shipping"></i>
                                    <p>Потрать <span>10000.00 РУБ</span> и доставка бесплатно!</p>
                                </div>
                                <div class="shop-details-top-social-box">
                                    <p>Share:</p>
                                    <ul class="ps-1 social_link d-flex align-items-center">
                                        <li><a href="https://www.facebook.com/" class="active" target="_blank"><i
                                                    class="flaticon-facebook-app-symbol"></i></a> </li>
                                        <li> <a href="https://www.youtube.com/" target="_blank"><i
                                                    class="flaticon-youtube"></i></a> </li>
                                        <li> <a href="https://twitter.com/" target="_blank"><i
                                                    class="flaticon-twitter"></i></a> </li>
                                        <li> <a href="https://www.instagram.com/" target="_blank"><i
                                                    class="flaticon-instagram"></i></a> </li>
                                    </ul>
                                </div>
                                <div class="shop-details-top-buy-now-btn"> <a href="{{ route('shop.cart.index') }}" class="btn--primary">Купить сейчас</a> </div>
                                <ul class="shop-details-top-category-tags">
                                    <li>Категория: <span>{{ $product->category->title }}</span></li>
                                    <li>Теги: <span>{{ $product->tags }}</span></li>
                                </ul>
                                <ul class="shop-details-top-feature">
                                    <li>
                                        <div class="icon"> <i class="flaticon-truck"></i> </div>
                                        <div class="text">
                                            <p>Бесплатный возврат</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Shop Details Top-->
        <!-- productdrescription-tabStart -->
        <section class="product pt-60 pb-60 wow fadeInUp overflow-hidden ">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-12">
                        <ul class="nav product-details-nav nav-one nav-pills justify-content-center" id="pills-tab-two"
                            role="tablist">
                            <li class="nav-item" role="presentation"> <button class="nav-link active"
                                                                              id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description"
                                                                              type="button" role="tab" aria-controls="pills-description" aria-selected="true">
                                    Описание </button> </li>
                            <li class="nav-item" role="presentation"> <button class="nav-link" id="pills-review-tab"
                                                                              data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab"
                                                                              aria-controls="pills-review" aria-selected="false"> Отзывы </button> </li>
                        </ul>
                    </div>
                </div>
                <div class="row wow fadeInUp animated">
                    <div class="tab-content" id="pills-tabContent-two">
                        <div class="tab-pane fade show active" id="pills-description" role="tabpanel"
                             aria-labelledby="pills-description-tab">
                            <div class="product-drescription">
                                <h4> Описание товара:</h4>
                                <p> {{ $product->description }} </p>
                                <div class="row align-items-center">
                                    <div class="col-lg-4 mt-30 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                            <div class="product-drescription">
                                <div class="review-single pt-0 hed">
                                    <div class="ratting">
                                        <span class="ps-2">N ОТЗЫВОВ</span>
                                    </div>
                                </div>
                                <div class="review-single">
                                    <div class="left">
                                        <h6><span>Raul Bates on January 28, 2022</span> </h6>
                                        <p> Assertively conceptualize parallel process improvements through user
                                            friendly colighue to action items. Interactively antidos cultivate
                                            interdependent customer service without clicks-and-mortar e-services. </p>
                                    </div> <a href="#0" class="right-box"> Report this Comments </a>
                                </div>
                                <div class="review-from-box mt-30">
                                    <h6>Оставьте отзыв</h6>
                                    <form action="#" class="review-from">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group m-0"> <label for="email">Ваш отзыв
                                                    </label> <textarea
                                                        placeholder="Write Your Comments Here"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn--primary style2 ">Отправить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- productdrescription-tab End -->
        <!-- recent-products Start -->
        <section class="recent-products pt-60 pb-120 overflow-hidden wow fadeInUp">
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
