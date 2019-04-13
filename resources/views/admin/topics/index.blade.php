@extends('admin.layouts._base')

@section('title', '专题管理')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-xs-6">
                    @include('partials._success')
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">专题列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/topics/create" >增加专题</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>专题名称</th>
                                    <th>操作</th>
                                </tr>
                                @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ $topic->id }}</td>
                                    <td>{{ $topic->name }}</td>
                                    <td>
                                        <a type="button" class="btn resource-delete" href="/admin/topics/{{ $topic->id }}/edit" >修改</a>
                                        <a type="button" class="btn resource-delete" href="/admin/topics/{{ $topic->id }}/destroy" onclick="return is_delete();">删除</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection