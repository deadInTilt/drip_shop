@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Создание пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Пользователи</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-sm-6">
                        <h4 class="m-0">Личные данные</h4>
                    </div><!-- /.col -->
                    <div class="row mb-2 mt-2">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <form action="{{ route('admin.user.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{ old('surname') }}">
                                    @error('surname')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="patronymic" class="form-control" placeholder="Отчество" value="{{ old('patronymic') }}">
                                    @error('patronymic')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                <div class="form-group">
                                    <input type="text" name="age" class="form-control" placeholder="Возраст" value="{{ old('age') }}">
                                    @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="gender" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Пол</option>
                                        <option {{ old('gender') == 1 ? ' selected' : '' }} value=1>Мужской</option>
                                        <option {{ old('gender') == 2 ? ' selected' : '' }} value=2>Женский</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Мобильный номер телефона" value="{{ old('phone') }}">
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Адрес" value="{{ old('address') }}">
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="role_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                        <option disabled selected>Роль</option>
                                        <option {{ old('role_id') == 2 ? ' selected' : '' }} value=2>User</option>
                                        <option {{ old('role_id') == 1 ? ' selected' : '' }} value=1>Admin</option>
                                    </select>
                                    @error('role_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Почта" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Создать">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
@endsection
