<x-dashboard.main-layout >

    <div class="row">
        <div class="mb-2 col-xl-12 col-md-12">
            <h1 class="mb-3 text-gray-800 h3">{{ __('Dashboard') }}</h1>
        </div>
    </div>

    <!-- Box Start -->
    <div class="row dashboard-page" data-aos="fade-up" >

        <!-- Total Users -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-primary h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">{{ __('Total Users') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalUsers }}</div>
                            <div class="mt-1 text-xs text-muted">
                                <span class="text-success">{{ $recentUsers }}</span> new this week
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">{{ __('Total Orders') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalOrders }}</div>
                            <div class="mt-1 text-xs text-muted">
                                <span class="text-warning">{{ $pendingOrders }}</span> pending
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-shopping-cart fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Services -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-info h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">{{ __('Total Services') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalServices }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-dumbbell fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-warning h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-warning text-uppercase">{{ __('Total Categories') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalCategories }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-tags fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Areas -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-primary h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-primary text-uppercase">{{ __('Total Areas') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalAreas }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-map-marker-alt fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Blogs -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-info h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-info text-uppercase">{{ __('Total Blogs') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalBlogs }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-blog fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Contact Forms -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-success text-uppercase">{{ __('Contact Forms') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalContactForms }}</div>
                            <div class="mt-1 text-xs text-muted">
                                <span class="text-info">{{ $recentContactForms }}</span> this week
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-envelope fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Admins -->
        <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-danger h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 text-xs font-weight-bold text-danger text-uppercase">{{ __('Total Admins') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $totalAdmins }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-shield fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Events Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $all_events_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Active Events Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $active_events_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Pending Events') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $pending_events }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Challanges Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $all_competitions_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Active Challanges Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $active_competitions_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Pending Challanges') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $pending_competitions }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Verified Users') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $verified_users_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Booked Events Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_event_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Booked Challanges Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_competition_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Reserved Tickets') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_booked_tickets }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Total Payments') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $total_payments }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="mb-4 col-xl-3 col-md-6">
            <div class="py-2 shadow card border-left-success h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="mr-2 col">
                            <div class="mb-1 h4 font-weight-bold text-success">{{ __('Categories Count') }}</div>
                            <div class="mb-0 text-gray-800 h5 font-weight-bold">{{ $categories_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-user-friends fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>

    <!-- Latest Orders Section -->
    <div class="row mt-4">
        <div class="col-xl-12">
            <h1 class="mb-3 text-gray-800 h3">{{ __('Latest Orders') }}</h1>
            <div class="mb-4 shadow card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Order ID') }}</th>
                                    <th>{{ __('User') }}</th>
                                    <th>{{ __('Service') }}</th>
                                    <th>{{ __('Area') }}</th>
                                    <th>{{ __('Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestOrders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                                        <td>{{ $order->service->name ?? 'N/A' }}</td>
                                        <td>{{ $order->area->name ?? 'N/A' }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if($order->status == 'completed')
                                                <span class="badge badge-success">{{ __('Completed') }}</span>
                                            @elseif($order->status == 'pending')
                                                <span class="badge badge-warning">{{ __('Pending') }}</span>
                                            @else
                                                <span class="badge badge-info">{{ $order->status ?? __('N/A') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('No orders found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($latestOrders->count() > 0)
                        <div class="mt-3 text-center">
                            <a href="{{ route('admins.orders.index') }}" class="btn btn-primary btn-sm">{{ __('View All Orders') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Users Section -->
    <div class="row mt-4">
        <div class="col-xl-12">
            <h1 class="mb-3 text-gray-800 h3">{{ __('Latest Registered Users') }}</h1>
            <div class="mb-4 shadow card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Email') }}</th>
                                    <th>{{ __('Phone') }}</th>
                                    <th>{{ __('Email Verified') }}</th>
                                    <th>{{ __('Registered Date') }}</th>
                                    <th>{{ __('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($latestUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email ?? __('No Email') }}</td>
                                        <td>{{ $user->phone ?? 'N/A' }}</td>
                                        <td>
                                            @if($user->email_verified_at)
                                                <span class="badge badge-success">{{ __('Yes') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('No') }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            @if($user->status == 'active')
                                                <span class="badge badge-success">{{ __('Active') }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('No users found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if($latestUsers->count() > 0)
                        <div class="mt-3 text-center">
                            <a href="{{ route('admins.users.index') }}" class="btn btn-primary btn-sm">{{ __('View All Users') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-dashboard.main-layout>
