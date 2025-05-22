@php
    $admin = Auth::guard('admin')->user();
    $role = $admin?->user_role_id;
@endphp
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
                @if(in_array($role, [1,2]))
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
                            <span class="sub-item">Navigation Menu Items Management</span>
                        </a>
                        </li>
                        <li>
                        <a href="{{ route('admin.locations.index') }}">
                            <span class="sub-item">Location Scope Management</span>
                        </a>
                        </li> 
                        <li>
                        <a href="{{ route('admin.footer.index') }}">
                            <span class="sub-item">Footer Management</span>
                        </a>
                        </li>
                        
                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#home">
                    <i class="fas fa-layer-group"></i>
                    <p>Home Page Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="home">
                    <ul class="nav nav-collapse">
                       
                        <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <span class="sub-item">Category Section Management</span>
                        </a>
                        </li>

                        <li>
                        <a href="{{ route('admin.subcategories.index') }}">
                            <span class="sub-item">SubCategory Section Management</span>
                        </a>
                        </li>

                        <li>
                        <a href="{{ route('admin.category_unit.index') }}">
                            <span class="sub-item">Category UnitTypes Section Management</span>
                        </a>
                        </li>

                      
                    </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#contractLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Contracts</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="contractLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.products.nbv_terms.index')}}">
                                <span class="sub-item">NbvTerms</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.vendors.index')}}">
                                <span class="sub-item">Vendors</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.vendor_terms.index')}}">
                                <span class="sub-item">Vendor Terms</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.sales_person.index')}}">
                                <span class="sub-item">Sales Person</span>
                            </a>
                        </li>
                         <li>
                            <a href="{{route('admin.products.promos.index')}}">
                                <span class="sub-item">Promocodes</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
                @endif
                @if(in_array($role, [1,2,3]))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Product Section</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                    <ul class="nav nav-collapse">
                        
                      
                        <li>
                            <a href="{{route('admin.products.index')}}">
                                <span class="sub-item">Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.product_types.index')}}">
                                <span class="sub-item">Product Types</span>
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
                @endif
                @if(in_array($role, [1,2]))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#reportLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Reports</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="reportLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.reports.reviews.index')}}">
                                <span class="sub-item">Review Report</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.commission.commission')}}">
                                <span class="sub-item">Commission Listing</span>
                            </a>
                        </li> 
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#seoLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Seo Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="seoLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.seo.index')}}">
                                <span class="sub-item">Main Pages</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#adminLayouts">
                    <i class="fas fa-th-list"></i>
                    <p>Admin User Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="adminLayouts">
                    <ul class="nav nav-collapse">
                        <li>
                            <a href="{{route('admin.users.index')}}">
                                <span class="sub-item">Admin Users</span>
                            </a>
                        </li>
                    </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>