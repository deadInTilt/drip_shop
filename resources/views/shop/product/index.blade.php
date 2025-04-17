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
                                <div class="shop-details-top-cart-box-btn"> <button class="btn--primary style2 "
                                                                                    type="submit">Добавить в корзину</button> </div>
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
                        <div class="products-grid-one">
                            <div class="products-grid-one__product-image">
                                <div class="products-grid-one__badge-box"> <span class="bg_base badge new ">New</span>
                                </div> <a href="shop-details-1.html" class="d-block products-grid__image_holder"> <img
                                        src="{{ asset('shop/images/shop/products-img1.jpg') }}" alt="Alt"> </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    Избранное</span> </a> </li>
                                        <li><a href="#view-popup1" class="popup_link"> <i
                                                    class="flaticon-visibility"></i> <span> Быстрый просмотр</span> </a> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="view-popup1" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"> <a href="#tab7">
                                                                    <img src="{{ asset('shop/images/shop/products-img1.jpg') }}"
                                                                         alt="img"> </a> </li>
                                                            <li class="tab-nav popup-product-thumb "> <a href="#tab8">
                                                                    <img src="{{ asset('shop/images/shop/products-img2.jpg') }}"
                                                                         alt="img"> </a> </li>
                                                            <li class="tab-nav popup-product-thumb "> <a href="#tab9">
                                                                    <img src="{{ asset('shop/images/shop/products-img3.jpg') }}"
                                                                         alt="img"> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tab7" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"> <img
                                                                    src="{{ asset('shop/images/shop/products-img1.jpg') }}"
                                                                    alt="img"> </div>
                                                        </div>
                                                        <div id="tab8" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"> <img
                                                                    src="{{ asset('shop/images/shop/products-img2.jpg') }}"
                                                                    alt="img"> </div>
                                                        </div>
                                                        <div id="tab9" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"> <img
                                                                    src="{{ asset('shop/images/shop/products-img3.jpg') }}"
                                                                    alt="img"> </div>
                                                        </div> <button class="prev"> <i class="flaticon-back"></i>
                                                        </button> <button class="next"> <i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Blacked Neckles Set</h3>
                                                <div class="ratting"> <i class="flaticon-star"></i> <i
                                                        class="flaticon-star"></i> <i class="flaticon-star"></i> <i
                                                        class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(100)</span> </div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour </p>
                                                <div class="price">
                                                    <h2> $45 USD <del> $50 USD</del></h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"> <a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a> <a href="#0"
                                                                                 class="color-name yellow"><span>Yellow</span> </a> <a href="#0"
                                                                                                                                       class="color-name blue"> <span>Blue</span> </a> <a href="#0"
                                                                                                                                                                                          class="color-name black"> <span>Black</span> </a> </div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1" />
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span> </div> <button class="btn--primary "> Add to Cart
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"> <a href="#0"> <img
                                                            src="{{ asset('shop/images/payment_method/method_1.png') }}" alt=""> </a>
                                                    <a href="#0"> <img src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                       alt=""> </a> <a href="#0"> <img
                                                            src="{{ asset('shop/images/payment_method/method_3.png') }}" alt=""> </a>
                                                    <a href="#0"> <img src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                       alt=""> </a> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-grid__content"> <a href="cart.html"
                                                                    class="products-grid__cart-btn btn--primary"> <span class="one"> Добавить </span>
                                    <span class="two"> <i class="flaticon-shopping-cart"> </i> </span> </a>
                                <div class="ratting"></div>
                                <h5 class="product_name"><a href="shop-details-1.html">Diamond Bracelet </a></h5>
                                <div class="price d-flex align-content-center justify-content-center">
                                    <p>$2909</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- recent-products End -->
    </main>
@endsection
