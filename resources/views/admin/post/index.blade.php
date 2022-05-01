@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | لیست پست ها')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مدیریت پست ها</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                        <li class="breadcrumb-item active">مدیریت پست ها</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">لیست پست ها</h3>

                            <div class="card-tools d-flex">
                                <form>
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="search" value="{{ request('search') }}"
                                               class="form-control float-right" placeholder="جستجو">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="input-group-sm mr-3">
                                    <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-info">افزودن
                                        پست جدید</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>آیدی پست</th>
                                    <th>نویسنده</th>
                                    <th>دسته بندی</th>
                                    <th>عنوان پست</th>
                                    <th>متا ( Slug )</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ثبت</th>
                                    <th>اقدامات</th>
                                </tr>
                                @if (sizeof($post) > 0)
                                    <?php $i = 1; ?>
                                    @foreach ($post as $posts)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $posts->user->username }}</td>
                                            <td>{{ $posts->category->name }}</td>
                                            <td>{{ $posts->title }}</td>
                                            <td>{{ $posts->slug }}</td>
                                            <td>
                                                @if($posts->is_active == 1)
                                                    <span class="text text-success">فعال</span>
                                                @else
                                                    <span class="text text-danger">غیر فعال</span>
                                                @endif
                                            </td>
                                            <td>{{ \Hekmatinasser\Verta\Verta::instance($posts->created_at)->format('Y-m-d H:i:s') }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.show', $posts->id) }}"
                                                   class="btn btn-outline-info btn-sm">نمایش</a>
                                                <a href="{{ route('admin.posts.edit', $posts->id) }}"
                                                   class="btn btn-outline-primary btn-sm">ویرایش</a>
                                                <form class="d-inline-block"
                                                      action="{{ route('admin.posts.destroy', $posts->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-sm">حذف
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text text-danger text-center">
                                            پستی یافت نشد!
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $post->links() }}
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
