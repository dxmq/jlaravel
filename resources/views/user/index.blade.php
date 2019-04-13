@extends('layouts._base')

@section('title', $user->name. ' 用户中心')

@section('content')
    <div class="col-sm-8">
        <blockquote>
            <p><img src="/image/user.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> {{ $user->name }}
            </p>
            <footer>关注：{{ $user->stars_count }}｜粉丝：{{ $user->fans_count }}｜文章：{{ $user->posts_count }}</footer>

            @include('partials._user_like', ['target_user' => $user])
        </blockquote>
    </div>
    <div class="col-sm-8 blog-main">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">文章</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">关注</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">粉丝</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @foreach ($posts as $post)
                    <div class="blog-post" style="margin-top: 30px">
                        <p class=""><a href="/user/{{ $post->user_id }}">{{ $post->user->name }}</a> {{ $post->created_at->diffForHumans() }}</p>
                        <p class=""><a href="/posts/{{ $post->id }}/show" >{{ $post->title }}</a></p>


                        <p><p>{!! str_limit($post->content, 100, '...') !!}</p>
                    </div>
                    @endforeach
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    @foreach ($stars as $star)
                    <div class="blog-post" style="margin-top: 30px">
                        <p><a href="/user/{{ $star->suser->id }}">{{ $star->suser->name }}</a></p>
                        <p class="">关注：{{ $star->suser->stars->count()}} | 粉丝：{{ $star->suser->fans->count() }}｜ 文章：{{ $star->suser->posts->count() }}</p>

                       @include('partials._user_like', ['target_user' => $star->suser])

                    </div>
                    @endforeach
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    @foreach ($fans as $fan)
                    <div class="blog-post" style="margin-top: 30px">
                        <p><a href="/user/{{ $fan->fuser->id }}">{{ $fan->fuser->name }}</a></p>
                        <p class="">关注：{{ $fan->fuser->stars->count()}} | 粉丝：{{ $fan->fuser->fans->count() }}｜ 文章：{{ $fan->fuser->posts->count() }}</p>

                        @include('partials._user_like', ['target_user' => $fan->fuser])

                    </div>
                    @endforeach
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div><!-- /.blog-main -->
@endsection