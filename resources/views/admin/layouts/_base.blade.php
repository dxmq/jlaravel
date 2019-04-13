<!DOCTYPE html>
<html lang="zh">

@include('admin.layouts._head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.layouts._header')
    @include('admin.layouts._sidebar')
    <!-- Content Wrapper. Contains page content -->
        @yield('content')
    <!-- /.content-wrapper -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.layouts._footer_js')

@yield('js')
</body>
</html>
