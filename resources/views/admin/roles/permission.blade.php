@extends('admin.layouts._base')

@section('title', '分配权限')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-xs-6">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">权限列表</h3>
                    </div>
                @include('partials._error')
                <!-- /.box-header -->
                    <div class="box-body">
                        <form action="/admin/roles/{{$role->id}}/permission" method="POST">
                            @csrf
                            <div class="form-group">
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="permissions[]"
                                                   @if ($rolePermissions->contains($permission))
                                                   checked
                                                   @endif
                                                   value="{{$permission->id}}">
                                            {{$permission->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection