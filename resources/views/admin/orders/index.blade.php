<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Orders') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header"></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable-ar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('Email')}}</th>
                            <th>{{ __('Phone Number')}}</th>
                            <th>{{ __('Area Name') }}</th>
                            <th>{{ __('Status')}}</th>
                            <th>{{ __('Payment Status')}}</th>
                            <th>{{ __('Session Number')}}</th>
                            <th>{{__('Type')}}</th>
                            <th>{{ __('Start Date')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 0; @endphp
                        @foreach ($orders as $order)
                            <tr 
                                onclick="window.location='{{ route('admins.orders.edit', $order->id) }}'" 
                                style="cursor:pointer;"
                                class="order-row"
                            >
                                <td>{{ ++$i }}</td>
                                <td>{{ $order->user?->name }}</td>
                                <td>{{ $order->user?->email }}</td>
                                <td>{{ $order->user?->details?->phone }}</td>
                                <td>{{ $order->area?->name }}</td>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->sessions_number }}</td>
                                <td>{{ $order->type }}</td>
                                <td>{{ $order->first_session_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .order-row:hover {
            background-color: #f0ecec !important;
            transition: background-color 0.8s ease-in-out;
        }
        .order-row:active {
            background-color: #e7e0e0 !important;
        }
    </style>
</x-dashboard.main-layout>
