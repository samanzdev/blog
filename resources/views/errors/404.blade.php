@extends('layout.master')
@section('title', 'سام بلاگ | 404')
@section('main')
    <!--Page404-->
    <section class="section pt-55 mb-50">
        <div class="container-fluid">
            <div class="page404  widget">
                <div class="image">
                    <img src="{{ asset('assets/images/404.html') }}" alt="">
                </div>
                <div class="content">
                    <h1>404</h1>
                    <h3>صفحه پیدا نشد.</h3>
                    <p>مطلبی که به دنبال آن هستید متاسفانه پیدا نشد. </p>
                    <a href="{{ route('blog.index') }}" class="btn-custom">بازگشت به صفحه اصلی</a>
                </div>
            </div>
        </div>
    </section>
@endsection
