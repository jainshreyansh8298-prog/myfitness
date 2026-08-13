<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-tie text-info mr-2"></i>Coaches</h1>
        <a href="{{ route('admins.coaches.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Add Coach') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Coaches</h6>
        </div>
        <div class="card-body">
            @if($coaches->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 70px;">Photo</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coaches as $coach)
                                <tr>
                                    <td>
                                        <img src="{{ $coach->photo_url }}" alt="{{ $coach->name }}" style="width:48px; height:48px; object-fit:cover; border-radius:50%;">
                                    </td>
                                    <td class="font-weight-bold">{{ $coach->name }}</td>
                                    <td>{{ $coach->title ?: '—' }}</td>
                                    <td>
                                        @if($coach->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $coach->sort_order }}</td>
                                    <td class="text-right text-nowrap">
                                        <a href="{{ route('admins.coaches.edit', $coach->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admins.coaches.destroy', $coach->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this coach?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $coaches->links() }}</div>
            @else
                <p class="text-center text-muted my-4">No coaches yet. Click "Add Coach" to create one.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
