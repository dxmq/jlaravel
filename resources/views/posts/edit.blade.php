@extends('layouts._base')

@section('title', '修改文章')

@section('content')
    <div class="col-sm-8 blog-main">
        @include('partials._error')
        <form action="/posts/{{$post->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label>内容</label>
                <textarea id="content"  style="height:400px;max-height:500px;" name="content" class="form-control" placeholder="这里是内容">{!! $post->content !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div>
@endsection