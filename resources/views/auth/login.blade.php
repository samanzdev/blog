@extends('layout.master')
@section('title', 'سام بلاگ | ورود')
@section('main')
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>ورود</h5>
                </div>
                <form action="{{ route('auth.login.store') }}" class="sign-form widget-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="email"
                               class="form-control @error('email') error-border @enderror" placeholder="ایمیل *"
                               value="{{ old('email') }}">
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
                    <div class="sign-controls form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input"
                                   id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="rememberMe">مرا بخاطر بسپار</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn-link  ml-auto">رمز عبور خود را فراموش
                                کرده اید؟</a>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom">ورود</button>
                    </div>
                    <p class="form-group text-center">حساب کاربری ندارید؟ <a href="{{ route('auth.register') }}"
                                                                             class="btn-link">ثبت نام کنید</a></p>
                </form>
            </div>
        </div>
    </section>
@endsection
@if (Session::has('messageResetPassword') || Session::has('errorMessage'))
    @section('script')
        <script src="{{ asset('assets/js/sweetalert.js') }}"></script>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: '{{ Session::has('messageResetPassword') ? 'success' : 'error' }}',
                title: '{!! Session::get('messageResetPassword') ?: Session::get('errorMessage') !!}'
            })
        </script>
        @php
            \Illuminate\Support\Facades\Session::forget('messageResetPassword');
            \Illuminate\Support\Facades\Session::forget('errorMessage');
        @endphp
    @endsection
@endif
