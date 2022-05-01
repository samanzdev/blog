<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.dashboard') }}"
                           class="nav-link {{ dynamicLinkSidebar('admin.dashboard', 'active') }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.users.index', 'admin.users.create']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.users.index', 'admin.users.create']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                مدیریت کاربران
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.users.index') }}" class="nav-link {{ dynamicLinkSidebar('admin.users.index', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست کاربران</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.users.create') }}" class="nav-link {{ dynamicLinkSidebar('admin.users.create', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن کاربر جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.categories.index', 'admin.categories.create','admin.categories.edit', 'admin.categories.show']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.categories.index', 'admin.categories.create','admin.categories.edit', 'admin.categories.show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>
                                مدیریت دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ dynamicLinkSidebar('admin.categories.index', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست دسته بندی</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.create') }}" class="nav-link {{ dynamicLinkSidebar('admin.categories.create', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن دسته بندی جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ in_array(Route::currentRouteName(), ['admin.posts.index', 'admin.posts.create', 'admin.posts.edit','admin.posts.show']) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), ['admin.posts.index', 'admin.posts.create','admin.posts.edit','admin.posts.show']) ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sticky-note-o"></i>
                            <p>
                                مدیریت پست ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.index') }}" class="nav-link {{ dynamicLinkSidebar('admin.posts.index', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست پست ها</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.posts.create') }}" class="nav-link {{ dynamicLinkSidebar('admin.posts.create', 'active') }}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>افزودن پست جدید</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
