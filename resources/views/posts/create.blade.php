@extends('layouts._base')

@section('title', '写文章')

@section('content')
    <div class="col-sm-8 blog-main">
        @include('partials._error')
        <form action="{{ url('/posts') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{ old('title') }}" autofocus>
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="text1" style="display: none" name="content" style="width:100%; height:200px;">{{ old('content') }}</textarea>
                <div id="editor">
                </div>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/wangEditor.min.js') }}"></script>
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor = new E('#editor');
        editor.customConfig.menus = [
            'head',  // 标题
            'bold',  // 粗体
            'fontSize',  // 字号
            'fontName',  // 字体
            'italic',  // 斜体
            'strikeThrough',  // 删除线
            'foreColor',  // 文字颜色
            'backColor',  // 背景颜色
            'link',  // 插入链接
            'list',  // 列表
            'justify',  // 对齐方式
            'quote',  // 引用
            'emoticon',  // 表情
            'image',  // 插入图片
            'table',  // 表格
            'code',  // 插入代码
        ];
        var $text1 = $('#text1');
        editor.customConfig.onchange = function (html) {
            // 监控变化，同步更新到 textarea
            $text1.val(html)
        };
        editor.create()
    </script>
@endsection