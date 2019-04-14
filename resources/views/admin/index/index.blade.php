@extends('admin.layouts._base')

@section('title', '后台首页')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Welcome!</h3>
                    </div>
                    <div class="content-header">
                        <p>欢迎使用 jlaravel 管理后台。由 thinking 设计</p>
                        <p>博客地址 <a href="http://www.lxsuying.com" target="_blank"> Lx 博客</a></p>
                        <p>项目地址: 码云地址 <a href="https://gitee.com/h1ml/jlaravel.git" target="_blank">https://gitee.com/h1ml/jlaravel.git</a></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">基本信息</h3>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        运行环境
                                    </div>
                                    <div class="ibox-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <tr>
                                                    <th>PHP 版本</th>
                                                    <td><?php echo PHP_VERSION; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>MYSQL 版本</th>
                                                    <td><?php echo mysqli_get_client_version();?></td>
                                                </tr>
                                                <tr>
                                                    <th>WEB 服务器</th>
                                                    <td><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
                                                </tr>
                                                <tr>
                                                    <th>操作系统</th>
                                                    <td><?php echo PHP_OS;?></td>
                                                </tr>
                                                <tr>
                                                    <td>脚本最大执行时间(s)</td>
                                                    <td><?php echo get_cfg_var('max_execution_time');?></td>
                                                </tr>
                                                <tr>
                                                    <td>当前时间</td>
                                                    <td><?php echo date('Y-m-d H:i:s');?></td>
                                                </tr>
                                                <tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">更新日志</div>
                                    <div class="panel-body">
                                        <div class="ibox-content timeline">
                                            <div class="timeline-item">
                                                <div class="row">
                                                    <div class="col-xs-3 date">
                                                        <i class="fa fa-briefcase"></i> 12:00
                                                        <br>
                                                        <small class="text-navy">2019-4-08</small>
                                                    </div>
                                                    <div class="col-xs-7 content no-top-border">
                                                        <p class="m-b-xs"><strong>后台框架搭建</strong></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 date">
                                                        <i class="fa fa-briefcase"></i> 22:00
                                                        <br>
                                                        <small class="text-navy">2019-4-10</small>
                                                    </div>
                                                    <div class="col-xs-7 content no-top-border">
                                                        <p class="m-b-xs"><strong>RBAC权限管理</strong></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 date">
                                                        <i class="fa fa-briefcase"></i> 6:00
                                                        <br>
                                                        <small class="text-navy">2019-4-12</small>
                                                    </div>
                                                    <div class="col-xs-7 content no-top-border">
                                                        <p class="m-b-xs"><strong>后台修复bug</strong></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-3 date">
                                                        <i class="fa fa-briefcase"></i> 12:00
                                                        <br>
                                                        <small class="text-navy">2019-04-14</small>
                                                    </div>
                                                    <div class="col-xs-7 content no-top-border">
                                                        <p class="m-b-xs"><strong>增加部分系统功能 & 修复 BUG</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
