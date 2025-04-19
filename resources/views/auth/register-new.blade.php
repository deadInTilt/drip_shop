<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title For This Document -->
    <title> Drip Shop</title>
    <!-- Favicon For This Document -->
    <link rel="shortcut icon" href="{{ asset('shop/images/logo/drip_shop_logo.webp') }}" type="image/x-icon">
    <!-- Bootstrap 5 Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.5.1.1.min.css') }}">
    <!-- Google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <!-- FlatIcon Css -->
    <link rel="stylesheet" href="{{ asset('shop/fonts/flaticon.css') }}">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/plugin/slick.css') }}">
    <!--  Ui Tabs Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/plugin/jquery-ui.min.css') }}">
    <!-- Magnific-popup Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/plugin/magnific-popup.css') }}">
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/plugin/nice-select.v1.0.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/plugin/animate.css') }}">
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">
</head>

<body>
<!-- ==========Preloader========== -->
<div class="loader"><span>Drip Shop...</span></div> <!-- ==========Preloader========== -->
<!--===scroll bottom to top===--> <a href="{{ route('shop.home.index') }}" class="scrollToTop"><i class="flaticon-up-arrow"></i></a>
<!--===scroll bottom to top===-->
<!-- header-default -->
<header class="header-default">
    <!-- Start Desktop Menu -->
    <div class="menubox">
        <!-- Head menu -->
        <div class="main-menu">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-4 text-start">
                        <div class="left d-lg-block d-none ">
                            <div class="search-box-holder">
                                <form action="#0">
                                    <div class="form-group search-box menu">
                                        <input type="text" class="form-control"  placeholder="Поиск">
                                        <span class="search-icon"> <i class="flaticon-magnifying-glass"></i> </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="right d-lg-none d-block">
                            <ul class="main-menu__widge-box d-flex align-items-center ">
                                <li class="menubar"> <span></span> <span></span> <span></span> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-4 text-center">
                        <div class="middle"> <a href="{{ route('shop.home.index') }}" class="logo"> <img
                                    src="{{ asset('storage/images/drip_logo_header.png') }}" alt=""> </a> </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="right d-flex align-items-center justify-content-end">
                            <ul class="main-menu__widge-box d-flex align-items-center ">
                                <li class="d-lg-block d-none"><a href="{{ route('admin.index') }}"><i
                                            class="flaticon-user"></i> </a></li>
                                <li class="d-lg-block d-none"><a href="wishlist.html" class="number"> <i
                                            class="flaticon-heart"></i> </a> </li>
                                <li class="menubar d-lg-block d-none"> <span></span> <span></span> <span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End head menu -->

        <!-- Navbar menu -->
        <div class="mega-menu-default mega-menu d-lg-block d-none">
            <div class="container position-relative">
                <div class="row">
                    <nav>
                        <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">
                            <li class="dropdown-list"> <a href="{{ route('shop.home.index') }}"> <span>Главная</span> </a></li>
                            <li class="dropdown-list"> <a href="{{ route('shop.catalog.index') }}"> <span>Каталог</span> </a></li>
                            <li class="dropdown-list"> <a href="#"> <span>Блог</span></a></li>
                            <li class="dropdown-list"> <a href="#">Контакты</a> </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End navbar menu -->
    </div>
    <div class="sticy-header">
        <div class="mobile-menu d-lg-none d-block ">
            <div class="mobile-menu__menu-top border-bottom-0">
                <div class="container ">
                    <div class="row">
                        <div class="menu-info d-flex justify-content-between align-items-center">
                            <div class="menubar"> <span></span> <span></span> <span></span> </div> <a
                                href="index.html" class="logo"> <img src="{{ asset('shop/images/logo/logo.png') }}" alt=""> </a>
                            <div class="cart-holder">
                                <a href="#0" class="cart cart-icon position-relative">
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional menu -->
        {{--        <div class="container position-relative  d-lg-block d-none ">--}}
        {{--            <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo me-2">--}}
        {{--                    <img src="{{ asset('shop/images/logo/logo.png') }}" alt=""> </a>--}}
        {{--                <div class="mega-menu-default mega-menu d-lg-block d-none">--}}
        {{--                    <div class="container ">--}}
        {{--                        <div class="row">--}}
        {{--                            <nav>--}}
        {{--                                <ul class="page-dropdown-menu d-flex align-items-center justify-content-center">--}}
        {{--                                    <li class="dropdown-list"> <a href="#0"> <span>Home</span> <span--}}
        {{--                                                class="menuarrow"> <i class="flaticon-down-arrow"></i> </span> </a>--}}
        {{--                                        <ul class="dropdown">--}}
        {{--                                            <li><a href="index.html">Home Page 01 <sup--}}
        {{--                                                        class="info three">Popular</sup></a> </li>--}}
        {{--                                            <li><a href="index-2.html">Home Page 02 <sup--}}
        {{--                                                        class="info one">Hot</sup></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="index-3.html">Home Page 03 </a> </li>--}}
        {{--                                            <li><a href="index-4.html">Home Page 04 </a> </li>--}}
        {{--                                            <li><a href="index-5.html">Home Page 05 <sup--}}
        {{--                                                        class="info two">New</sup></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="index-6.html">Home Page 06 <sup--}}
        {{--                                                        class="info one">New</sup></a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="index-7.html">Home Page 07 <sup--}}
        {{--                                                        class="info three">New</sup></a> </li>--}}
        {{--                                        </ul>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="dropdown-list"> <a href="#0"> <span>Shop </span> <span--}}
        {{--                                                class="menuarrow"> <i class="flaticon-down-arrow"></i> </span> </a>--}}
        {{--                                        <ul class="dropdown">--}}
        {{--                                            <li><a href="shop-grid.html">Shop Grid</a></li>--}}
        {{--                                            <li><a href="shop-grid-left-sidebar.html">Shop Grid Left Sidebar </a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="shop-grid-right-sidebar.html">Shop List Left Sidebar</a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="shop-grid-right-sidebar.html">Shop Grid Right Sidebar </a>--}}
        {{--                                            </li>--}}
        {{--                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>--}}
        {{--                                            </li>--}}
        {{--                                            <li class="submenu-parent"> <a href="#0"> <span>Shop Details Style--}}
        {{--                                                        </span> <span class="menuarrow"> <i class="flaticon-next-1"></i>--}}
        {{--                                                        </span> </a>--}}
        {{--                                                <ul class="submenu">--}}
        {{--                                                    <li><a href="shop-details-1.html">Shop Details Style 01</a></li>--}}
        {{--                                                    <li><a href="shop-details-2.html">Shop Details Style 02</a></li>--}}
        {{--                                                    <li><a href="shop-details-3.html">Shop Details Style 03</a></li>--}}
        {{--                                                </ul>--}}
        {{--                                            </li>--}}
        {{--                                        </ul>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="dropdown-list megamenu "> <a href="#0"> <span>Features </span> <span--}}
        {{--                                                class="menuarrow"> <i class="flaticon-down-arrow"></i> </span> </a>--}}
        {{--                                        <div class="dropdown megamenu-dropdown">--}}
        {{--                                            <div class="row g-0">--}}
        {{--                                                <div class="col-xl-6 col-lg-7 megamenu-padding-one">--}}
        {{--                                                    <div class="row g-0">--}}
        {{--                                                        <div class="col-lg-4">--}}
        {{--                                                            <div class="megamenu-box one">--}}
        {{--                                                                <h6>Home Pages</h6>--}}
        {{--                                                                <ul class="megamenu-list">--}}
        {{--                                                                    <li><a href="index.html">Home Page 01</a></li>--}}
        {{--                                                                    <li><a href="index-2.html">Home Page 02</a></li>--}}
        {{--                                                                    <li><a href="index-3.html">Home Page 03</a></li>--}}
        {{--                                                                    <li><a href="index-4.html">Home Page 04</a></li>--}}
        {{--                                                                    <li><a href="shop-details-1.html">Product Style--}}
        {{--                                                                            1 </a> </li>--}}
        {{--                                                                    <li><a href="shop-details-2.html">Product Style--}}
        {{--                                                                            2 </a> </li>--}}
        {{--                                                                    <li><a href="shop-details-3.html">Product Style--}}
        {{--                                                                            3 </a> </li>--}}
        {{--                                                                    <li><a href="contact.html">Contact </a></li>--}}
        {{--                                                                    <li><a href="faq.html">FAQ</a></li>--}}
        {{--                                                                </ul>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="col-lg-4">--}}
        {{--                                                            <div class="megamenu-box one">--}}
        {{--                                                                <h6>Shop Pages</h6>--}}
        {{--                                                                <ul class="megamenu-list">--}}
        {{--                                                                    <li><a href="shop-grid.html">Shop Grid </a></li>--}}
        {{--                                                                    <li><a href="shop-list-left-sidebar.html">Shop--}}
        {{--                                                                            list</a> </li>--}}
        {{--                                                                    <li><a href="shop-grid-right-sidebar.html">Shop--}}
        {{--                                                                            2 colums </a></li>--}}
        {{--                                                                    <li><a href="shop-grid-left-sidebar.html">Shop 3--}}
        {{--                                                                            colums </a></li>--}}
        {{--                                                                    <li><a href="shop-grid.html">Shop 4 colums</a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="shop-grid-left-sidebar.html">Shop--}}
        {{--                                                                            Grid Left Sidebar </a></li>--}}
        {{--                                                                    <li><a href="shop-grid-right-sidebar.html">Shop--}}
        {{--                                                                            Grid Right Sidebar</a></li>--}}
        {{--                                                                    <li><a href="shop-list-left-sidebar.html">Shop--}}
        {{--                                                                            List Left Sidebar</a></li>--}}
        {{--                                                                    <li><a href="shop-list-right-sidebar.html">Shop--}}
        {{--                                                                            List Right Sidebar</a></li>--}}
        {{--                                                                </ul>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="col-lg-4">--}}
        {{--                                                            <div class="megamenu-box four">--}}
        {{--                                                                <h6>Others Pages</h6>--}}
        {{--                                                                <ul class="megamenu-list">--}}
        {{--                                                                    <li><a href="cart.html">Cart </a></li>--}}
        {{--                                                                    <li><a href="compare.html">Compare </a></li>--}}
        {{--                                                                    <li><a href="wishlist.html">Wishlist </a></li>--}}
        {{--                                                                    <li><a href="order-track.html">Order Track </a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="my-account.html">My Account </a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="blog.html">Blog</a></li>--}}
        {{--                                                                    <li><a href="blog-single.html">Blog Single</a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="login.html">Login</a></li>--}}
        {{--                                                                    <li><a href="register.html">Register</a></li>--}}
        {{--                                                                </ul>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                                <div class="col-xl-6 col-lg-5 megamenu-padding background">--}}
        {{--                                                    <div class="row g-0">--}}
        {{--                                                        <div class="col-xl-6 col-lg-5">--}}
        {{--                                                            <div class="content"> <a href="shop-details-1.html"--}}
        {{--                                                                                     class="thumb d-block"> <img--}}
        {{--                                                                        src="{{ asset('shop/images/menu/mega-menu.jpg') }}"--}}
        {{--                                                                        alt=""> </a> <a href="shop-details-1.html"--}}
        {{--                                                                                        class="title d-block">--}}
        {{--                                                                    <h6> Super Comfort Sofa </h6>--}}
        {{--                                                                </a> <a href="shop-details-1.html"--}}
        {{--                                                                        class="price">$250.00</a> </div>--}}
        {{--                                                        </div>--}}
        {{--                                                        <div class="col-xl-6 col-lg-7">--}}
        {{--                                                            <div class="offer">--}}
        {{--                                                                <h6>Discount</h6>--}}
        {{--                                                                <ul>--}}
        {{--                                                                    <li><a href="shop-grid.html"> <span>%</span> 30%--}}
        {{--                                                                            Off Everything! </a></li>--}}
        {{--                                                                    <li><a href="shop-grid-left-sidebar.html">--}}
        {{--                                                                            <span>%</span> Get an Extra 20% Off--}}
        {{--                                                                            Sale! Use Code: Sale </a></li>--}}
        {{--                                                                    <li><a href="shop-grid-right-sidebar.html">--}}
        {{--                                                                            <span>%</span> Flash Sale Offers </a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="shop-grid.html"> <span>%</span>--}}
        {{--                                                                            Flash Sale Offers </a> </li>--}}
        {{--                                                                    <li><a href="shop-grid-left-sidebar.html">--}}
        {{--                                                                            <span>%</span> 30% Off Everything! </a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                    <li><a href="shop-grid-right-sidebar.html">--}}
        {{--                                                                            <span>%</span> Flash Sale Offers </a>--}}
        {{--                                                                    </li>--}}
        {{--                                                                </ul>--}}
        {{--                                                            </div>--}}
        {{--                                                        </div>--}}
        {{--                                                    </div>--}}
        {{--                                                </div>--}}
        {{--                                            </div>--}}
        {{--                                        </div>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="dropdown-list"> <a href="#0"> <span>Blogs </span> <span--}}
        {{--                                                class="menuarrow"> <i class="flaticon-down-arrow"></i> </span> </a>--}}
        {{--                                        <ul class="dropdown">--}}
        {{--                                            <li><a href="blog.html">All Blog Posts</a></li>--}}
        {{--                                            <li><a href="blog-single.html">Blog Details</a></li>--}}
        {{--                                        </ul>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="dropdown-list"> <a href="#0"> <span>Pages </span> <span--}}
        {{--                                                class="menuarrow"> <i class="flaticon-down-arrow"></i> </span> </a>--}}
        {{--                                        <ul class="dropdown">--}}
        {{--                                            <li><a href="about-us.html">About Us </a></li>--}}
        {{--                                            <li><a href="contact.html">Contact</a></li>--}}
        {{--                                            <li><a href="faq.html">FAQ</a></li>--}}
        {{--                                            <li><a href="order-track.html">Order_Track</a></li>--}}
        {{--                                            <li><a href="my-account.html">My_Account</a></li>--}}
        {{--                                        </ul>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="dropdown-list"> <a href="contact.html">Contact</a> </li>--}}
        {{--                                </ul>--}}
        {{--                            </nav>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- End optional menu -->
        <!-- End optional menu -->

    </div>

    <!-- Left Sidebar -->
    {{--    <div class="sidebar-content-closer"></div>--}}
    {{--    <div class="sidebar-content">--}}
    {{--        <div class="sidebar-widget-container">--}}
    {{--            <div class="widget-heading d-flex justify-content-end align-content-center"> <span--}}
    {{--                    class="close-side-widget">X</span> </div>--}}
    {{--            <div class="sidebar-textwidget">--}}
    {{--                <div class="sidebar-info-contents">--}}
    {{--                    <div class="content-inner">--}}
    {{--                        <div class="logo"> <a href="index.html"><img src="{{ asset('shop/images/logo/logo-2.png') }}" alt=""></a>--}}
    {{--                        </div>--}}
    {{--                        <div class="content-box">--}}
    {{--                            <h4>About Us</h4>--}}
    {{--                            <div class="inner-text">--}}
    {{--                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem--}}
    {{--                                    Ipsum has been the industry's standard dummy text ever since the 1500s, </p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="form_inner">--}}
    {{--                            <h4>Support</h4>--}}
    {{--                            <form action="index.html" method="post">--}}
    {{--                                <div class="form-group mt-4"> <input type="text" name="name" placeholder="Name"--}}
    {{--                                                                     required=""> </div>--}}
    {{--                                <div class="form-group mt-4"> <input type="email" name="email" placeholder="Email"--}}
    {{--                                                                     required=""> </div>--}}
    {{--                                <div class="form-group mt-4"> <textarea name="message"--}}
    {{--                                                                        placeholder="Message..."></textarea> </div>--}}
    {{--                                <div class="form-group message-btn mt-4"> <button type="submit"--}}
    {{--                                                                                  class="btn--secondary"> <span class="txt">Submit Now</span> </button> </div>--}}
    {{--                            </form>--}}
    {{--                        </div>--}}
    {{--                        <div class="sidebar-contact-info">--}}
    {{--                            <h4>Contact Info</h4>--}}
    {{--                            <ul>--}}
    {{--                                <li> <span class="flaticon-pin-1"></span> New York, United States </li>--}}
    {{--                                <li> <span class="flaticon-telephone"></span> <a href="tel:+44203700001">+44 123 456--}}
    {{--                                        789</a> </li>--}}
    {{--                                <li> <span class="flaticon-mail"></span> <a--}}
    {{--                                        href="mailto:info@example.com">info@example.com</a> </li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                        <div class="thm-medio-boxx1">--}}
    {{--                            <ul class="social-box">--}}
    {{--                                <li class="facebook"> <a href="https://www.facebook.com/" target="_blank"><i--}}
    {{--                                            class="flaticon-facebook-app-symbol"></i></a> </li>--}}
    {{--                                <li class="twitter"> <a href="https://twitter.com/" target="_blank"><i--}}
    {{--                                            class="flaticon-twitter"></i></a> </li>--}}
    {{--                                <li class="instagram"> <a href="https://www.instagram.com/" target="_blank"><i--}}
    {{--                                            class="flaticon-instagram"></i></a> </li>--}}
    {{--                                <li class="youtube"> <a href="https://www.youtube.com/" target="_blank"><i--}}
    {{--                                            class="flaticon-youtube"></i></a> </li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- End sidebar menu -->
    <!-- End Left Sidebar -->
</header>

<main class="overflow-hidden ">
    <!--Start Breadcrumb Style2-->
    <section class="breadcrumb-area" style="background-image: url({{ asset('shop/images/inner-pages/breadcum-bg.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-content text-center wow fadeInUp animated">
                        <h2>Register</h2>
                        <div class="breadcrumb-menu">
                            <ul>
                                <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                <li> <i class="flaticon-next"></i> </li>
                                <li class="active">Register</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Breadcrumb Style2-->
    <!--Start Login Page-->
    <section class="login-page pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-9 wow fadeInUp animated">
                    <div class="login-register-form"
                         style="background-image: url('{{ asset('shop/images/inner-pages/login-bg.png') }}');">
                        <div class="top-title text-center ">
                            <h2>Register</h2>
                            <p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
                        </div>
                        <form action="{{ route('register') }}" method="POST" class="common-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ old('name') }}" required autofocus autocomplete="name">
                            </div>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Your Email" value="{{ old('email')}}" required autocomplete="email" >
                            </div>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group eye">
                                <div class="icon icon-1">
                                    <i class="flaticon-hidden"></i>
                                </div>
                                <input type="password" id="password-field" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">
                                <div class="icon icon-2 ">
                                    <i class="flaticon-visibility"></i>
                                </div>
                            </div>
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group eye">
                                <div class="icon icon-1">
                                    <i class="flaticon-hidden"></i>
                                </div>
                                <input type="password" id="password-field" class="form-control" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                                <div class="icon icon-2 ">
                                    <i class="flaticon-visibility"></i>
                                </div>
                            </div>
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <button type="submit" class="btn--primary style2">Register </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Login Page-->
</main>

<footer class="footer-default footer-style-1">
    <!--Start Footer-->
    <div class="footer-default__main-footer position-relative">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                    <div class="footer-default__single-box">
                        <div class="company-info">
                            <div class="footer-logo"> <a href="index.html"> <img src="{{ asset('storage/images/drip_logo_footer.png') }}"
                                                                                 alt=""> </a> </div>
                            <div class="text1">
                                <p>Интернет-магазин</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                    <div class="footer-default__single-box">
                        <div class="footer-title">
                            <h4> Полезные ссылки </h4>
                        </div>
                        <ul class="footer-links">
                            <li><a href="my-account.html">Аккаунт</a></li>
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('shop.cart.index') }}">Корзина</a></li>
                            <li><a href="wishlist.html">Избранное</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                    <div class="footer-default__single-box">
                        <div class="footer-title">
                            <h4>Информация</h4>
                        </div>
                        <ul class="footer-links">
                            <li><a href="about-us.html">О нас</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 mt-30 wow fadeInUp animated">
                    <div class="footer-default__single-box">
                        <div class="footer-title">
                            <h4> Офис </h4>
                        </div>
                        <div class="footer-address-box ">
                            <div class="text1 pt-3">
                                <p>ул. Багратиона д. 53, офисное помещение №3</p>
                            </div>
                            <div class="text3">
                                <p>214000, г. Смоленск, Россия</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- footer-bottom Footer-->
    <div class="footer_bottom position-relative">
        <div class="container">
            <div class="footer_bottom_content">
                <div class="copyright wow fadeInUp animated">
                    <p>© 2025 <a href="{{ route('shop.home.index') }}">Drip Shop.</a></p>
                </div>
                <ul class="d-flex align-items-center">
                    <li> Все права защищены.</a> </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
</footer>
<!--==== Js Scripts Start ====-->
<!-- Jquery v3.6.0 Js -->
<script src="{{ asset('shop/js/jqurey.v3.6.0.min.js') }}"></script> <!-- Popper v2.9.3 Js -->
<script src="{{ asset('shop/js/popper.v2.9.3.min.js') }}"></script> <!-- Bootstrap v5.1.1 js -->
<script src="{{ asset('shop/js/bootstrap.v5.1.1.min.js') }}"></script> <!-- jquery ui js -->
<script src="{{ asset('shop/js/plugin/jquery-ui.min.js') }}"></script> <!-- Parallax js -->
<script src="{{ asset('shop/js/plugin/jarallax.min.js') }}"></script> <!-- Slick Slider Js -->
<script src="{{ asset('shop/js/plugin/slick.min.js') }}"></script> <!-- isotope Js -->
<script src="{{ asset('shop/js/plugin/isotope.js') }}"></script> <!-- magnific-popup v2.3.4 Js -->
<script src="{{ asset('shop/js/plugin/jquery.magnific-popup.min.js') }}"></script> <!-- Tweenmax v2.3.4 Js -->
<script src="{{ asset('shop/js/plugin/tweenMax.min.js') }}"></script> <!-- Nice Select Js -->
<script src="{{ asset('shop/js/plugin/nice-select.v1.0.min.js') }}"></script> <!-- Wow js -->
<script src="{{ asset('shop/js/plugin/wow.v1.3.0.min.js') }}"></script> <!-- Wow js -->
<script src="{{ asset('shop/js/plugin/jquery.countdown.min.js') }}"></script> <!-- Main js -->
<script src="{{ asset('shop/js/main.js') }}"></script>
<!--==== Js Scripts End ====-->
</body>

</html>
