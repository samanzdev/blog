@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | لیست دسته بندی ها')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مدیریت دسته بندی ها</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                        <li class="breadcrumb-item active">مدیریت دسته بندی</li>
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
                            <h3 class="card-title">لیست دسته بندی ها</h3>

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
                                    <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-info">افزودن
                                        دسته بندی جدید</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>آیدی دسته بندی</th>
                                    <th>عنوان دسته بندی</th>
                                    <th>متا ( Slug )</th>
                                    <th>تاریخ ثبت</th>
                                    <th>اقدامات</th>
                                </tr>
                                @if (sizeof($category) > 0)
                                    <?php $i = 1; ?>
                                    @foreach ($category as $categories)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $categories->name }}</td>
                                            <td>{{ $categories->slug }}</td>
                                            <td>{{ \Hekmatinasser\Verta\Verta::instance($categories->created_at)->format('Y/m/d H:i:s') }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.show', $categories->id) }}"
                                                   class="btn btn-outline-info btn-sm">نمایش</a>
                                                <a href="{{ route('admin.categories.edit', $categories->id) }}"
                                                   class="btn btn-outline-primary btn-sm">ویرایش</a>
                                                <form class="d-inline-block"
                                                      action="{{ route('admin.categories.destroy', $categories->id) }}"
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
                                            دسته بندی یافت نشد!
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $category->links() }}
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
