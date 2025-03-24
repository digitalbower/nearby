<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
        <a href="index.html" class="logo">
          <img
            src="{{ asset('images/NearByVoucherswide.svg') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="70" 
          />
        </a>
            <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
            </button>
            </div>
            <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a
                    data-bs-toggle="collapse"
                    href="#dashboard"
                    class="collapsed"
                    aria-expanded="false"
                    >
                    <i class="fas fa-home"></i>
                    <p>Dashboard</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                    <ul class="nav nav-collapse">
                        <li>
                        <a href="../demo1/index.html">
                            <span class="sub-item">Dashboard 1</span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                    <i class="fas fa-layer-group"></i>
                    <p>Header Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                        <li>
                        <a href="{{ route('admin.logos.index') }}">
                            <span class="sub-item">Logo Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{ route('admin.navigation.index') }}">
                            <span class="sub-item">Header Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/gridsystem.html">
                            <span class="sub-item">Navigation Menu Items Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/panels.html">
                            <span class="sub-item">PanLocation Scope Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/notifications.html">
                            <span class="sub-item">Footer Management</span>
                        </a>
                        </li>
                        
                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                    <i class="fas fa-layer-group"></i>
                    <p>Home Page Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                        <li>
                        <a href="{{ route('admin.logos.index') }}">
                            <span class="sub-item">Hero Carousel Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/buttons.html">
                            <span class="sub-item">Category Section Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/gridsystem.html">
                            <span class="sub-item">Quick Cards Section Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/panels.html">
                            <span class="sub-item">Trending Section Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/notifications.html">
                            <span class="sub-item">Popular Section Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="components/notifications.html">
                            <span class="sub-item">Support Section Management</span>
                        </a>
                        </li>
                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Product Section</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.products.company_terms.index')}}">
                                <span class="sub-item">Company Terms</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.vendors.index')}}">
                                <span class="sub-item">Vendors</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.index')}}">
                                <span class="sub-item">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.vendor_terms.index')}}">
                                <span class="sub-item">Vendor Terms</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.product_variants.index')}}">
                                <span class="sub-item">Product Variants</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>