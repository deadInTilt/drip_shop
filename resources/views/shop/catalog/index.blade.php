@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area"
                 style="background-image: url({{ asset('shop/images/inner-pages/breadcum-bg.png') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                            <h2>Catalog</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li><i class="flaticon-next"></i></li>
                                    <li class="active">Catalog</li>
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
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img1.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Accessories</h6>
                                        </a></div>
                                </li>
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img2.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Furnitures</h6>
                                        </a></div>
                                </li>
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img3.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Jewellery</h6>
                                        </a></div>
                                </li>
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img4.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Shoes</h6>
                                        </a></div>
                                </li>
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img5.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Electronics</h6>
                                        </a></div>
                                </li>
                                <li><a href="shop-grid.html" class="img-box">
                                        <div class="inner"><img
                                                    src="{{ asset('shop/images/shop/product-categories-v1-img6.png') }}"
                                                    alt=""/></div>
                                    </a>
                                    <div class="title"><a href="shop-grid.html">
                                            <h6>Fashion</h6>
                                        </a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Product Categories One-->
        <!--Start product-grid-->
        <section class="product-grid pt-60 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-grid-page-top-info justify-content-md-between justify-content-center">
                            <div class="left-box wow fadeInUp animated">
                                <p>Showing 1–12 of 50 Results</p>
                            </div>
                            <div
                                    class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                                <div class="short-by">
                                    <div class="select-box"><select class="wide">
                                            <option data-display="Short by latest">Featured</option>
                                            <option value="1">Best selling</option>
                                            <option value="2">Alphabetically, A-Z</option>
                                            <option value="3">Alphabetically, Z-A</option>
                                            <option value="3">Price, low to high</option>
                                            <option value="3">Price, high to low</option>
                                            <option value="3">Date, old to new</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single w-100 wow fadeInUp animated mt-30">
                            <div class="products-three-single-img"><a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('shop/images/home-three/productss2-1.jpg') }}"
                                            class="first-img" alt=""/> <img
                                            src="{{ asset('shop/images/home-three/productss2-hover-1.png') }}" alt=""
                                            class="hover-img"/>
                                </a>
                                <div class="products-grid-one__badge-box"><span class="bg_base badge new ">New</span>
                                </div>
                                <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup5" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup5" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tabb1">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabb2">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabb3">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tabb1" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb2" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb3" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html"> Trendy stylish shoes </a></h5>
                                <p>
                                    <del>$200.00</del>
                                    $159.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  w-100  wow fadeInUp animated">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/productss2-hover-2.png') }}"
                                         class="first-img" alt=""/>
                                    <img src="{{ asset('shop/images/home-three/productss2-2.jpg') }}" alt=""
                                         class="hover-img"/>
                                </a>
                                <div class="products-grid-one__badge-box"> <span
                                            class="bg_black badge discount">-70%</span></div>
                                <a href="cart.html"
                                   class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup6" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup6" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tabb11">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabb22">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabb33">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tabb11" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb22" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb33" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Exclusive Sneakers </a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  w-100 wow fadeInUp animated">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/productss2-3.jpg') }}" alt=""/>
                                </a>

                                <a href="cart.html" class="addcart btn--primary style2">
                                    Add To Cart
                                </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup7" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                                <div id="popup7" class="product-gird__quick-view-popup mfp-hide">
                                    <div class="container">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-lg-6">
                                                <div class="quick-view__left-content">
                                                    <div class="tabs">
                                                        <div class="popup-product-thumb-box">
                                                            <ul>
                                                                <li class="tab-nav popup-product-thumb"><a
                                                                            href="#tabb111"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                                alt=""/> </a></li>
                                                                <li class="tab-nav popup-product-thumb "><a
                                                                            href="#tabb222"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                                alt=""/> </a></li>
                                                                <li class="tab-nav popup-product-thumb "><a
                                                                            href="#tabb333"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                                alt=""/> </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="popup-product-main-image-box">
                                                            <div id="tabb111" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image"><img
                                                                            src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                            alt=""/></div>
                                                            </div>
                                                            <div id="tabb222" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image"><img
                                                                            src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                            alt=""/></div>
                                                            </div>
                                                            <div id="tabb333" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image"><img
                                                                            src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                            alt=""/></div>
                                                            </div>
                                                            <button class="prev"><i class="flaticon-back"></i>
                                                            </button>
                                                            <button class="next"><i
                                                                        class="flaticon-next"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="popup-right-content">
                                                    <h3>Brown Office Shoe</h3>
                                                    <div class="ratting"><i class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <i
                                                                class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <span>(112)</span></div>
                                                    <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                    </p>
                                                    <div class="price">
                                                        <h2> $42 USD
                                                            <del> $65 USD</del>
                                                        </h2>
                                                        <h6> In stuck</h6>
                                                    </div>
                                                    <div class="color-varient"><a href="#0" class="color-name pink">
                                                            <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                            <span>Red</span>
                                                        </a> <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                        </a>
                                                        <a href="#0" class="color-name blue"> <span>Blue</span>
                                                        </a> <a href="#0" class="color-name black">
                                                            <span>Black</span> </a></div>
                                                    <div class="add-product">
                                                        <h6>Qty:</h6>
                                                        <div class="button-group">
                                                            <div class="qtySelector text-center"> <span
                                                                        class="decreaseQty"><i
                                                                            class="flaticon-minus"></i>
                                                                </span>
                                                                <input type="number" class="qtyValue" value="1"/> <span
                                                                        class="increaseQty"> <i
                                                                            class="flaticon-plus"></i>
                                                                </span>
                                                            </div>
                                                            <button class="btn--primary "> Add to Cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="payment-method"><a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                    alt="">
                                                        </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                    alt="">
                                                        </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                    alt="">
                                                        </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                    alt="">
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Fashionable Sneakers </a></h5>
                                <p>
                                    <del>$200.00</del>
                                    $159.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  w-100 wow fadeInUp animated">
                            <div class="products-three-single-img"><a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('shop/images/home-three/productss2-4.jpg') }}" alt=""/>
                                </a>
                                <div class="products-grid-one__badge-box"> <span
                                            class="bg_black badge discount">-10%</span></div>
                                <a href="cart.html"
                                   class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup8" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup8" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a
                                                                        href="#tabb1111"> <img
                                                                            src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                            alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a
                                                                        href="#tabb2222"> <img
                                                                            src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                            alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a
                                                                        href="#tabb3333"> <img
                                                                            src="{{ asset('shop/images/shop/products-v6-img10.jpg') }}"
                                                                            alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tabb1111" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb2222" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabb3333" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img10.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Summer Shoes</a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  w-100  wow fadeInUp animated">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/productss2-5.jpg') }}" class="first-img"
                                         alt=""/>
                                    <img src="{{ asset('shop/images/home-three/productss2-hover-5.png') }}" alt=""
                                         class="hover-img"/>
                                </a>
                                <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup9" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup9" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tabc1">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabc2">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tabc3">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img10.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tabc1" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img8.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabc2" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img9.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tabc3" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img10.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Outdoor Sports Shoes</a></h5>
                                <p>
                                    <del>$200.00</del>
                                    $159.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single   w-100 wow fadeInUp animated">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/productss3-1.jpg') }}" class="first-img"
                                         alt=""/>
                                    <img src="{{ asset('shop/images/home-three/productss3-hover-1.jpg') }}" alt=""
                                         class="hover-img"/>
                                </a>
                                <div class="products-grid-one__badge-box"><span class="bg_base badge new ">New</span>
                                    <span class="bg_black badge discount">-40%</span></div>
                                <a href="cart.html"
                                   class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tab1">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img1.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab2">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img2.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab3">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tab1" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img1.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab2" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img2.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab3" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Sport Sneakers</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Sport Sneakers</a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single wow w-100 fadeInUp animated">
                            <div class="products-three-single-img"><a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('shop/images/home-three/productss3-2.jpg') }}" alt=""/>
                                </a> <a href="cart.html" class="addcart btn--primary style2">
                                    Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i> <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup1" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup1" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tab11">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img1.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab22">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img2.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab33">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tab11" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img1.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab22" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img2.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab33" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Apex Sneakers </a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  wow w-100 wow fadeInUp animated">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('shop/images/home-three/productss3-3.jpg') }}"
                                            class="first-img" alt=""/>
                                    <img src="{{ asset('shop/images/home-three/productss3-hover-3.png') }}" alt=""
                                         class="hover-img"/>
                                </a>
                                <div class="products-grid-one__badge-box"><span class="bg_base badge new ">New</span>
                                </div>
                                <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="#0"> <i class="flaticon-heart"> </i> <span> wishlist</span>
                                            </a></li>
                                        <li><a href="#0"> <i class="flaticon-left-and-right-arrows"></i> <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup2" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup2" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tab111">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab222">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img4.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a href="#tab333">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                         alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tab111" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img3.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab222" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img4.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab333" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Fashionable Sneakers </a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  wow w-100 wow fadeInUp animated">
                            <div class="products-three-single-img"><a href="shop-details-3.html" class="d-block"> <img
                                            src="{{ asset('shop/images/home-three/productss3-4.jpg') }}" alt=""/>
                                </a> <a href="cart.html" class="addcart btn--primary style2">
                                    Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="#popup3" class="popup_link"> <i class="flaticon-visibility"></i>
                                                <span> quick view</span>
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div id="popup3" class="product-gird__quick-view-popup mfp-hide">
                                <div class="container">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-lg-6">
                                            <div class="quick-view__left-content">
                                                <div class="tabs">
                                                    <div class="popup-product-thumb-box">
                                                        <ul>
                                                            <li class="tab-nav popup-product-thumb"><a href="#tab1111">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img4.jpg') }}"
                                                                         alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a
                                                                        href="#tab2222"> <img
                                                                            src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                            alt=""/> </a></li>
                                                            <li class="tab-nav popup-product-thumb "><a
                                                                        href="#tab3333"> <img
                                                                            src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                            alt=""/> </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="popup-product-main-image-box">
                                                        <div id="tab1111" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img4.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab2222" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <div id="tab3333" class="tab-item popup-product-image">
                                                            <div class="popup-product-single-image"><img
                                                                        src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                        alt=""/></div>
                                                        </div>
                                                        <button class="prev"><i class="flaticon-back"></i>
                                                        </button>
                                                        <button class="next"><i class="flaticon-next"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="popup-right-content">
                                                <h3>Brown Office Shoe</h3>
                                                <div class="ratting"><i class="flaticon-star"></i> <i
                                                            class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                    <span>(112)</span></div>
                                                <p class="text"> Hydrating Plumping Intense Shine Lip Colour
                                                </p>
                                                <div class="price">
                                                    <h2> $42 USD
                                                        <del> $65 USD</del>
                                                    </h2>
                                                    <h6> In stuck</h6>
                                                </div>
                                                <div class="color-varient"><a href="#0" class="color-name pink">
                                                        <span>Pink</span> </a> <a href="#0" class="color-name red">
                                                        <span>Red</span> </a>
                                                    <a href="#0" class="color-name yellow"><span>Yellow</span>
                                                    </a> <a href="#0" class="color-name blue"> <span>Blue</span>
                                                    </a> <a href="#0" class="color-name black">
                                                        <span>Black</span> </a></div>
                                                <div class="add-product">
                                                    <h6>Qty:</h6>
                                                    <div class="button-group">
                                                        <div class="qtySelector text-center"> <span
                                                                    class="decreaseQty"><i class="flaticon-minus"></i>
                                                            </span> <input type="number" class="qtyValue" value="1"/>
                                                            <span class="increaseQty"> <i class="flaticon-plus"></i>
                                                            </span></div>
                                                        <button class="btn--primary "> Add to Cart</button>
                                                    </div>
                                                </div>
                                                <div class="payment-method"><a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                alt=""> </a> <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                alt=""> </a>
                                                    <a href="#0"> <img
                                                                src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                alt=""> </a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Outdoor Sports Shoes </a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single  wow w-100 wow fadeInUp animated">
                            <div class="products-three-single-img img-bg">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/productss2-1.jpg') }}" alt=""/>
                                    <div class="products-grid-one__badge-box"> <span
                                                class="bg_black badge discount">-10%</span></div>
                                </a>
                                <a href="cart.html"
                                   class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                        wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                        compare</span> </a></li>
                                        <li><a href="#popup4" class="popup_link"> <i
                                                        class="flaticon-visibility"></i> <span> quick
                                                        view</span>
                                            </a></li>
                                    </ul>
                                </div>
                                <div id="popup4" class="product-gird__quick-view-popup mfp-hide">
                                    <div class="container">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-lg-6">
                                                <div class="quick-view__left-content">
                                                    <div class="tabs">
                                                        <div class="popup-product-thumb-box">
                                                            <ul>
                                                                <li class="tab-nav popup-product-thumb"><a
                                                                            href="#tab11111"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                                alt=""/> </a></li>
                                                                <li class="tab-nav popup-product-thumb "><a
                                                                            href="#tab22222"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                                alt=""/> </a></li>
                                                                <li class="tab-nav popup-product-thumb "><a
                                                                            href="#tab33333"> <img
                                                                                src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                                alt=""/> </a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="popup-product-main-image-box">
                                                            <div id="tab11111" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img5.jpg') }}"
                                                                         alt=""/></div>
                                                            </div>
                                                            <div id="tab22222" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img6.jpg') }}"
                                                                         alt=""/></div>
                                                            </div>
                                                            <div id="tab33333" class="tab-item popup-product-image">
                                                                <div class="popup-product-single-image">
                                                                    <img src="{{ asset('shop/images/shop/products-v6-img7.jpg') }}"
                                                                         alt=""/></div>
                                                            </div>
                                                            <button class="prev"><i
                                                                        class="flaticon-back"></i></button>
                                                            <button class="next"><i class="flaticon-next"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="popup-right-content">
                                                    <h3>Brown Office Shoe</h3>
                                                    <div class="ratting"><i class="flaticon-star"></i> <i
                                                                class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <i class="flaticon-star"></i> <i class="flaticon-star"></i>
                                                        <span>(112)</span>
                                                    </div>
                                                    <p class="text"> Hydrating Plumping Intense Shine Lip
                                                        Colour
                                                    </p>
                                                    <div class="price">
                                                        <h2> $42 USD
                                                            <del> $65 USD</del>
                                                        </h2>
                                                        <h6> In stuck</h6>
                                                    </div>
                                                    <div class="color-varient"><a href="#0"
                                                                                  class="color-name pink">
                                                            <span>Pink</span> </a>
                                                        <a href="#0" class="color-name red">
                                                            <span>Red</span>
                                                        </a> <a href="#0"
                                                                class="color-name yellow"><span>Yellow</span>
                                                        </a>
                                                        <a href="#0" class="color-name blue">
                                                            <span>Blue</span>
                                                        </a> <a href="#0" class="color-name black">
                                                            <span>Black</span> </a></div>
                                                    <div class="add-product">
                                                        <h6>Qty:</h6>
                                                        <div class="button-group">
                                                            <div class="qtySelector text-center"> <span
                                                                        class="decreaseQty"><i
                                                                            class="flaticon-minus"></i> </span>
                                                                <input type="number" class="qtyValue" value="1"/>
                                                                <span class="increaseQty">
                                                                        <i class="flaticon-plus"></i> </span>
                                                            </div>
                                                            <button class="btn--primary "> Add to
                                                                Cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="payment-method"><a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_1.png') }}"
                                                                    alt=""> </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_2.png') }}"
                                                                    alt=""> </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_3.png') }}"
                                                                    alt=""> </a> <a href="#0"> <img
                                                                    src="{{ asset('shop/images/payment_method/method_4.png') }}"
                                                                    alt=""> </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">High Quality Sneakers</a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single w-100">
                            <div class="products-three-single-img">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/products-6.png') }}" alt=""/>
                                </a>
                                <div class="products-grid-one__badge-box"><span class="bg_base badge new ">New</span>
                                </div>
                                <a href="cart.html" class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="shop-details-3.html"> <i class="flaticon-visibility"></i> <span>
                                                    quick
                                                    view</span> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">Outdoor Sports Shoes</a></h5>
                                <p>
                                    <del>$200.00</del>
                                    $159.00
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                        <div class="products-three-single w-100">
                            <div class="products-three-single-img img-bg">
                                <a href="shop-details-3.html" class="d-block">
                                    <img src="{{ asset('shop/images/home-three/products-5.png') }}" alt=""/>
                                </a>
                                <div class="products-grid-one__badge-box"> <span
                                            class="bg_black badge discount">-10%</span></div>
                                <a href="cart.html"
                                   class="addcart btn--primary style2"> Add To Cart </a>
                                <div class="products-grid__usefull-links">
                                    <ul>
                                        <li><a href="wishlist.html"> <i class="flaticon-heart"> </i> <span>
                                                    wishlist</span> </a></li>
                                        <li><a href="compare.html"> <i class="flaticon-left-and-right-arrows"></i>
                                                <span>
                                                    compare</span> </a></li>
                                        <li><a href="shop-details-3.html"> <i class="flaticon-visibility"></i> <span>
                                                    quick
                                                    view</span> </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="products-three-single-content text-center"><span>Men Shoes</span>
                                <h5><a href="shop-details-3.html">High Quality Sneakers </a></h5>
                                <p>$159.00</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                        <ul class="pagination text-center">
                            <li class="next"><a href="#0"><i class="flaticon-left-arrows" aria-hidden="true"></i> </a>
                            </li>
                            <li><a href="#0">1</a></li>
                            <li><a href="#0" class="active">2</a></li>
                            <li><a href="#0">3</a></li>
                            <li><a href="#0">...</a></li>
                            <li><a href="#0">10</a></li>
                            <li class="next"><a href="#0"><i class="flaticon-next-1" aria-hidden="true"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--End product-grid-->
    </main>
@endsection
