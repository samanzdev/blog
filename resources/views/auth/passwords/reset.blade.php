@extends('layout.master')
@section('title', 'سام بلاگ | بازیابی رمز عبور')
@section('main')
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>بازیابی رمز عبور</h5>
                </div>
                <form method="POST" action="{{ route('password.update') }}" class="sign-form widget-form">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <input type="text" name="email"
                               class="form-control @error('email') error-border @enderror" placeholder="ایمیل *"
                               value="{{ $email ?? old('email') }}">
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
                        <button type="submit" class="btn-custom">بازیابی رمز عبور</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
