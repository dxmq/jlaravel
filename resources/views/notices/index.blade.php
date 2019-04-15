@extends('layouts._base')

@section('title', '通知')

@section('content')
    <div class="col-sm-8 blog-main">
        @foreach ($notices as $notice)
        <div class="blog-post">
            <p class="blog-post-title">Notice{{ $loop->iteration }}：{{ $notice->title }}</p>
            <p class="blog-post">{{ $notice->content }}</p>
        </div>
        @endforeach
    </div><!-- /.blog-main -->
@endsection