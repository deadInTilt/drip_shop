@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('storage/images/shoes/catalog_main.jpeg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Корзина</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="{{ route('shop.home.index') }}"><i class="flaticon-home pe-2"></i>Главная</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Корзина</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start cart area-->
        @if($cartItems->count())
            <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="cart-table-box">
                            <div class="table-outer">
                                <table class="cart-table">
                                    <thead class="cart-header">
                                    <tr>
                                        <th class="">Наименование товара</th>
                                        <th class="price">Цена</th>
                                        <th>Количество</th>
                                        <th>Сумма</th>
                                        <th class="hide-me"></th>
                                    </tr>
                                    </thead>
                                    @foreach($cartItems as $item)
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="thumb-box">
                                                        <a href="{{ route('shop.product.index', $item->id) }}" class="thumb">
                                                            <img src="{{ asset('storage') . '/' . $item->product->preview_image }}" alt="">
                                                        </a>
                                                        <a href="{{ route('shop.product.index', $item->product->id) }}" class="title">
                                                            <h5> {{ $item->product->title }}</h5>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $item->product->price }}</td>
                                                <td class="qty">
                                                    <div class="qtySelector text-center">
                                                        <span class="decreaseQty">
                                                            <i class="flaticon-minus"></i>
                                                        </span>
                                                        <input type="number" class="qtyValue" value="{{ $item->quantity }}" />
                                                        <span class="increaseQty">
                                                            <i class="flaticon-plus"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="sub-total">{{ ($item->product->price) * ($item->quantity) }}</td>
                                                <td>
                                                    <div class="remove">
                                                        <form action="{{ route('shop.cart.remove', $item->product->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="item-remove" style="background: none; border: none;">
                                                                <i class="flaticon-cross"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-button-box">
                            <div class="apply-coupon wow fadeInUp animated">
                                <form action="{{ route('shop.cart.applyCoupon') }}" method="POST">
                                    @csrf
                                        <div class="apply-coupon-input-box mt-30 ">
                                            <input type="text" name="coupon_name" value="" placeholder="Введите купон"></div>
                                        <div class="apply-coupon-button mt-30">
                                            <button class="btn--primary style2" type="submit">Применить купон</button>
                                        </div>
                                </form>
                            </div>
                            <div class="cart-button-box-right wow fadeInUp animated">
                                <button class="btn--primary mt-30" type="submit"><a href="{{ route('shop.catalog.index') }}">Вернуться к покупкам</a></button>
                                <button class="btn--primary mt-30" type="submit">Обновить корзину</button> </div>
                        </div>
                        <div class="cart-button-box mt-2">
                            <div class="apply-coupon wow fadeInUp animated">
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if(session('coupon_error'))
                                    <div class="alert alert-danger">
                                        {{ session('coupon_error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-120">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box">
                            <div class="inner-title">
                                <h3>Итого</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                        <div class="cart-check-out mt-30">
                            <h3>Подтверждение</h3>
                            <ul class="cart-check-out-list">
                                <li>
                                    <div class="left">
                                        <p>Итого:</p>
                                    </div>
                                    <div class="right">
                                        <p>{{ $totalPrice + $discount }}</p>
                                    </div>
                                </li>
                                @if(session()->has('coupon_name'))
                                <li>
                                    <div class="left">
                                        <p style="color:green">Применен купон:</p>
                                    </div>
                                    <div class="right">
                                        <p style="color:green">{{ session('coupon_name') }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="left">
                                        <p style="color:red">Скидка:</p>
                                    </div>
                                    <div class="right">
                                        <p style="color:red">{{ $discount }}</p>
                                    </div>
                                </li>
                                @endif
                                <li>
                                    <div class="left">
                                        <p>Итого:</p>
                                    </div>
                                    <div class="right">
                                        <p>{{ $totalPrice }}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="cart-button-box-right wow fadeInUp animated">
                                        <button class="btn--primary mt-30" type="submit">
                                            <a href="{{ route('shop.order.index') }}">Оформить заказ</a>
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @else
            {{-- ❗ Заглушка — корзина пуста --}}
            <section class="cart-area pt-120 pb-120">
                <div class="container">
                    <div class="row wow fadeInUp animated">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="cart-table-box">
                                <div class="table-outer">
                                    <table class="cart-table">
                                        <thead class="cart-header">
                                        <tr>
                                            <th class="">Наименование товара</th>
                                            <th class="price">Цена</th>
                                            <th>Количество</th>
                                            <th>Сумма</th>
                                            <th class="hide-me"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <div class="text-center py-12">
                                            <img src="{{ asset('images/empty-cart.png') }}" class="mx-auto w-48 mb-6" alt="Пусто">
                                            <h2 class="text-xl font-semibold">Ваша корзина пуста</h2>
                                            <p class="text-gray-600">Добавьте товары, чтобы увидеть их здесь</p>
                                            <a href="{{ route('shop.catalog.index') }}" class="text-blue-500 mt-4 inline-block">
                                                Перейти в каталог
                                            </a>
                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>
    @endif
@endsection
