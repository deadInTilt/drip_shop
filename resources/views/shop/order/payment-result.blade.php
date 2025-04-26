@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('storage/images/shoes/catalog_main.jpeg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Оплата заказа</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="{{ route('shop.home.index') }}"><i class="flaticon-home pe-2"></i>Главная</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Заказ</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Start payment status area-->
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="cart-table-box">
                            <div class="text-center py-12">
                                @if($order->status === 'paid')
                                    <h2 class="text-xl font-semibold">Ваш заказ {{ $order->id }} оплачен успешно =)</h2>
                                    <p class="text-gray-600">Ожидайте доставку.</p>
                                    <a href="{{ route('shop.account.index') }}" class="text-blue-500 mt-4 inline-block">
                                        Перейти в личный кабинет
                                    </a>
                                    <div class="text-center py-12">
                                    <a href="{{ route('shop.catalog.index') }}" class="text-blue-500 mt-4 inline-block">
                                        Перейти в каталог
                                    </a>
                                    </div>
                                @else
                                    <h2 class="text-xl font-semibold">Ваш заказ {{ $order->id }} не был оплачен =(</h2>
                                    <p class="text-gray-600">Причина: </p>
                                    <a href="{{ route('shop.account.index') }}" class="text-blue-500 mt-4 inline-block">
                                        Перейти в личный кабинет
                                    </a>
                                    <div class="text-center py-12">
                                        <a href="{{ route('shop.catalog.index') }}" class="text-blue-500 mt-4 inline-block">
                                            Перейти в каталог
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
