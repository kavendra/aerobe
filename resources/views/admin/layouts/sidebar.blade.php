@php
    $path = request()->path();
    $path = explode('/', $path);
    $module_path = $path[1];
@endphp
<div class="vertical-menu">
    <div class="navbar-brand-box">
        <a href="{{ config('app.url') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/uploads/websettings').'/'.$websettingInfo->site_logo }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/uploads/websettings').'/'.$websettingInfo->site_logo }}" alt="" height="28">
            </span>
        </a>

        <a href="{{ config('app.url') }}" class="logo logo-light">
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/uploads/websettings').'/'.$websettingInfo->site_logo }}" alt="" height="30">
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/uploads/websettings').'/'.$websettingInfo->site_logo }}" alt="" height="26">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Dashboard</li>
                <li class="@if($module_path == 'dashboard') mm-active @endif">
                    <a href="javascript: void(0);">
                        <i class="bx bx-home-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li class="@if($module_path == 'user'|| $module_path == 'user-role') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user-pin icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Users</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'user' || $module_path == 'user-role') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.user-role.index') }}" data-key="t-ecommerce">Roles</a></li>
                        <li><a href="{{ route('admin.user.index') }}" data-key="t-sales">Users</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'top-menu' || $module_path == 'main-menu' || $module_path == 'products-resources-menu' || $module_path == 'connect-with-us-menu' || $module_path == 'legal-information-menu') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-calendar-event icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Menus</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'top-menu' || $module_path == 'main-menu' || $module_path == 'products-resources-menu' || $module_path == 'connect-with-us-menu' || $module_path == 'legal-information-menu') mm-show @endif" aria-expanded="false">
                        <li><a href="javascript: void(0);" class="has-arrow" data-key="t-level-1.2">Header Menus</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('admin.top-menu.index') }}" data-key="t-level-2.1">Top Menu</a></li>
                                <li><a href="{{ route('admin.main-menu.index') }}" data-key="t-level-2.2">Main Menu</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0);" class="has-arrow" data-key="t-level-1.2">Footer Menus</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="{{ route('admin.products-resource-menu.index') }}" data-key="t-level-2.1">Products & Resources</a></li>
                                <li><a href="{{ route('admin.connect-with-us-menu.index') }}" data-key="t-level-2.2">Connect with us</a></li>
                                <li><a href="{{ route('admin.legal-information-menu.index') }}" data-key="t-level-2.2">Legal Information</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="@if($module_path == 'category') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-map-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Categories</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'category') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.category.index') }}" data-key="t-ecommerce">Categories</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'our-portfolio') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-check-square icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Our Portfolio</sspan>
                    </a>
                    <ul class="sub-menu @if($module_path == 'our-portfolio') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.our-portfolio.index') }}" data-key="t-ecommerce">Our Portfolio</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'solution') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-check-square icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Downloads</sspan>
                    </a>
                    <ul class="sub-menu @if($module_path == 'solution') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.download.index') }}" data-key="t-ecommerce">Downloads</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'solution') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-check-square icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Videos</sspan>
                    </a>
                    <ul class="sub-menu @if($module_path == 'solution') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.video.index') }}" data-key="t-ecommerce">Videos</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'solution') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-check-square icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Solutions</sspan>
                    </a>
                    <ul class="sub-menu @if($module_path == 'solution') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.solution.index') }}" data-key="t-ecommerce">Solutions</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'knowledge-hub') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-chat icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Knowledge Hubs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.knowledge-hub.index') }}" data-key="t-sales">Knowledge Hubs</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'aerobe-academy') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-chat icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Aerobe Academy</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.aerobe-academy.index') }}" data-key="t-sales">Aerobe Academy</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'news-and-event') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file-find icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">News & Events</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">                        
                        <li><a href="{{ route('admin.news-and-event.index') }}" data-key="t-sales">News & Events</a></li>
                        <li><a href="{{ route('admin.news-category.index') }}" data-key="t-ecommerce">News Categories</a></li>
                        <li><a href="{{ route('admin.tag.index') }}" data-key="t-ecommerce">News Tags</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'csr') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-chat icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">CSR</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.csr.index') }}" data-key="t-sales">CSR</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'shop') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-chat icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Shop</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.shop.index') }}" data-key="t-sales">Shop</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'prominent') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-check-square icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Prominents</sspan>
                    </a>
                    <ul class="sub-menu @if($module_path == 'prominent') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.prominent.index') }}" data-key="t-ecommerce">Prominent Customers</a></li>
                    </ul>
                </li>              

                <li class="@if($module_path == 'testimonial') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-store icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Testimonials</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'testimonial') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.testimonial.index') }}" data-key="t-ecommerce">Testimonials</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'country') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-table icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Countries</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'country') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.country.index') }}" data-key="t-ecommerce">Countries</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'business-vertical') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-table icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Business Verticals</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'business-vertical') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.business-vertical.index') }}" data-key="t-ecommerce">Business Verticals</a></li>
                    </ul>
                </li>

                <li class="@if($module_path == 'web-setting') mm-active @endif">
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-cube icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Web Settings</span>
                    </a>
                    <ul class="sub-menu @if($module_path == 'web-setting') mm-show @endif" aria-expanded="false">
                        <li><a href="{{ route('admin.web-setting.edit','1') }}">Web Settings</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user-pin icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">CMS Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.home-page.edit','1') }}" data-key="t-ecommerce">Home Page</a></li>

                        <li><a href="{{ route('admin.shop-page.edit','1') }}" data-key="t-ecommerce">Shop</a></li>
                        <li><a href="{{ route('admin.work-aerobe-page.edit','1') }}" data-key="t-ecommerce">Work @Aerobe</a></li>
                        <li><a href="{{ route('admin.csr-page.edit','1') }}" data-key="t-ecommerce">CSR</a></li>
                        <li><a href="{{ route('admin.contact-page.edit','1') }}" data-key="t-ecommerce">Contact Us</a></li>

                        <li><a href="{{ route('admin.our-portfolio-page.edit','1') }}" data-key="t-ecommerce">Our Portfolio</a></li>
                        <li><a href="{{ route('admin.solution-page.edit','1') }}" data-key="t-ecommerce">Solutions</a></li>
                        <li><a href="{{ route('admin.knowledge-hub-page.edit','1') }}" data-key="t-ecommerce">Knowledge Hub</a></li>
                        <li><a href="{{ route('admin.aerobe-academy-page.edit','1') }}" data-key="t-ecommerce">Aerobe Academy</a></li>
                        <li><a href="{{ route('admin.news-event-page.edit','1') }}" data-key="t-ecommerce">News & Events</a></li>
                        <li><a href="{{ route('admin.about-page.edit','1') }}" data-key="t-ecommerce">About Us</a></li>


                        <li><a href="{{ route('admin.terms-of-use-page.edit','1') }}" data-key="t-ecommerce">Terms Of Use</a></li>
                        
                       
                        <li><a href="{{ route('admin.cookie-preference-page.edit','1') }}" data-key="t-ecommerce">Cookie & Preferences</a></li>
                        <li><a href="{{ route('admin.privacy-policy-page.edit','1') }}" data-key="t-ecommerce">Privacy & Policy</a></li>
                        <li><a href="{{ route('admin.terms-of-use-page.edit','1') }}" data-key="t-ecommerce">Terms Of Use</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-file icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Contact Us Enquiries</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index" data-key="t-ecommerce">Enquiries</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-share-alt icon nav-icon"></i>
                        <span class="menu-item" data-key="t-dashboard">Newsletters</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="index" data-key="t-ecommerce">Newsletters</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>