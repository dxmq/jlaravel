@extends('layouts._base')

@section('title', '个人主页')

@section('content')
    <div class="col-sm-8">
        <blockquote>
            <p><img src="/image/user.jpeg" alt="" class="img-rounded" style="border-radius:500px; height: 40px"> Kassandra Ankunding2
            </p>


            <footer>关注：4｜粉丝：0｜文章：9</footer>
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
                    <div class="blog-post" style="margin-top: 30px">
                        <p class=""><a href="/user/5">Kassandra Ankunding2</a> 6天前</p>
                        <p class=""><a href="/posts/62" >你好你好</a></p>


                        <p><p>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好...</p>
                    </div>
                    <div class="blog-post" style="margin-top: 30px">
                        <p class=""><a href="/user/5">Kassandra Ankunding2</a> 6天前</p>
                        <p class=""><a href="/posts/61" >你好你好</a></p>


                        <p><p>你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好你好...</p>
                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <div class="blog-post" style="margin-top: 30px">
                        <p class="">Jadyn Medhurst Jr.</p>
                        <p class="">关注：1 | 粉丝：1｜ 文章：0</p>

                        <div>
                            <button class="btn btn-default like-button" like-value="1" like-user="6" _token="MESUY3topeHgvFqsy9EcM916UWQq6khiGHM91wHy" type="button">取消关注</button>
                        </div>

                    </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div><!-- /.blog-main -->
@endsection