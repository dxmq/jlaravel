@extends('layouts._base')

@section('title', '首页')

@section('content')
    <div class="col-sm-8 blog-main">
        <div>
            <div id="carousel-example" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example" data-slide-to="1"></li>
                    <li data-target="#carousel-example" data-slide-to="2"></li>
                </ol><!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ asset('image/banner1.jpg') }}" alt="..."/>
                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('image/banner2.jpg') }}" alt="..."/>
                        <div class="carousel-caption"></div>
                    </div>
                    <div class="item">
                        <img src="{{ asset('image/banner3.jpg') }}" alt="..."/>
                        <div class="carousel-caption"></div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-example" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <div style="height: 20px;">
        </div>
        @if(Auth::check() && !Auth::user()->verified&&!Request::is('email_verification_required'))
            <h5 class="blog-post-meta">邮箱未激活，请前往 {{ Auth::user()->email }} 查收激活邮件，激活后才能完整地使用本网站功能。未收到邮件？请前往 <a
                        class="has-text-danger" href="{{ route('email-verification-required') }}">重发邮件</a> 。</h5>
        @endif
        @include('partials._success')
        <div>
            @foreach ($posts as $post)
                <div class="blog-post">
                    <h3 class="blog-post-title"><a href="/posts/{{$post->id}}/show">{{ $post->title }}</a></h3>
                    <p class="blog-post-meta">@isset($post->created_at){{ $post->created_at->format('Y-m-d H:i') }}
                        by @endisset<a
                                href="/user/{{ $post->user_id }}">{{ $post->user->name }}</a>@if(count($post->topics)!= 0)
                            | @foreach ($post->topics as $topic) <a href="/topic/{{ $topic->id }}"><span
                                        style="font-size: 13px;">{{ $topic->name }}</span></a> @endforeach @endif</p>

                    <p>@if(preg_match('/^.*\.(png|jpg|jpeg|gif).*$/i', $post->content)){!! str_replace('<img src=', 'image address ', str_limit($post->content, 150, '...')) !!}@else{!! str_limit($post->content, 150, '...')  !!}@endif</p>
                    <p class="blog-post-meta">赞 {{ $post->zans_count }} | 评论 {{ $post->comments_count }}</p>
                </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
@endsection


