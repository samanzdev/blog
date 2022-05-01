@extends('admin.layout.master')
@section('PageTitle', 'سام بلاگ | داشبورد')
@section('content')
    <style>
        #fileExplorer {
            float: left;
            width: 680px;
            border-left: 1px solid #dff0ff;
        }

        .thumbnail {
            float: left;
            margin: 3px;
            padding: 3px;
            border: 1px solid #dff0ff;
        }

        .main-header {
            display: none;
        }

        .wrapper {
            overflow: hidden;
        }
    </style>
    <div id="fileExplorer">
        @foreach($fileNames as $fileName)
            <div class="thumbnail">
                <img src="{{ asset('assets/images/categories/'.$fileName) }}" alt="thumb"
                     title="{{ asset('assets/images/categories/'.$fileName) }}" width="200" height="100">
                <br>
                {{ $fileName }}
            </div>
        @endforeach
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('asset/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function () {
            var funcNum = <?php echo $_GET['CKEditorFuncNum'] . ';'; ?>
            $('#fileExplorer').on('click', 'img', function () {
                var fileUrl = $(this).attr('title');
                window.opener.CKEDITOR.tools.callFunction(funcNum, fileUrl);
                window.close();
            }).hover(function () {
                $(this).css('cursor', 'pointer');
            });
        });
    </script>
@endsection
