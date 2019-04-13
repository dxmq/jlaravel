@extends('admin.layouts._base')

@section('title', '修改角色')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-xs-6">
                    <div class="box">
                    <!-- /.box-header -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">修改角色</h3>
                            </div>
                        @include('partials._error')
                        <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="/admin/roles/{{ $role->id }}" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">角色名</label>
                                        <input type="text" class="form-control" name="name" autofocus value="{{ $role->name }}" required>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">描述</label>
                                        <input type="text" class="form-control" name="description" value="{{ $role->description }}" required>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection