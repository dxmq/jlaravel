@extends('admin.layouts._base')

@section('title', '增加权限')

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
                                <h3 class="box-title">增加权限</h3>
                            </div>
                            @include('partials._error')
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" action="/admin/permissions/store" method="POST">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group">
                                        <label >权限名</label>
                                        <input type="text" class="form-control" name="name" autofocus value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>描述</label>
                                        <input type="text" class="form-control" name="description" value="{{ old('description') }}" required>
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