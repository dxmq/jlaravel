@extends('layouts._base')

@section('title', '发送邮箱验证')

@section('content')
    <div class="col-sm-8 blog-main">

        <h2><i class="fa fa-cog" aria-hidden="true"></i> 验证邮箱</h2>
        <hr>
        <article class="message is-warning">
            <div class="message-body">
                <p>邮箱未激活，请前往 <span style="color:#337ab7">{{ Auth::user()->email }}</span> 查收激活邮件，激活后才能完整地使用网站功能，如评论、点赞。
                </p>
                <br>
                <p> 未收到邮件？请点击以下按钮重新发送验证邮件。</p>
            </div>
        </article>
        <form class="form-horizontal" method="POST" action="{{ route('user.send-verification-mail')}}"
              accept-charset="UTF-8">

            {!! csrf_field() !!}

            <div class="">
                <button class="button is-link is-fullwidth"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                    重新发送验证邮件
                </button>
            </div>
            <br>
        </form>
    </div>

@stop