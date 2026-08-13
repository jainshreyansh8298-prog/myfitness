<x-front.main-layout>
    <div class="overlays"></div>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list"><a href="{{ route('front.dashboard') }}">Dashboard</a></li>
                            <li class="list"><a href="#">Orders</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-area dashboard-padding">
        <div class="container-fluid">
            <div class="dashboard-contents-wrapper">
                <div class="dashboard-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <x-front.user-dashboard.side-bar />
                <div class="dashboard-right">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="dashboard-settings dashboard-flex-shwing">
                                <h2 class="dashboards-title"> Order Status </h2>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-top-40">
                            <div class="dashboard-status-list">
                                <ul class="tabs status-order-list margin-bottom-10">
                                    <li class="active" data-tab="tab-active"> Active <span class="numbers"> {{ $calc['pending'] + $calc['running'] }} </span>
                                    </li>
                                    <li data-tab="tab-completed"> Completed <span class="numbers"> {{ $calc['completed'] }} </span> </li>
                                    <li data-tab="tab-cancelled"> Cancelled <span class="numbers"> {{ $calc['cancelled'] }} </span> </li>
                                    <li data-tab="tab-all"> All <span class="numbers"> {{ $orders->count() }} </span> </li>
                                </ul>
                            </div>
                            <div id="tab-active" class="tab-content-item active">
                                <div class="table-responsive table-responsive--md table-responsive-lg">
                                    <x-front.user-dashboard.orders-table :orders="$orders->whereIn('status', ['pending', 'running'])" />
                                </div>

                            </div>
                            <div id="tab-completed" class="tab-content-item">
                                <div class="table-responsive table-responsive--md table-responsive-lg">
                                    <x-front.user-dashboard.orders-table :orders="$orders->where('status', 'completed')" />
                                </div>

                            </div>
                            <div id="tab-cancelled" class="tab-content-item">
                                <div class="table-responsive table-responsive--md table-responsive-lg">
                                    <x-front.user-dashboard.orders-table :orders="$orders->where('status', 'cancelled')" />
                                </div>

                            </div>
                            <div id="tab-all" class="tab-content-item">
                                <div class="table-responsive table-responsive--md table-responsive-lg">
                                    <x-front.user-dashboard.orders-table :orders="$orders" />
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-front.main-layout>