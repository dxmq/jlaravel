@extends('layouts._base')

@section('title', $post->title)

@section('content')
    <div class="col-sm-8 blog-main">
        @include('partials._success')
        <div class="blog-post">
            <div style="display:inline-flex">
                <h2 class="blog-post-title">{{ $post->title }}</h2>
                @if (!Auth::guest())
                <a style="margin: auto"  href="/posts/{{ $post->id }}/edit">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a style="margin: auto"  href="/posts/{{ $post->id }}/delete">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="return del()"></span>
                </a>
                @endif
            </div>

            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }} </a></p>

            <p>
            <p>{!! $post->content !!}</p><p><br>
            </p>
            <div>
                <a href="/posts/62/zan" type="button" class="btn btn-primary btn-lg">赞</a>

            </div>
        </div>

        @include('partials._error')

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">评论</div>

            <!-- List group -->
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                <li class="list-group-item">
                    <h5>{{ $comment->created_at->format('Y-m-d H:i:s') }} by {{ $comment->user->name }}</h5>
                    <div>
                        <h4>{{ $comment->content }}</h4>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">发表评论</div>

            <!-- List group -->
            <ul class="list-group">
                <form action="/posts/comment" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <li class="list-group-item">
                        <textarea name="content" class="form-control" rows="10"></textarea>
                        <button class="btn btn-default" type="submit">提交</button>
                    </li>
                </form>

            </ul>
        </div>
    </div>
@endsection