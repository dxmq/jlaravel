@extends('admin.layouts._base')

@section('title', '权限管理')

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
                            <h3 class="box-title">权限列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/permissions/create" >增加权限</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>权限名称</th>
                                    <th>描述</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}.</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->description }}</td>
                                    <td>{{ $permission->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a type="button" class="btn" href="/admin/permissions/{{ $permission->id }}/edit" >修改</a>
                                        <a type="button" class="btn" href="/admin/permissions/{{ $permission->id }}/destroy" onclick="return is_delete()">删除</a>
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