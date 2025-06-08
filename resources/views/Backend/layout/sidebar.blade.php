<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Dashboard </a>
            </li>

            @can('normal-dashboard-users')
            <li><a><i class="fa fa-dropbox"></i> Stock Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('dashboard.product.index')}}">All Products</a></li>
                    <li><a href="{{route('dashboard.product.create')}}">Add Product</a></li>
                    <li><a href="{{route('dashboard.category.index')}}">All Categories</a></li>

                </ul>
            </li>

            <li><a><i class="fa fa-desktop"></i> Orders Management <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{route('dashboard.order.index')}}">All Orders</a></li>
                    {{-- <li><a href="{{route('dashboard.order.create')}}">Create Order</a>
            </li> --}}
        </ul>
        </li>

        <li><a><i class="fa fa-car"></i> Delivery Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('dashboard.delivery.index')}}">All Orders</a></li>

            </ul>
        </li>

        <li><a><i class="fa fa-users"></i> Staff Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('dashboard.user.index')}}">Internal Users</a></li>
                <li><a href="{{route('dashboard.user.create')}}">Add User</a></li>
                <li><a href="{{route('dashboard.user.profile',Auth::user())}}">My Profile</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-users"></i> All Customers <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

                <li><a href="{{route('dashboard.custuser.index')}}">All Customers</a></li>
                <li><a href="{{route('dashboard.user.create')}}">Add User</a></li>

            </ul>
        </li>
        <li><a><i class="fa fa-users"></i> Shipping Charges <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

                <li><a href="{{route('dashboard.shipping.index')}}">All Districts</a></li>
                <li><a href="{{route('dashboard.shipping.create')}}">Add Districts</a></li>

            </ul>
        </li>
        <li><a><i class="fa fa-users"></i> Coupon Codes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

                <li><a href="{{route('dashboard.coupon.index')}}">All Coupon</a></li>
                <li><a href="{{route('dashboard.coupon.create')}}">Add Coupon</a></li>

            </ul>
        </li>

        @endcan
        <li><a><i class="fa fa-users"></i> Suplier Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                @can('normal-dashboard-users')
                <li><a href="{{route('dashboard.suplier.index')}}">All Suplier</a></li>
                <li><a href="{{route('dashboard.user.create')}}">Add User</a></li>
                @endcan
                @can('supplier-users')
                <li><a href="{{route('dashboard.user.profile',Auth::user())}}">My Profile</a></li>
                @endcan



            </ul>
        </li>

        @can('normal-dashboard-users')
        <li><a><i class="fa fa-bar-chart-o"></i> Report Generation <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('dashboard.report.index')}}">All report</a></li>

            </ul>
        </li>

        <li><a><i class="fa fa-wechat"></i> Customer Portal <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('dashboard.ticket.index')}}">Portal</a></li>

            </ul>
        </li>
        <li><a><i class="fa fa-users"></i> Quotation Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                @can('normal-dashboard-users')
                <li><a href="{{route('dashboard.supplier.quotation.create')}}">Ask Quotation</a></li>
                <li><a href="{{route('dashboard.supplier.quotation.index')}}">All Quotation</a></li>
                @endcan

            </ul>
        </li>
        @endcan
        </ul>

    </div>


</div>