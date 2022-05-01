@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | افزودن کاربر')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">لیست کاربران</a></li>
                        <li class="breadcrumb-item active">افزودن کاربر جدید</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">افزودن کاربر جدید</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('admin.users.store') }}"
                              method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">نام کاربری</label>
                                    <input type="text" name="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           id="username" value="{{ old('username') }}"
                                           placeholder="نام کاربری را وارد کنید">
                                    @error('username')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">ایمیل</label>
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           id="email" value="{{ old('email') }}" placeholder="ایمیل را وارد کنید">
                                    @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="is_superuser" class="col-sm-2 control-label">نقش کاربر</label>
                                    <select name="is_superuser" id="is_superuser" class="form-control">
                                        <option value="0">کاربر
                                        </option>
                                        <option value="1">مدیر
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">پسورد</label>
                                    <input type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           id="inputPassword3"
                                           placeholder="پسورد را وارد کنید">
                                    @error('password')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">تکرار پسورد</label>
                                    <input type="password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           id="inputPassword3" placeholder="تکرار پسورد را وارد کنید">
                                    @error('password_confirmation')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">ثبت</button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-default float-left">لغو</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
