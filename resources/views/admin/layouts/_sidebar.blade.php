<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/image/user.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @can('system')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-user"></i> <span>系统管理</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ isActiveURL('/admin/permissions') }}"><a href="/admin/permissions"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                    <li class="{{ isActiveURL('/admin/users') }}"><a href="/admin/users"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                    <li class="{{ isActiveURL('/admin/roles') }}"><a href="/admin/roles"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                </ul>
            </li>
            @endcan
            @can('posts')
            <li class="active treeview">
                <a href="/admin/posts">
                    <i class="fa fa-book"></i> <span>文章管理</span>
                </a>
            </li>
            @endcan
            @can('topics')
            <li class="active treeview">
                <a href="/admin/topics">
                    <i class="fa fa-bookmark"></i> <span>专题管理</span>
                </a>
            </li>
            @endcan
            @can('notices')
            <li class="active treeview">
                <a href="/admin/notices">
                    <i class="fa fa-bell"></i> <span>通知管理</span>
                </a>
            </li>
            @endcan
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
