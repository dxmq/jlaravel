@extends("layouts._base")

@section("content")

    <div class="alert alert-success" role="alert">
        @if ($posts->total())
            下面是搜索"{{$query}}"出现的文章，共{{$posts->total()}}条
        @else
            没有关键词为"{{$query}}"文章
        @endif
    </div>

    <div class="col-sm-8 blog-main">
        @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{ $post->title }}</a></h2>
                <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="/user/{{ $post->user_id }}">{{ $post->user->name }}</a></p>

                <p>{!! str_limit($post->content, 200, '...') !!}</p>
            </div>
        @endforeach

        {{$posts->links()}}
    </div><!-- /.blog-main -->

@endsection