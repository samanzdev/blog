<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <!--logo-->
        <div class="logo">
            <a href="{{ route('blog.index') }}">
                <img src="{{ asset('assets/img/logo-dark.png') }}" alt="" class="logo-dark">
                <img src="{{ asset('assets/img/logo-white.png') }}" alt="" class="logo-white">
            </a>
        </div>
        <!--/-->

        <!--navbar-collapse-->
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav mr-5">
                @foreach(getCategory() as $categories)
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('blog.category', $categories->slug) }}">{{ $categories->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="navbar-nav mr-auto ml-3">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <li class="nav-item dropdown float-left">
                        <a class="nav-link dropdown-toggle" href="#"
                           data-toggle="dropdown">{{ auth()->user()->is_superuser == 1 ? 'پنل مدیریت' : 'پنل کاربری' }}</a>
                        <ul class="dropdown-menu fade-up">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">پنل مدیریت</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">خروج</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link pl-0"
                           href="{{ route('auth.login') }}">ورود</a>/
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('auth.register') }}">ثبت نام</a>
                    </li>
                @endif
            </ul>
        </div>
        <!--/-->

        <!--navbar-right-->
        <div class="navbar-right ml-auto">
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox"/>
                    <div class="slider round"></div>
                </label>
                {{--                <img data-theme="light" src="{{ asset('assets/images/moon.svg') }}">--}}
                {{--                <img data-theme="dark" src="{{ asset('assets/images/sun.svg') }}">--}}
            </div>

            <div class="search-icon">
                <i class="icon_search"></i>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
