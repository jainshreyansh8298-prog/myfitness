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
                            <li class="list"><a href="#">Payment History</a></li>
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
                                <h2 class="dashboards-title"> Payment History </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 margin-top-40">
                            <div class="dashboard-status-list">
                                <ul class="tabs status-order-list margin-bottom-10">
                                    <li class="active" data-tab="tab-all"> All Payments <span class="numbers"> {{ $payments->total() }} </span> </li>
                                </ul>
                            </div>
                            <div id="tab-all" class="tab-content-item active">
                                <div class="table-responsive table-responsive--md table-responsive-lg">
                                    <table class="custom--table">
                                        <thead>
                                            <tr>
                                                <th> Transaction ID </th>
                                                <th> Date </th>
                                                <th> Service </th>
                                                <th> Amount </th>
                                                <th> Payment Status </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($payments->count() > 0)
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td data-label="Transaction ID"> {{ $payment->reference_code }} </td>
                                                        <td data-label="Date"> {{ $payment->created_at->format('d M, Y') }} </td>
                                                        <td data-label="Service"> {{ $payment->service->name ?? 'N/A' }} </td>
                                                        <td data-label="Amount"> ${{ number_format($payment->payed_amount, 2) }} </td>
                                                        <td data-label="Payment Status">
                                                            @if ($payment->payment_status == 'paid')
                                                                <span class="badge badge-success"> Paid </span>
                                                            @else
                                                                <span class="badge badge-warning"> Unpaid </span>
                                                            @endif
                                                        </td>
                                                        <td data-label="Action">
                                                            @if ($payment->service_id)
                                                                <a href="{{ route('front.serviceDetails', $payment->service_id) }}"
                                                                    class="btn btn-primary btn-sm"> View Details </a>
                                                            @else
                                                                <a href="{{ route('front.services') }}" class="btn btn-primary btn-sm">All Services </a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="6">
                                                        {{ $payments->links('pagination::bootstrap-4') }}
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="6" style="text-align:center;">Sorry! No Payment found.</td>
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
        </div>
    </div>
</x-front.main-layout>
