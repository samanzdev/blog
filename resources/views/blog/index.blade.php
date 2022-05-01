@extends('layout.master')
@section('title', 'سام بلاگ | دنیای برنامه نویسی')
@section('category')
    <section class="categorie-section mb-5">
        <div class="container-fluid">
            <div class="row"></div>
        </div>
    </section>
@endsection
@section('main')
    <section class="blog-grid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 mt-30">
                    <div class="row">
                        @foreach($post as $posts)
                            <div class="col-lg-6 col-md-6">
                                <!--Post-1-->
                                <div class="post-card">
                                    <div class="post-card-image">
                                        <a href="{{ route('blog.post', $posts->slug) }}">
                                            <img src="{{ asset('assets/images/posts/'.$posts->image) }}"
                                                 alt="{{ $posts->title }}">
                                        </a>
                                    </div>
                                    <div class="post-card-content">
                                        <a href="{{ route('blog.category',$posts->category->slug) }}"
                                           class="categorie">{{ $posts->category->name }}</a>
                                        <h5>
                                            <a href="{{ route('blog.post', $posts->slug) }}">{{ $posts->title }}</a>
                                        </h5>
                                        <p>{!! substr($posts->sort_description, 0, 100). '...' !!}</p>
                                        <div class="post-card-info">
                                            <ul class="list-inline">
                                                <li>
                                                    <a>نویسنده: {{ $posts->user->username }}</a>
                                                </li>
                                                <li class="dot"></li>
                                                <li>{{ \Hekmatinasser\Verta\Verta::instance($posts->created_at)->format('%d %B %Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--/-->
                            </div>
                        @endforeach
                        <!--pagination-->
                        <div class="col-lg-12">
                            <div class="pro-pagination-style text-center mt-30">
                                {{ $post->links() }}
                            </div>
                            <!--/-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 max-width">
                    <!--widget-latest-posts-->
                    <div class="widget ">
                        <div class="section-title">
                            <h5>نوشته های اخیر</h5>
                        </div>
                        <ul class="widget-latest-posts">
                            <li class="last-post">
                                <div class="image">
                                    <a href="post-default.html">
                                        <img src="assets/img/latest/1.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="nb">1</div>
                                <div class="content">
                                    <p>
                                        <a href="post-default.html">5 چیزی که ای کاش قبل از سفر به مالزی می دانستم</a>
                                    </p>
                                    <small>
                                        <span class="icon_clock_alt"></span> 20 خرداد 1400</small>
                                </div>
                            </li>
                            <li class="last-post">
                                <div class="image">
                                    <a href="post-default.html">
                                        <img src="assets/img/latest/2.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="nb">2</div>
                                <div class="content">
                                    <p>
                                        <a href="post-default.html">5 چیزی که ای کاش قبل از سفر به مالزی می دانستم</a>
                                    </p>
                                    <small>
                                        <span class="icon_clock_alt"></span> 20 خرداد 1400</small>
                                </div>
                            </li>
                            <li class="last-post">
                                <div class="image">
                                    <a href="post-default.html">
                                        <img src="assets/img/latest/3.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="nb">3</div>
                                <div class="content">
                                    <p>
                                        <a href="post-default.html">5 چیزی که ای کاش قبل از سفر به مالزی می دانستم</a>
                                    </p>
                                    <small>
                                        <span class="icon_clock_alt"></span> 20 خرداد 1400</small>
                                </div>
                            </li>
                            <li class="last-post">
                                <div class="image">
                                    <a href="post-default.html">
                                        <img src="assets/img/latest/4.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="nb">4</div>
                                <div class="content">
                                    <p>
                                        <a href="post-default.html">5 چیزی که ای کاش قبل از سفر به مالزی می دانستم</a>
                                    </p>
                                    <small>
                                        <span class="icon_clock_alt"></span> 20 خرداد 1400</small>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--/-->
                </div>
            </div>
        </div>
    </section>
@endsection

@if (Session::has('loginMessage'))
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
                title: '{!! Session::get('loginMessage') !!}'
            })
        </script>
        @php
            \Illuminate\Support\Facades\Session::forget('loginMessage');
        @endphp
    @endsection
@endif
