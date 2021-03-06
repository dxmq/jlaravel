@extends('admin.layouts._base')

@section('title', '用户管理')

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
                            <h3 class="box-title">用户列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/users/create" >增加用户</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody><tr>
                                    <th style="width: 10px">#</th>
                                    <th>用户名称</th>
                                    <th>角色</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}.</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <?php $role_str = '';?>
                                        @foreach($user->roles as $role)
                                            <?php $role_str .= $role->description . ' / ' ?>
                                        @endforeach
                                        <?php echo rtrim($role_str, ' / '); ?>
                                    </td>
                                    <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a type="button" class="btn" href="/admin/users/{{ $user->id }}/edit" >修改</a>
                                        <a type="button" class="btn" href="/admin/users/{{ $user->id }}/delete" onclick="return is_delete()">删除</a>
                                        <a type="button" class="btn" href="/admin/users/{{ $user->id }}/role" >分配角色</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection