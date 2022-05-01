@extends('admin.layout.master')
@section('pageTitle', 'سام بلاگ | ویرایش پست')
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">لیست پست
                                ها</a></li>
                        <li class="breadcrumb-item active">ویرایش پست</li>
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
                            <h3 class="card-title">ویرایش پست</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" action="{{ route('admin.posts.update', $post->id) }}"
                              method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">عنوان پست</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           id="title" value="{{ $post->title ?? old('title') }}"
                                           placeholder="عنوان پست را وارد کنید">
                                    @error('title')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="col-sm-2 control-label">متا ( Slug )</label>
                                    <input type="text" name="slug"
                                           class="form-control @error('slug') is-invalid @enderror"
                                           id="slug" value="{{ $post->slug ?? old('slug') }}"
                                           placeholder="متا ( Slug ) را وارد کنید">
                                    @error('slug')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id" class="col-sm-2 control-label">دسته بندی</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($category as $categories)
                                            <option
                                                value="{{ $categories->id }}" {{ IsActive($categories->id, $post->category_id,'selected') }}>{{ $categories->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sort_description" class="col-sm-2 control-label">توضیح کوتاه</label>
                                    <textarea name="sort_description" id="sort_description"
                                              class="form-control @error('sort_description') is-invalid @enderror"
                                              rows="20">{{ $post->sort_description ?? old('sort_description') }}</textarea>
                                    @error('sort_description')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="body" class="col-sm-2 control-label">توضیح کامل</label>
                                    <textarea name="body" id="editor1"
                                              class="form-control @error('body') is-invalid @enderror"
                                              rows="20">{{ $post->body ?? old('body') }}</textarea>
                                    @error('body')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">تصویر شاخص</label>
                                    <img src="{{ asset('assets/images/posts/'.$post->image) }}" alt="{{ $post->title }}"
                                         width="150" height="100">
                                    <hr>
                                    <input type="file" name="image" id="image">
                                    @error('image')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="is_active" class="col-sm-2 control-label">وضعیت</label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1" {{ IsActive($post->is_active, 1,'selected') }}>فعال</option>
                                        <option value="0" {{ IsActive($post->is_active, 0,'selected') }}>غیر فعال
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">ثبت</button>
                                <a href="{{ route('admin.posts.index') }}"
                                   class="btn btn-default float-left">لغو</a>
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
            filebrowserUploadUrl: "{{ asset('admin/posts/upload_ckeditor') }}",
            filebrowserBrowseUrl: "{{ asset('admin/posts/file_browser') }}"
        });
        CKEDITOR.replace('sort_description', {
            language: 'fa',
            height: 400,
        });
    </script>
@endsection
