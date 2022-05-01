@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | نمایش دسته بندی')
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">داشبورد</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">خانه</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">لیست دسته بندی
                                ها</a></li>
                        <li class="breadcrumb-item active">نمایش دسته بندی</li>
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
                <!-- right column -->
                <div class="col-md-12">
                    <!-- Horizontal Form -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">نمایش دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">عنوان دسته بندی</label>
                                    <input type="text" name="name"
                                           class="form-control" disabled
                                           id="name" value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-sm-2 control-label">متا ( Slug )</label>
                                    <input type="text" name="slug"
                                           class="form-control" disabled
                                           id="slug" value="{{ $category->slug }}">
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">توضیحات</label>
                                    <textarea name="description" id="editor1" disabled
                                              class="form-control"
                                              rows="20">{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">تاریخ ثبت</label>
                                    <input type="text" name="slug"
                                           class="form-control" disabled
                                           id="slug" value="{{ \Hekmatinasser\Verta\Verta::instance($category->created_at)->format('Y/m/d H:i:s') }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{ route('admin.categories.index') }}"
                                   class="btn btn-default">لغو</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
