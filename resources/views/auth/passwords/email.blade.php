@extends('layout.master')
@section('title', 'سام بلاگ | فراموشی رمز عبور')
@section('main')
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>فراموشی رمز عبور</h5>
                </div>
                <form method="POST" action="{{ route('password.email') }}" class="sign-form widget-form">
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
                        <button type="submit" class="btn-custom">ارسال لینک بازیابی</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@if (session('status'))
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
                icon: 'success',
                title: '{{ session('status') }}'
            })
        </script>
    @endsection
@endif
