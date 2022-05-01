@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | مدیریت کاربران')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">مدیریت کاربران</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">داشبورد</a></li>
                        <li class="breadcrumb-item active">مدیریت کاربران</li>
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
                            <h3 class="card-title">لیست کاربران</h3>

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
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-outline-info">افزودن
                                        کاربر جدید</a>
                                </div>
                                <div class="input-group-sm mr-3">
                                    <a href="{{ request()->fullUrlWithQuery(['admin' => 1]) }}"
                                       class="btn btn-outline-warning">کاربران مدیر</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover" id="load-page">
                                <tbody>
                                <tr>
                                    <th>آیدی کاربر</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>سطح کاربری</th>
                                    <th>تاریخ ثبت</th>
                                    <th>اقدامات</th>
                                </tr>
                                @if (sizeof($user) > 0)
                                    <?php $i = 1; ?>
                                    @foreach ($user as $users)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $users->username }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>
                                                @if ($users->is_superuser == 1)
                                                    <span class="text text-success">مدیر</span>
                                                @else
                                                    <span class="text text-danger">کاربر</span>
                                                @endif
                                            </td>
                                            <td>{{ \Hekmatinasser\Verta\Verta::instance($users->created_at)->format('Y/m/d H:i:s') }}</td>
                                            <td>
                                                <a href="{{ route('admin.users.edit', $users->id) }}"
                                                   class="btn btn-outline-primary btn-sm">ویرایش</a>
                                                <form class="d-inline-block" action="{{ route('admin.users.destroy', $users->id) }}" method="post">
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
                                            کاربری یافت نشد!
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $user->links() }}
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
