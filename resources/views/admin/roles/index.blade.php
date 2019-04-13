@extends('admin.layouts._base')

@section('title', '角色管理')

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
                            <h3 class="box-title">角色列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/roles/create" >增加角色</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>角色名称</th>
                                    <th>角色描述</th>
                                    <th>权限</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}.</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                        <?php $str = '';?>
                                        @foreach($role->permissions as $permission)
                                            <?php $str .= $permission->description . ' / ' ?>
                                        @endforeach
                                            <?php echo rtrim($str, ' / '); ?>
                                    </td>
                                    <td>{{ $role->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a type="button" class="btn" href="/admin/roles/{{ $role->id }}/edit" >修改</a>
                                        <a type="button" class="btn" href="/admin/roles/{{ $role->id }}/destroy" onclick="return is_delete()">删除</a>
                                        <a type="button" class="btn" href="/admin/roles/{{ $role->id }}/permission" >分配权限</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody></table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection