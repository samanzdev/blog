@extends('layout.master')
@section('title', 'سام بلاگ | ثبت نام')
@section('main')
    <section class="section pt-55 mb-50">
        <div class="container-fluid">
            <div class="sign widget">
                <div class="section-title">
                    <h5>ثبت نام</h5>
                </div>
                <form action="{{ route('auth.register.store') }}" class="sign-form widget-form contact_form "
                      method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username"
                               class="form-control @error('username') error-border @enderror" placeholder="نام کاربری *"
                               value="{{ old('username') }}">
                        @error('username')
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control @error('email') error-border @enderror"
                               placeholder="آدرس ایمیل *" value="{{ old('email') }}">
                        @error('email')
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"
                               class="form-control @error('password') error-border @enderror" placeholder="رمز عبور *">
                        @error('password')
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation"
                               class="form-control @error('password_confirmation') error-border @enderror"
                               placeholder="تکرار رمز عبور *">
                        @error('password_confirmation')
                        <i class="fas fa-exclamation-circle"></i>
                        <span class="text text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom">ثبت نام</button>
                    </div>
                    <p class="form-group text-center">حساب کاربری دارید؟ <a href="{{ route('auth.login') }}" class="btn-link">وارد
                            شوید</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
