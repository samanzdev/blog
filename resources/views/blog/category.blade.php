@extends('layout.master')
@section('title')
    سام بلاگ | {{ $category->name }}
@endsection
@section('category')
    <section class="categorie-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="categorie-title">
                        <small>
                            <a href="{{ route('blog.index') }}">صفحه نخست</a>
                            <span class="arrow_carrot-left"></span> {{ $category->name }}
                        </small>
                        <h3>دسته بندی : <span>{{ $category->name }}</span></h3>
                        <p>{!! $category->description !!}</p>
                    </div>
                </div>
            </div>
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
                    <!--widget-categories-->
                    <div class="widget">
                        <div class="section-title">
                            <h5>دسته بندی ها</h5>
                        </div>
                        <ul class="widget-categories">
                            @foreach(getCategory() as $categories)
                                <li>
                                    <a href="{{ route('blog.category', $categories->slug) }}"
                                       class="categorie">{{ $categories->name }}</a>
                                    <span class="ml-auto">{{ $categories->post_count }} نوشته</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
