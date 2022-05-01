@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | ویرایش دسته بندی')
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
                        <li class="breadcrumb-item active">ویرایش دسته بندی</li>
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
                            <h3 class="card-title">ویرایش دسته بندی</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('admin.categories.update', $category->id) }}"
                              method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">عنوان دسته بندی</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           id="name" value="{{ $category->name ?? old('name') }}"
                                           placeholder="عنوان دسته بندی را وارد کنید">
                                    @error('name')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-sm-2 control-label">متا ( Slug )</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           id="slug" value="{{ $category->slug ?? old('slug') }}" placeholder="متا ( Slug ) را وارد کنید">
                                    @error('slug')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">توضیحات</label>
                                    <textarea name="description" id="editor1"
                                              class="form-control @error('description') is-invalid @enderror"
                                              rows="20">{{ $category->description ?? old('description') }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">ثبت</button>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-default float-left">لغو</a>
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
@section('scripts')
    <script src="{{ asset('asset/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('editor1', {
            language: 'fa',
            height: 400,
            filebrowserUploadUrl: "{{ asset('admin/categories/upload_ckeditor') }}",
            filebrowserBrowseUrl: "{{ asset('admin/categories/file_browser') }}"
        });
    </script>
@endsection
