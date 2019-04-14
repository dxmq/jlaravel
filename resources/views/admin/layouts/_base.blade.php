<!DOCTYPE html>
<html lang="zh">

@include('admin.layouts._head')

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    @include('admin.layouts._header')
    @include('admin.layouts._sidebar')
    <!-- Content Wrapper. Contains page content -->
        @yield('content')
    <!-- /.content-wrapper -->
    <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.8
            </div>
            <strong>Copyright &copy; 2018-2019 <a href="http://almsaeedstudio.com">Jlaravel</a>.</strong> All rights
            reserved.
        </footer>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('admin.layouts._footer_js')

@yield('js')
</body>
</html>
