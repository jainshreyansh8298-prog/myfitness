<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-star text-warning mr-2"></i>Testimonials & Client Reviews</h1>
        <a href="{{ route('admins.testimonials.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i>Add New Testimonial</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-items-center" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Avatar</th>
                            <th>Client Name</th>
                            <th>Role / Location</th>
                            <th>Rating</th>
                            <th>Review Content</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $t)
                            <tr>
                                <td>
                                    <img src="{{ $t->avatar_url ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100' }}" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
                                </td>
                                <td class="font-weight-bold">{{ $t->name }}</td>
                                <td>{{ $t->role_location }}</td>
                                <td>
                                    @for($i=1; $i<=5; $i++)
                                        <i class="fas fa-star {{ $i <= $t->rating ? 'text-warning' : 'text-gray-300' }}"></i>
                                    @endfor
                                </td>
                                <td>{{ Str::limit($t->content, 80) }}</td>
                                <td>
                                    @if($t->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Hidden</span>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <a href="{{ route('admins.testimonials.edit', $t->id) }}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admins.testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Delete this testimonial?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
