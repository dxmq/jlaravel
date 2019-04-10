@extends('layouts._base')

@section('title', '写文章')

@section('content')
    <div class="col-sm-8 blog-main">
        @include('partials._error')
        <form action="{{ url('/posts') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容">{{ old('content') }}</textarea>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/wangEditor.min.js') }}"></script>
    <script>
    var editor = new wangEditor('content');
    /*

    // 设置 headers
    editor.config.uploadHeaders = {
    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    };
    */

    editor.create();
    </script>
@endsection