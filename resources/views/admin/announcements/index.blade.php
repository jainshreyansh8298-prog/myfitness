<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-bullhorn text-warning mr-2"></i>Announcements</h1>
        <a href="{{ route('admins.announcements.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Add Announcement') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Announcements</h6>
        </div>
        <div class="card-body">
            @if($announcements->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Duration</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $a)
                                <tr>
                                    <td style="max-width: 340px;">
                                        {{ $a->message }}
                                        @if($a->link)
                                            <br><small class="text-muted"><i class="fas fa-link"></i> {{ $a->link }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($a->is_permanent)
                                            <span class="badge badge-info">Permanent</span>
                                        @else
                                            <span class="badge badge-warning text-dark">Until {{ optional($a->expires_at)->format('d M Y, H:i') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$a->is_active)
                                            <span class="badge badge-secondary">Disabled</span>
                                        @elseif($a->is_expired)
                                            <span class="badge badge-danger">Expired</span>
                                        @else
                                            <span class="badge badge-success">Live</span>
                                        @endif
                                    </td>
                                    <td>{{ $a->sort_order }}</td>
                                    <td class="text-right text-nowrap">
                                        <a href="{{ route('admins.announcements.edit', $a->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admins.announcements.destroy', $a->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Delete this announcement?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">{{ $announcements->links() }}</div>
            @else
                <p class="text-center text-muted my-4">No announcements yet. Click "Add Announcement" to create one.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
