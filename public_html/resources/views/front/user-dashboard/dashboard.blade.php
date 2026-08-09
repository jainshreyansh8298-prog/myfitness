<x-front.main-layout>
    <div class="overlays"></div>
    <div class="banner-inner-area section-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents">
                        <ul class="inner-menu">
                            <li class="list"><a href="/"> Home </a></li>
                            <li class="list">Dashboard</li>
                        </ul>
                        <!--<h1 class="banner-inner-title"> Dashboard </h1>-->
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
                    <x-front.user-dashboard.top-bar />
                    <h2 class="dashboards-title"> Recent Orders </h2>
                    <div id="recent" class="dashboard-middle-flex margin-top-20">

                        <div class="table-responsive table-responsive--md table-responsive-lg">
                            <table class="custom--table">
                                <thead>
                                    <tr>
                                        <th> Order ID </th>
                                        <th> Order Date </th>
                                        <th> Service Name </th>
                                        <th> Service Date </th>
                                        <th> Service Time </th>
                                        <th> Pricing </th>
                                        <th> Payment Status </th>
                                        <th> Order Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($latest_orders->count() > 0)
                                        @foreach ($latest_orders as $order)
                                            <tr>
                                                <td data-label="Order ID"> {{ $order->reference_code }} </td>
                                                <td data-label="Order Date"> {{ $order->created_at->format('d M, Y') }}
                                                </td>
                                                <td data-label="Service Name"> {{ $order->service->name }} </td>
                                                <td data-label="Service Date">
                                                    {{ \Carbon\Carbon::parse($order->first_session_date)->format('d M, Y') }}
                                                </td>
                                                <td data-label="Service Time"> {{ $order->service->time }} </td>
                                                <td data-label="Pricing"> ${{ number_format($order->payed_amount, 2) }}
                                                </td>
                                                <td data-label="Payment Status">
                                                    @if ($order->payment_status == 'paid')
                                                        <span class="badge badge-success"> Paid </span>
                                                    @else
                                                        <span class="badge badge-warning"> Unpaid </span>
                                                    @endif
                                                </td>
                                                <td data-label="Order Status">
                                                    @if ($order->status == 'pending')
                                                        <span class="badge badge-warning"> Pending </span>
                                                    @elseif ($order->status == 'in_progress')
                                                        <span class="badge badge-info"> In Progress </span>
                                                    @elseif ($order->status == 'completed')
                                                        <span class="badge badge-success"> Completed </span>
                                                    @elseif ($order->status == 'canceled')
                                                        <span class="badge badge-danger"> Canceled </span>
                                                    @endif
                                                </td>
                                                <td data-label="Action">
                                                    @if ($order->service_id)
                                                    <a href="{{ route('front.serviceDetails', $order->service_id) }}"
                                                        class="btn btn-primary btn-sm"> View Details </a>
                                                        @else
                                                        <a href="{{ route('front.services') }}"
                                                            class="btn btn-primary btn-sm">All Services </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="9">
                                                {{ $latest_orders->links('pagination::bootstrap-4') }}
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="9" style="text-align:center;">Sorry! No Order found.</td>
                                        </tr>

                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front.main-layout>
