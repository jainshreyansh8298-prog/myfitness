<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Careers</h1>
        <a href="{{ route('admins.careers.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Career
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Careers</h6>
        </div>
        <div class="card-body">
            @if($careers->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Sort Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careers as $career)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $career->title }}</td>
                                <td>{{ $career->location ?? '—' }}</td>
                                <td>{{ $career->type }}</td>
                                <td>{{ $career->sort_order }}</td>
                                <td>
                                    @if($career->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admins.careers.edit', $career->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admins.careers.destroy', $career->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this career?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted my-4">No careers found. Click "Add Career" to create one.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
