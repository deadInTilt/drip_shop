@extends('shop.layouts.main')
@section('content')
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('storage/images/shoes/catalog_main.jpeg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Оформление заказа</h2>
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

        <!--Start order area-->
        <section class="cart-area mt-120 mb-120">
            <div class="container">
                <div class="row mt-120">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box">
                            <div class="inner-title">
                                <h3>Оформление заказа</h3>
                            </div>
                        </div>
                    </div>
                </div>
                    <form action="{{ route('shop.order.store') }}" method="post">
                        @csrf
                        <div class="row mt--30">
                            <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                                <div class="cart-total-box mt-30">
                                    <form action="#" method="POST" class="space-y-6">
                                        <div class="table-outer">
                                            <table class="cart-table2">
                                                <thead class="cart-header clearfix">
                                                <tr>
                                                    <th colspan="1" class="shipping-title"><b>Контактные данные</b></th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1" class="shipping-title">Почта</th>
                                                    <th colspan="1" class="shipping-title">{{ $user->email }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1" class="shipping-title">Адрес</th>
                                                    <th colspan="1" class="shipping-title">
                                                        <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
                                                    @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="1" class="shipping-title">Телефон</th>
                                                    <th colspan="1" class="shipping-title">
                                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+7" required>
                                                    @error('phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="shipping"> Доставка </td>
                                                        <td class="selact-box1">
                                                            <ul class="shop-select-option-box-1">
                                                                <li>
                                                                    <input type="checkbox" name="delivery_method" id="1" checked="" value="free_shipping">
                                                                    <label for="delivery_method"><span></span>Бесплатная доставка</label>
                                                                </li>
                                                            </ul>
                                                            <div class="inner-text">
                                                                <p>Для изменения контактных данных перейдите в личный кабинет</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="shipping"> Способ оплаты </td>
                                                        <td class="selact-box1">
                                                            <ul class="shop-select-option-box-1">
                                                                <li>
                                                                    <input type="checkbox" name="payment_method" id="1" checked="" value="YCassa">
                                                                    <label for="payment_method"><span></span>ЮКасса</label>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                                <div class="cart-check-out mt-30">
                                    <h3>Подтверждение</h3>
                                    <ul class="cart-check-out-list">
                                        <li>
                                            <div class="left">
                                                <p>Итого</p>
                                            </div>
                                            <div class="right">
                                                <p>{{ $totalPrice }}</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="left">
                                                <p>Доставка</p>
                                            </div>
                                            <div class="right">
                                                <p><span>Фиксированная ставка:</span> 0.00</p>
                                            </div>
                                        </li>
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
                                                <input type ="submit" class="btn--primary mt-30" value="Создать заказ">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </section>
@endsection
