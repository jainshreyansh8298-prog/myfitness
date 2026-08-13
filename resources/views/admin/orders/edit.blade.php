<x-dashboard.main-layout>
    <div class="container py-5">
        <h1 class="mb-4 h3">Order Details</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                {{-- USER INFO --}}
                <h5 class="mb-3">User Information</h5>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <span class="fw-bold">Name:</span> {{ $order->user?->name ?? '-' }}
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Email:</span> {{ $order->user?->email ?? '-' }}
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Phone:</span> {{ $order->user?->details?->phone ?? '-' }}
                    </div>
                </div>

                {{-- SERVICE INFO --}}
                <h5 class="mb-3">Service Information</h5>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <span class="fw-bold">Service:</span> {{ $order->service?->name ?? '-' }}
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Sessions:</span> {{ $order->sessions_number }}
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">First Session:</span> {{ $order->first_session_date }}
                    </div>
                </div>

                {{-- AREA & TYPE --}}
                <h5 class="mb-3">Area & Type</h5>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <span class="fw-bold">Area:</span> {{ $order->area?->name ?? '-' }}
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Type:</span> <span class="badge bg-info text-white">{{ ucfirst($order->type) }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Reference:</span> <span class="badge bg-secondary text-light">{{ $order->reference_code }}</span>
                    </div>
                </div>

                {{-- PAYMENT & STATUS --}}
                <h5 class="mb-3">Payment & Order Status</h5>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <span class="fw-bold">Payment Status:</span>
                        @php
                            $colors = [
                                'pending' => 'warning',
                                'completed' => 'success',
                                'failed' => 'danger',
                            ];
                        @endphp
                        <span class="badge text-white bg-{{ $colors[$order->payment_status] ?? 'secondary' }}">
                            {{ ucfirst($order->payment_status) }}
                        </span>
                    </div>
                    <div class="col-md-4">
                        <span class="fw-bold">Order Status:</span>
                        <form action="{{ route('admins.orders.update', $order->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select form-select-sm select2" onchange="this.form.submit()">
                                @foreach(['pending','running','cancelled','completed'] as $status)
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'running' => 'primary',
                                            'cancelled' => 'danger',
                                            'completed' => 'success'
                                        ];
                                    @endphp
                                    <option value="{{ $status }}" @selected($order->status === $status)>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        <a href="{{ route('admins.orders.index') }}" class="btn btn-outline-secondary">Back to Orders</a>
    </div>
</x-dashboard.main-layout>
