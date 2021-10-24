<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item @yield('dashboard_active')" href="{{url('/admin')}}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_category')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-bars"></i>
                <span class="app-menu__label">Category</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/category/add')}}"><i class="icon fa fa-circle-o"></i>Add Category</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/category/list')}}"><i class="icon fa fa-circle-o"></i>Manage Category</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_coupon')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-tag"></i>
                <span class="app-menu__label">Coupon</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/coupon/add')}}"><i class="icon fa fa-circle-o"></i>Add Coupon</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/coupon/list')}}"><i class="icon fa fa-circle-o"></i>Manage Coupon</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_size')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-window-maximize"></i>
                <span class="app-menu__label">Size</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/size/add')}}"><i class="icon fa fa-circle-o"></i>Add Size</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/size/list')}}"><i class="icon fa fa-circle-o"></i>Manage Size</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_color')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-paint-brush"></i>
                <span class="app-menu__label">Color</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/color/add')}}"><i class="icon fa fa-circle-o"></i>Add Color</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/color/list')}}"><i class="icon fa fa-circle-o"></i>Manage Color</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_brand')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-certificate"></i>
                <span class="app-menu__label">Brand</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/brand/add')}}"><i class="icon fa fa-circle-o"></i>Add Brand</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/brand/list')}}"><i class="icon fa fa-circle-o"></i>Manage Brand</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item @yield('active_product')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cubes"></i>
                <span class="app-menu__label">Product</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/product/add')}}"><i class="icon fa fa-circle-o"></i>Add Product</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/product/list')}}"><i class="icon fa fa-circle-o"></i>Manage Product</a>
                </li>
            </ul>
        </li>
        
        <li>
            <a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>