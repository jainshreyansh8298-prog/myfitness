<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admins.dashboard') }}"
        style="margin-top: 30px;margin-bottom:20px">
        <div class="mx-3 sidebar-brand-text ttn d-flex align-items-center justify-content-center">
            <div class="center d-flex align-items-center justify-content-center">
                <img width="90%" class="py-2 my-2" src="{{ asset(config('app.logo')) }}" alt="">
            </div>
            <!-- <div class="right">
               {{ env('APP_NAME') }}
            </div> -->
        </div>
    </a>

    <!-- Divider -->
    <hr class="my-0 sidebar-divider">


    <!-- Dashboard -->
    <li class="nav-item {{ Route::is('admins.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span> {{ __('Dashboard') }} </span>
        </a>
    </li>

    <!-- Site Settings & Design Controls -->
    <li class="nav-item {{ Route::is('admins.settings.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.settings.index') }}">
            <i class="fas fa-cog text-warning"></i>
            <span class="font-weight-bold text-warning"> {{ __('Site Settings & Design') }} </span>
        </a>
    </li>

    <!-- Testimonials CMS -->
    <li class="nav-item {{ Route::is('admins.testimonials.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.testimonials.index') }}">
            <i class="fas fa-star text-info"></i>
            <span> {{ __('Testimonials') }} </span>
        </a>
    </li>

    <!-- Discount Leads -->
    <li class="nav-item {{ Route::is('admins.discount-leads.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.discount-leads.index') }}">
            <i class="fas fa-gift text-success"></i>
            <span> {{ __('10% Discount Leads') }} </span>
        </a>
    </li>

    <!-- FAQs CMS -->
    <li class="nav-item {{ Route::is('admins.faqs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.faqs.index') }}">
            <i class="fas fa-question-circle text-info"></i>
            <span> {{ __('FAQs') }} </span>
        </a>
    </li>

    <!-- Pages CMS -->
    <li class="nav-item {{ Route::is('admins.pages.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admins.pages.index') }}">
            <i class="fas fa-file-alt text-info"></i>
            <span> {{ __('Legal Pages') }} </span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('admins.categories.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.categories.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecategories"
            aria-expanded="true" aria-controls="collapsecategories">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Categories Section') }}</span>
        </a>
        <div id="collapsecategories" class="collapse {{ Route::is('admins.categories.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.categories.index') }}">{{ __('All Categories') }}</a>
                <a class="collapse-item"
                    href="{{ route('admins.categories.create') }}">{{ __('Create New Category') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Route::is('admins.services.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.services.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseservices"
            aria-expanded="true" aria-controls="collapseservices">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Services Section') }}</span>
        </a>
        <div id="collapseservices" class="collapse {{ Route::is('admins.services.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.services.index') }}">{{ __('All Services') }}</a>
                <a class="collapse-item"
                    href="{{ route('admins.services.create') }}">{{ __('Create New Service') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Route::is('admins.areas.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.areas.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseareas"
            aria-expanded="true" aria-controls="collapseareas">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Areas Section') }}</span>
        </a>
        <div id="collapseareas" class="collapse {{ Route::is('admins.areas.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.areas.index') }}">{{ __('All Areas') }}</a>
                <a class="collapse-item" href="{{ route('admins.areas.create') }}">{{ __('Create New Area') }}</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{ Route::is('admins.blogs.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.blogs.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseblogs"
            aria-expanded="true" aria-controls="collapseblogs">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Blogs Section') }}</span>
        </a>
        <div id="collapseblogs" class="collapse {{ Route::is('admins.blogs.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.blogs.index') }}">{{ __('All Blogs') }}</a>
                <a class="collapse-item" href="{{ route('admins.blogs.create') }}">{{ __('Create New Blog') }}</a>
            </div>
        </div>
    </li>

    <li class="li nav-item {{ Route::is('admins.forms.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.forms.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.forms.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span> Contact Forms </span>
        </a>
    </li>
    <li class="li nav-item {{ Route::is('admins.orders.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.orders.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.orders.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span> Orders</span>
        </a>
    </li>

    <li class="li nav-item {{ Route::is('admins.users.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.users.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.users.index') }}">
            <i class="fas fa-users"></i>
            <span> {{ __('Registered Users') }} </span>
        </a>
    </li>


    {{-- <li class="nav-item {{ Route::is('admins.events.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.events.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEvents"
            aria-expanded="true" aria-controls="collapseEvents">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Events Section') }}</span>
        </a>
        <div id="collapseEvents" class="collapse {{ Route::is('admins.events.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item"
                    href="{{ route('admins.events.index', ['par' => 'a']) }}">{{ __('All Events') }}</a>
                <a class="collapse-item"
                    href="{{ route('admins.events.index', ['par' => 'c']) }}">{{ __('Upcoming Events') }}</a>
                <a class="collapse-item"
                    href="{{ route('admins.events.index', ['par' => 'p']) }}">{{ __('Past Events') }}</a>
                <a class="collapse-item" href="{{ route('admins.events.create') }}">{{ __('Create An Event') }}</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item {{ Route::is('admins.bookings.*') ? 'active' : '' }}"
        @if (Route::is('admins.bookings.*')) style="background-color: darkslategrey;" @endif>
        <a class="nav-link {{ Route::is('admins.bookings.*') ? '' : 'collapsed' }}" href="#"
            data-toggle="collapse" data-target="#collapseBookings"
            aria-expanded="{{ Route::is('admins.bookings.*') ? 'true' : 'false' }}" aria-controls="collapseBookings">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Bookings Section') }}</span>
        </a>
        <div id="collapseBookings" class="collapse {{ Route::is('admins.bookings.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item"
                    href="{{ route('admins.bookings.competitions') }}">{{ __('Competitions') }}</a>
                <a class="collapse-item" href="{{ route('admins.bookings.events') }}">{{ __('Events') }}</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item {{ Route::is('admins.reports.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.reports.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsereports"
            aria-expanded="true" aria-controls="collapsereports">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Reports Section') }}</span>
        </a>
        <div id="collapsereports" class="collapse {{ Route::is('admins.reports.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.reports.unread') }}">{{ __('UnRead Reports') }}</a>
                <a class="collapse-item" href="{{ route('admins.reports.read') }}">{{ __('Read Reports') }}</a>
            </div>
        </div>
    </li> --}}

    {{-- <li class="nav-item {{ Route::is('admins.users.*') ? 'active' : '' }}"
        style="{{ Route::is('admins.users.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers"
            aria-expanded="true" aria-controls="collapseusers">
            <i class="far fa-caret-square-right"></i>
            <span>{{ __('Users Section') }}</span>
        </a>
        <div id="collapseusers" class="collapse {{ Route::is('admins.users.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.users.index') }}">{{ __('All Users') }}</a>
                <a class="collapse-item" href="{{ route('admins.users.create') }}">{{ __('Create New Users') }}</a>
            </div>
        </div>
    </li> --}}
    {{-- @role('admin')
        <li class="nav-item {{ Route::is('admins.admins.*') ? 'active' : '' }}"
            style="{{ Route::is('admins.admins.*') ? 'background-color: darkslategrey;' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseadmins"
                aria-expanded="true" aria-controls="collapseadmins">
                <i class="far fa-caret-square-right"></i>
                <span>{{ __('Admins Section') }}</span>
            </a>
            <div id="collapseadmins" class="collapse {{ Route::is('admins.admins.*') ? 'show' : '' }}"
                aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="py-2 bg-white rounded collapse-inner">
                    <a class="collapse-item" href="{{ route('admins.admins.index') }}">{{ __('All Admins') }}</a>
                    <a class="collapse-item" href="{{ route('admins.admins.create') }}">{{ __('Create New Admin') }}</a>
                </div>
            </div>
        </li>
    @endrole --}}


    {{-- <li class="li nav-item {{ Route::is('admins.countries.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.countries.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.countries.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span> COUNTRIES </span>
        </a>
    </li> --}}

    {{-- <li class="li nav-item {{ Route::is('admins.cities.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.cities.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.cities.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span> CITIES </span>
        </a>
    </li> --}}

    {{-- <li class="li nav-item {{ Route::is('admins.copouns.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.copouns.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('admins.copouns.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span> COUPONS </span>
        </a>
    </li>  --}}

    {{-- <li class="nav-item {{ Route::is('admins.travels.*') ? 'active' : '' }} "
        style="{{ Route::is('admins.travels.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseListing" aria-expanded="true" aria-controls="collapseListing">
            <i class="far fa-caret-square-right"></i>
            <span>Travels Section</span>
        </a>
        <div id="collapseListing"
            class="collapse {{ Route::is('admins.travels.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('admins.travels.index',['par'=>'b'])  }}">Upcoming Travels</a>
                <a class="collapse-item" href="{{ route('admins.travels.index',['par'=>'c']) }}">Completed Travels</a>
                <a class="collapse-item" href="{{ route('admins.travels.index',['par'=>'a'])  }}">All Travels</a>
            </div>
        </div>
    </li> --}}


    {{-- <li class="nav-item {{ Route::is('users.*') ? 'active' : '' }} "
        style="{{ Route::is('users.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseListing" aria-expanded="true" aria-controls="collapseListing">
            <i class="far fa-caret-square-right"></i>
            <span>Users Section</span>
        </a>
        <div id="collapseListing"
            class="collapse {{ Route::is('users.*') ? 'show' : '' }}"
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 bg-white rounded collapse-inner">
                <a class="collapse-item" href="{{ route('users.index',['par'=>'a'])  }}">Admins</a>
                <a class="collapse-item" href="{{ route('users.index',['par'=>'c']) }}">Crane Owners</a>
                <a class="collapse-item" href="{{ route('users.index',['par'=>'u'])  }}">Users</a>
                <a class="collapse-item" href="{{ route('users.create')  }}">Create A User</a>
            </div>
        </div>
    </li>
    <li
        class="nav-item {{ Route::is('users.*') ? 'active' : '' }} "
        style="{{ Route::is('users.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('users.index')}}">
            <i class="far fa-caret-square-right"></i>
            <span>Users</span>
        </a>
    </li>

    <li class="nav-item {{ Route::is('bookings.*') ? 'active' : '' }}"
        style="{{ Route::is('bookings.*') ? 'background-color: darkslategrey;' : '' }}">
        <a class="nav-link" href="{{ route('bookings.index') }}">
            <i class="far fa-caret-square-right"></i>
            <span>Latest Bookings</span>
        </a>
    </li> --}}



    <!-- Dynamic Pages -->
    {{-- <li class="nav-item {{ $route == 'admin_dynamic_page_view'||$route == 'admin_dynamic_page_create'||$route == 'admin_dynamic_page_edit' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin_dynamic_page_view') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ DYNAMIC_PAGES }}</span>
    </a>
    </li> --}}


    {{-- <!-- Purchase History -->
    <!--<li class="nav-item {{ $route == 'admin_purchase_history_view' || $route == 'admin_purchase_history_detail' || $route == 'admin_purchase_history_invoice' ? 'active' : '' }}">-->
    <!--    <a class="nav-link" href="{{ route('admin_purchase_history_view') }}">-->
    <!--        <i class="far fa-caret-square-right"></i>-->
    <!--        <span>{{ PURCHASE_HISTORY }}</span>-->
    <!--    </a>-->
    <!--</li>--> --}}


    <!-- Customer -->
    {{-- <li class="nav-item {{ $route == 'admin_customer_view' ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin_customer_view') }}">
        <i class="far fa-caret-square-right"></i>
        <span>{{ CUSTOMER }}</span>
    </a>
    </li> --}}


    {{-- <!-- Email Template -->
    <!--<li class="nav-item {{ $route == 'admin_email_template_view' ? 'active' : '' }}">-->
    <!--    <a class="nav-link" href="{{ route('admin_email_template_view') }}">-->
    <!--        <i class="far fa-caret-square-right"></i>-->
    <!--        <span>{{ EMAIL_TEMPLATE }}</span>-->
    <!--    </a>-->
    <!--</li>-->

    <!-- Clear Database -->
    <!--<li class="nav-item {{ $route == 'admin_clear_database' ? 'active' : '' }}">-->
    <!--    <a class="nav-link" href="{{ route('admin_clear_database') }}" onClick="return confirm('Be careful! All data will be removed from the website. Want to do that?');">-->
    <!--        <i class="far fa-caret-square-right"></i>-->
    <!--        <span>{{ CLEAR_DATABASE }}</span>-->
    <!--    </a>-->
    <!--</li>-->
    <!-- Package Section -->

    {{-- <a class="nav-link" href="{{ route('admin.slider.index') }}">
    <li class="nav-item {{ Route::is('admin.slider.*') ? 'active' : '' }}">
        <i class="far fa-caret-square-right"></i>
        <span>Slider</span>
        </a>
    </li> --}}


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 rounded-circle" id="sidebarToggle"></button>
    </div>
</ul>
