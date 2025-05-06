@extends('shop.layouts.main')

@section('content')

    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url({{ asset('storage/images/shoes/catalog_main.jpeg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Мой аккаунт </h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="{{ route('shop.home.index') }}"><i class="flaticon-home pe-2"></i>Главная</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Мой аккаунт</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start My Account Page-->
        <section class="my-account-page pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <!--Start My Account Page Menu-->
                    <div class="col-xl-3 col-lg-4">
                        <div class="d-flex align-items-start">
                            <div class="nav my-account-page__menu flex-column nav-pills me-3" id="v-pills-tab"
                                 role="tablist" aria-orientation="vertical">

                                <button class="nav-link" id="v-pills-orders-tab"
                                        data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab"
                                        aria-controls="v-pills-orders" aria-selected="false">
                                    <span> Заказы</span>
                                </button>

                                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-address" type="button" role="tab"
                                        aria-controls="v-pills-address" aria-selected="false">
                                    <span> Адреса</span>
                                </button>

                                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-address" type="button" role="tab"
                                        aria-controls="v-pills-address" aria-selected="false">
                                    <span> Личная информация</span>
                                </button>

                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    @method('POST')
                                    <input class="btn btn-outline-primary" type="submit" value="Выйти">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-orders" role="tabpanel"
                                 aria-labelledby="v-pills-orders-tab">
                                <div class="tabs-content__single">
                                    <div class="content-wrapper">
                                        <!-- Content Header (Page header) -->
                                        <div class="content-header">
                                            <div class="container-fluid">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6">
                                                        <h1 class="m-0">Заказы</h1>
                                                    </div><!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <ol class="breadcrumb float-sm-right">
                                                            <li class="breadcrumb-item active"></li>
                                                        </ol>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                            </div><!-- /.container-fluid -->

                                            <!-- Main content -->
                                            <section class="content">
                                                <div class="container-fluid">
                                                    <!-- Small boxes (Stat box) -->
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body table-responsive p-0">
                                                                    <table class="table table-hover text-nowrap">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Имя</th>
                                                                            <th>Телефон</th>
                                                                            <th>Почта</th>
                                                                            <th>Адрес</th>
                                                                            <th>Способ доставки</th>
                                                                            <th>Стоимость доставки</th>
                                                                            <th>Способ оплаты</th>
                                                                            <th>Итого</th>
                                                                            <th>Статус</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($orders as $order)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $order->id }}
                                                                                </td>
                                                                                <td>{{ $order->name }}</td>
                                                                                <td>{{ $order->phone }}</td>
                                                                                <td>{{ $order->email }}</td>
                                                                                <td>{{ $order->address }}</td>
                                                                                <td>{{ $order->delivery_method }}</td>
                                                                                <td>{{ $order->delivery_cost }}</td>
                                                                                <td>{{ $order->payment_method }}</td>
                                                                                <td>{{ $order->total }}</td>
                                                                                <td>{{ $order->status }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </div>
                                                            <!-- /.card -->
                                                        </div>
                                                    </div>
                                                    <!-- /.row -->
                                                </div><!-- /.container-fluid -->
                                            </section>
                                            <!-- /.content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                 aria-labelledby="v-pills-address-tab">
                                <div class="tabs-content__single">
                                    <div class="content-wrapper">
                                        <!-- Content Header (Page header) -->
                                        <div class="content-header">
                                            <div class="container-fluid">
                                                <div class="row mb-2">
                                                    <div class="col-sm-6">
                                                        <h1 class="m-0">Адреса</h1>
                                                    </div><!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <ol class="breadcrumb float-sm-right">
                                                            <li class="breadcrumb-item active"></li>
                                                        </ol>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                            </div><!-- /.container-fluid -->

                                            <!-- Main content -->
                                            <section class="content">
                                                <div class="container my-4">
                                                    <h5 class="mb-3"><strong>Выбор адреса</strong></h5>
                                                    <form class="row g-3 align-items-end" action="{{ route('shop.mainAddress.update') }}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="col-md-6">
                                                            <select class="form-select" id="addressSelect" name="address_id">
                                                                <option selected disabled>Выберите адрес</option>
                                                                @foreach($addresses as $address)
                                                                <option value="{{ $address->id }}">{{ $address->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="w-100"></div> <!-- Перенос на новую строку -->
                                                        <div class="col-auto">
                                                            <input type="submit" class="btn btn-primary" value="Сделать основным">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class ="container my-4">
                                                    <h5 class="mb-3"><strong>Добавить новый адрес</strong></h5>
                                                    <form action="{{ route('shop.address.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="addressName" class="form-label">Название (например: Дом, Работа)</label>
                                                            <input type="text" class="form-control" id="addressName" name="name" required>
                                                        </div>
                                                        <div class="row g-3">
                                                            <div class="col-md-6">
                                                                <label for="country" class="form-label">Страна</label>
                                                                <input type="text" class="form-control" id="country" name="country" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="city" class="form-label">Город</label>
                                                                <input type="text" class="form-control" id="city" name="city" required>
                                                            </div>
                                                        </div>
                                                        <div class="row g-3 mt-1">
                                                            <div class="col-md-6">
                                                                <label for="street" class="form-label">Улица</label>
                                                                <input type="text" class="form-control" id="street" name="street" required>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="house" class="form-label">Дом</label>
                                                                <input type="text" class="form-control" id="house" name="house" required>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="postcode" class="form-label">Индекс</label>
                                                                <input type="text" class="form-control" id="postcode" name="postcode" required>
                                                            </div>
                                                            <div class="col-auto">
                                                                <input type="submit" class="btn btn-success mt-4" value="Сохранить адрес">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </section>
                                            <!-- /.content -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                                 aria-labelledby="v-pills-account-tab">
                                <div class="tabs-content__single">
                                    <h4><span>Hello Admin</span> (Not Admin? Logout)</h4>
                                    <h5>From your account dashboard you can view your <span>Recent Orders, manage your
                                            shipping</span> and <span>billing addresses,</span> and edit your
                                        <span>Password and account details</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End My Account Page-->
    </main>


@endsection
