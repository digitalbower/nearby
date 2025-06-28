<style>
.sidebar[data-background-color=dark] .nav>.nav-item a > p {
    width: 162px;
}

.sidebar[data-background-color=dark] .nav>.nav-item a span.caret {
    position: absolute;
    right: 8px;
}

.sidebar[data-background-color=dark] .nav>.nav-item a>svg {
    max-width: 25px;
}
</style>
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
               
                   
                     @if(auth()->guard('admin')->user()->hasPermission('view_products') || auth()->guard('admin')->user()->hasPermission('view_productvariants'))
                <li class="nav-item active">
                    <a data-bs-toggle="collapse" href="#sidebarLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                     <svg class="me-3" width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5391 8.67606V15.5524C20.5512 15.8014 20.4327 16.0559 20.1845 16.196L13.0531 20.2197C12.4152 20.5797 11.6357 20.5807 10.9969 20.2223L3.82016 16.1968C3.5659 16.0542 3.44711 15.7917 3.46487 15.5374V8.69449C3.44687 8.44374 3.56156 8.18452 3.80996 8.0397L10.9664 3.86752C11.6207 3.48606 12.4299 3.4871 13.0832 3.87025L20.1945 8.04063C20.4357 8.18211 20.5503 8.43167 20.5391 8.67606Z" stroke="#b9babf"/><path d="M3.82019 9.25312C3.3487 8.98865 3.34307 8.31197 3.81009 8.03969L10.9665 3.86751C11.6209 3.48605 12.43 3.48709 13.0834 3.87024L20.1946 8.04062C20.6596 8.31329 20.6539 8.98739 20.1845 9.25227L13.0531 13.276C12.4152 13.636 11.6357 13.637 10.9969 13.2786L3.82019 9.25312Z" stroke="#b9babf"/></svg>
                    <p>Product Section</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                    <ul class="nav nav-collapse">
                        
                        @if(auth()->guard('admin')->user()->hasPermission('view_products'))
                        <li>
                            <a href="{{route('admin.products.index')}}">
                                <span class="sub-item">Products</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_productvariants'))
                        <li>
                            <a href="{{route('admin.products.product_variants.index')}}">
                                <span class="sub-item">Product Variants</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    </div>
                </li>
                @endif 
                    
               
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @if(auth()->guard('admin')->user()->hasPermission('view_logos') || auth()->guard('admin')->user()->hasPermission('view_navigations') || auth()->guard('admin')->user()->hasPermission('view_emirates') || auth()->guard('admin')->user()->hasPermission('view_footer'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                    <!-- <i class="fas fa-layer-group"></i> -->
                     <svg class="me-3" width="21px" height="100%" viewBox="0 -5.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <title>header [#b9babf]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-99.000000, -165.000000)" fill="#b9babf"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M46.15,5 C47.88985,5 49.3,6.343 49.3,8 C49.3,9.657 47.88985,11 46.15,11 C44.41015,11 43,9.657 43,8 C43,6.343 44.41015,5 46.15,5 L46.15,5 Z M46.15,7 C45.57145,7 45.1,7.449 45.1,8 C45.1,8.551 45.57145,9 46.15,9 C46.72855,9 47.2,8.551 47.2,8 C47.2,7.449 46.72855,7 46.15,7 L46.15,7 Z M43,15 L64,15 L64,13 L43,13 L43,15 Z M51.4,7 L64,7 L64,5 L51.4,5 L51.4,7 Z M51.4,11 L64,11 L64,9 L51.4,9 L51.4,11 Z" id="header-[#b9babf]"></path></g></g></g></g></svg>
                    <p>Header Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('view_logos'))
                        <li>
                        <a href="{{ route('admin.logos.index') }}">
                            <span class="sub-item">Logo Management</span>
                        </a>
                        </li>
                       @endif
                       @if(auth()->guard('admin')->user()->hasPermission('view_navigations'))
                        <li>
                        <a href="{{ route('admin.navigation.index') }}">
                            <span class="sub-item">Navigation Menu Items Management</span>
                        </a>
                        </li>

                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_emirates'))
                        <li>
                        <a href="{{ route('admin.locations.index') }}">
                            <span class="sub-item">Location Scope Management</span>
                        </a>
                        </li> 
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_footer'))
                        <li>
                        <a href="{{ route('admin.footer.index') }}">
                            <span class="sub-item">Footer Management</span>
                        </a>
                        </li>
                        @endif
                    </ul>
                    </div>
                </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermission('view_category') || auth()->guard('admin')->user()->hasPermission('view_subcategory') || auth()->guard('admin')->user()->hasPermission('view_category_unit'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#home">
                    <!-- <i class="fas fa-layer-group"></i> -->
                     <svg class="me-3" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="18px" height="18px" fill="#b9babf"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#b9babf;} </style> <g> <path class="st0" d="M0,48v416c0,26.508,21.492,48,48,48h416c26.508,0,48-21.492,48-48V48c0-26.508-21.492-48-48-48H48 C21.492,0,0,21.492,0,48z M86.336,54c0,10.492-8.508,19-19,19c-10.492,0-19-8.508-19-19s8.508-19,19-19 C77.828,35,86.336,43.508,86.336,54z M156.836,54c0,10.492-8.508,19-19,19c-10.492,0-19-8.508-19-19s8.508-19,19-19 C148.328,35,156.836,43.508,156.836,54z M227.336,54c0,10.492-8.508,19-19,19c-10.492,0-19-8.508-19-19s8.508-19,19-19 C218.828,35,227.336,43.508,227.336,54z M40,104h432v360c0,4.406-3.586,8-8,8H48c-4.414,0-8-3.594-8-8V104z"/> <rect x="264" y="192" class="st0" width="152" height="32"/> <rect x="88" y="352" class="st0" width="328" height="32"/> <rect x="88" y="192" class="st0" width="120" height="120"/> <polygon class="st0" points="282.958,304 264,304 264,272 416,272 416,304 298.958,304 "/></g></g></svg>
                    <p>Home Page Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="home">
                    <ul class="nav nav-collapse">
                       @if(auth()->guard('admin')->user()->hasPermission('view_category'))
                        <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <span class="sub-item">Category Section Management</span>
                        </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_subcategory'))
                        <li>
                        <a href="{{ route('admin.subcategories.index') }}">
                            <span class="sub-item">SubCategory Section Management</span>
                        </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_category_unit'))
                        <li>
                        <a href="{{ route('admin.category_unit.index') }}">
                            <span class="sub-item">Category UnitTypes Section Management</span>
                        </a>
                        </li>
                        @endif
                      
                    </ul>
                    </div>
                </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermission('view_nbvterms') || auth()->guard('admin')->user()->hasPermission('view_vendor') || auth()->guard('admin')->user()->hasPermission('view_vendorterms') || auth()->guard('admin')->user()->hasPermission('view_salesperson') || auth()->guard('admin')->user()->hasPermission('view_promo') || auth()->guard('admin')->user()->hasPermission('view_producttype'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#contractLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                     <svg class="me-3" fill="#b9babf" height="22px" width="22px" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 512 512">
                        <g>
                            <g>
                            <path d="m289.7,76.1l55.3,47.8h-55.3v-47.8zm106.9,340.7c-11.3-5.68434e-14-20.5,9.1-20.5,20.4v23h-304.2v-408.4h176.9v92.4c0,11.3 9.2,20.4 20.5,20.4h106.9v122.4c0,11.3 9.2,20.4 20.5,20.4 11.3,0 20.5-9.1 20.5-20.4v-145.6c0-5.9-2.6-11.6-7.1-15.4l-127.4-110c-3.7-3.2-8.5-5-13.4-5h-217.8c-11.3,0-20.5,9.1-20.5,20.4v449.2c0,11.3 9.2,20.4 20.5,20.4h345.2c11.3,0 20.5-9.1 20.5-20.4v-43.4c-0.1-11.3-9.3-20.4-20.6-20.4z"/>
                            <path d="m305.7,198.9h-162c-11.3,0-20.5,9.1-20.5,20.4s9.2,20.4 20.5,20.4h162.1c11.3,0 20.5-9.1 20.5-20.4s-9.3-20.4-20.6-20.4z"/>
                            <path d="m305.7,299.4h-162c-11.3,0-20.5,9.1-20.5,20.4 0,11.3 9.2,20.4 20.5,20.4h162.1c11.3,0 20.5-9.1 20.5-20.4-0.1-11.2-9.3-20.4-20.6-20.4z"/>
                            <path d="m480.9,317.5c-1-11.2-11-19.5-22.2-18.5-46.2,4.1-90.1,54.6-112.7,85.3l-13.3-15.1c-7.5-8.5-20.4-9.3-28.9-1.8-8.5,7.5-9.3,20.4-1.8,28.8l30.7,34.8c12,11.9 25.2,9.7 32.7-2.7 13.4-22.1 60.7-85.4 96.9-88.6 11.3-1.1 19.6-11 18.6-22.2z"/>
                            </g>
                        </g>
                    </svg>
                    <p>Contracts</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="contractLayouts">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('view_nbvterms'))

                        <li>
                            <a href="{{route('admin.products.nbv_terms.index')}}">
                                <span class="sub-item">NbvTerms</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_vendor'))

                        <li>
                            <a href="{{route('admin.products.vendors.index')}}">
                                <span class="sub-item">Vendors</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_vendorterms'))
                        <li>
                            <a href="{{route('admin.products.vendor_terms.index')}}">
                                <span class="sub-item">Vendor Terms</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_salesperson'))
                        <li>
                            <a href="{{route('admin.products.sales_person.index')}}">
                                <span class="sub-item">Sales Person</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_promo'))
                         <li>
                            <a href="{{route('admin.products.promos.index')}}">
                                <span class="sub-item">Promocodes</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_producttype'))
                        <li>
                            <a href="{{route('admin.products.product_types.index')}}">
                                <span class="sub-item">Product Types</span>
                            </a>
                         </li>
                        @endif

                    </ul>
                    </div>
                </li>
                @endif
               
                @if(auth()->guard('admin')->user()->hasPermission('view_report') || auth()->guard('admin')->user()->hasPermission('view_commission'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#reportLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                     <svg class="me-3" width="22px" height="100%" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_901_1141)">
                        <path d="M12 13H15M12 16H20M12 20H20M12 24H20M21 7V2C21 1.447 20.553 1 20 1H2C1.447 1 1 1.447 1 2V24C1 24 1 25 2 25H3M26 27H30C30.553 27 31 26.553 31 26V4C31 3.447 30.553 3 30 3H24M26 30C26 30.553 25.553 31 25 31H7C6.447 31 6 30.553 6 30V8C6 7.447 6.447 7 7 7H25C25.553 7 26 7.447 26 8V30Z" stroke="#b9babf" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_901_1141">
                        <rect width="32" height="32" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <p>Reports</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="reportLayouts">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('view_report'))

                        <li>
                            <a href="{{route('admin.reports.reviews.index')}}">
                                <span class="sub-item">Review Report</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_commission'))
                        <li>
                            <a href="{{route('admin.commission.commission')}}">
                                <span class="sub-item">Commission Listing</span>
                            </a>
                        </li> 
                        @endif
                          @if(auth()->guard('admin')->user()->hasPermission('transfer_history'))
                        <li>
                            <a href="{{route('admin.transactions.index')}}">
                                <span class="sub-item">Transfer History</span>
                            </a>
                        </li> 
                        @endif
                    </ul>
                    </div>
                </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermission('view_seo'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#seoLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                     <svg class="me-3"height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                            viewBox="0 0 512 512"  xml:space="preserve">
                        <style type="text/css">
                            .st0{fill:#b9babf;}
                        </style>
                        <g>
                            <path class="st0" d="M61.936,345.186h388.128c14.81,0,26.822-12.019,26.822-26.828V89.967c0-14.797-12.012-26.81-26.822-26.81
                                H61.936c-14.81,0-26.81,12.012-26.81,26.81v228.39C35.127,333.167,47.126,345.186,61.936,345.186z M76.126,99.189h359.749v203.649
                                H76.126V99.189z"/>
                            <path class="st0" d="M508.025,419.609l-47.841-42.468c-3.076-2.722-7.5-4.266-12.171-4.266H63.98
                                c-4.664,0-9.095,1.544-12.164,4.266L3.968,419.609C1.405,421.874,0,424.792,0,427.811v14.797c0,3.456,3.608,6.234,8.064,6.234
                                h495.874c4.468,0,8.063-2.778,8.063-6.234v-14.797C512,424.792,510.588,421.874,508.025,419.609z M201.137,424.621l13.848-18.721
                                h87.733l13.829,18.721H201.137z"/>
                            <path class="st0" d="M189.143,200.96l-4.442-0.633c-11.374-1.588-15.449-5.55-15.449-11.354c0-6.545,4.69-11.241,13.221-11.241
                                c7.038,0,13.342,2.095,20.139,6.544l1.728-0.373l5.936-9.146l-0.253-1.721c-6.671-5.069-16.683-8.392-27.177-8.392
                                c-17.297,0-28.417,10.113-28.417,25.322c0,13.956,9.139,21.74,25.322,23.962l4.456,0.62c11.608,1.601,15.31,5.55,15.31,11.607
                                c0,7.032-5.804,12.108-15.81,12.108c-9.392,0-17.423-4.57-22.854-8.886l-1.728,0.114l-7.664,8.899l0.246,1.861
                                c6.551,6.17,18.538,11.101,30.886,11.101c20.892,0,31.638-11.101,31.638-26.05C214.232,210.833,205.327,203.168,189.143,200.96z"/>
                            <polygon class="st0" points="229.928,165.986 228.693,167.219 228.693,248.776 229.928,250.01 282.554,250.01 283.794,248.776 
                                283.794,238.149 282.554,236.915 244.016,236.915 243.275,236.162 243.275,214.915 244.016,214.175 276.51,214.175 277.75,212.94 
                                277.75,202.314 276.51,201.08 244.016,201.08 243.275,200.326 243.275,179.827 244.016,179.087 282.554,179.087 283.794,177.846 
                                283.794,167.219 282.554,165.986 	"/>
                            <path class="st0" d="M328.54,164.644c-14.462,0-25.329,6.905-29.658,20.246c-1.728,5.19-2.228,9.886-2.228,23.107
                                c0,13.222,0.5,17.918,2.228,23.108c4.329,13.342,15.196,20.246,29.658,20.246c14.576,0,25.436-6.905,29.766-20.246
                                c1.734-5.19,2.234-9.886,2.234-23.108c0-13.221-0.5-17.917-2.234-23.107C353.977,171.549,343.116,164.644,328.54,164.644z
                                M344.224,227.263c-2.348,6.81-7.284,11-15.683,11c-8.284,0-13.221-4.19-15.576-11c-0.981-3.089-1.481-7.412-1.481-19.266
                                c0-11.987,0.5-16.177,1.481-19.278c2.354-6.797,7.291-10.987,15.576-10.987c8.399,0,13.335,4.19,15.683,10.987
                                c0.981,3.101,1.494,7.291,1.494,19.278C345.718,219.852,345.205,224.174,344.224,227.263z"/>
                        </g>
                    </svg>
                    <p>Seo Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="seoLayouts">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('view_seo'))
                        <li>
                            <a href="{{route('admin.seo.index')}}">
                                <span class="sub-item">Main Pages</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    </div>
                </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermission('view_adminusers') || auth()->guard('admin')->user()->hasPermission('view_vendor_credential'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#adminLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                     <svg class="me-3" width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <path d="M15 7C15 8.65685 13.6569 10 12 10C10.3431 10 9 8.65685 9 7C9 5.34315 10.3431 4 12 4C13.6569 4 15 5.34315 15 7Z" stroke="#b9babf" stroke-width="2"/> <path d="M5 19.5C5 15.9101 7.91015 13 11.5 13H12.5C16.0899 13 19 15.9101 19 19.5V20C19 20.5523 18.5523 21 18 21H6C5.44772 21 5 20.5523 5 20V19.5Z" stroke="#b9babf" stroke-width="2"/> </g></svg>
                    <p>Admin User Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="adminLayouts">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('view_adminusers'))
                        <li>
                            <a href="{{route('admin.users.index')}}">
                                <span class="sub-item">Admin Users</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_vendor_credential'))
                        <li>
                            <a href="{{route('admin.vendors.index')}}">
                                <span class="sub-item">Vendor Credentials</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    </div>
                </li>
                @endif
                @if(auth()->guard('admin')->user()->hasPermission('view_blog_management'))
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#blogLayouts">
                    <!-- <i class="fas fa-th-list"></i> -->
                      <svg class="me-3" width="30px" height="30px" viewBox="0 0 24 24" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12 20H21" stroke="#b9babf" stroke-width="2" stroke-linecap="round" />
            <path
                d="M16.5 3.5C16.7652 3.23478 17.1111 3.08748 17.4721 3.08748C17.833 3.08748 18.1789 3.23478 18.4441 3.5L20.5 5.55586C20.7652 5.82107 20.9125 6.16695 20.9125 6.5279C20.9125 6.88884 20.7652 7.23472 20.5 7.5L8 20L3 21L4 16L16.5 3.5Z"
                stroke="#b9babf" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
                    <p>Blog Management</p>
                    <span class="caret"></span>
                    </a>
                    <div class="collapse" id="blogLayouts">
                    <ul class="nav nav-collapse">
                        @if(auth()->guard('admin')->user()->hasPermission('crete_blog_header'))
                         <li>
                            <a href="{{route('admin.blog.blognavigation.index')}}">
                                <span class="sub-item">Crete Blog Header</span>
                            </a>
                        </li>
                         @endif
                         @if(auth()->guard('admin')->user()->hasPermission('crete_blog_footer'))
                        <li>
                            <a href="{{route('admin.blog.footer.index')}}">
                                <span class="sub-item">Crete Blog Footer</span>
                            </a>
                        </li>
                         @endif
                         @if(auth()->guard('admin')->user()->hasPermission('crete_featured_item'))
                        <li>
                            <a href="{{route('admin.blog.featured-items.index')}}">
                                <span class="sub-item">Crete Featured Item</span>
                            </a>
                        </li>
                         @endif
                         @if(auth()->guard('admin')->user()->hasPermission('crete_blog'))
                        <li>
                            <a href="{{route('admin.blog.blogs.index')}}">
                                <span class="sub-item">Crete Blog</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->guard('admin')->user()->hasPermission('view_blog_details'))
                         <li>
                            <a href="{{route('admin.blog.blog-details.index')}}">
                                <span class="sub-item">Crete Blog Details</span>
                            </a>
                        </li>
                       @endif
                         
                    </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>