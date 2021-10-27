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
            <a class="app-menu__item @yield('active_dashboard')" href="{{url('/admin')}}"><i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item @yield('active_category')" href="{{url('admin/category/list')}}"><i class="app-menu__icon fa fa-bars"></i>
                <span class="app-menu__label">Category</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item @yield('active_coupon')" href="{{url('admin/coupon/list')}}"><i class="app-menu__icon fa fa-tag"></i>
                <span class="app-menu__label">Coupon</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item @yield('active_brand')" href="{{url('admin/brand/list')}}"><i class="app-menu__icon fa fa-window-maximize"></i>
                <span class="app-menu__label">Brand</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item @yield('active_color')"href="{{url('admin/color/list')}}"><i class="app-menu__icon fa fa-paint-brush"></i>
                <span class="app-menu__label">Color</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item @yield('active_size')" href="{{url('admin/size/list')}}"><i class="app-menu__icon fa fa-certificate"></i>
                <span class="app-menu__label">Size</span>
            </a>
        </li>

       
        <li class="treeview">
            <a class="app-menu__item @yield('active_product')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cubes"></i>
                <span class="app-menu__label">Product</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{url('admin/product/list')}}"><i class="icon fa fa-circle-o"></i>Products</a>
                </li>
                <li>
                    <a class="treeview-item" href="{{url('admin/item/list')}}"><i class="icon fa fa-circle-o"></i>Items</a>
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