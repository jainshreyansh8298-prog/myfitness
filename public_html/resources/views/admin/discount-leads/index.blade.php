<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-gift text-success mr-2"></i>10% Discount Pop-up Leads</h1>
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
        <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold">Captured Lead Emails (Total: {{ $leads->total() }})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Visitor Email Address</th>
                            <th>Discount Code Issued</th>
                            <th>Captured Date & Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $index => $lead)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="font-weight-bold text-primary">{{ $lead->email }}</td>
                                <td><span class="badge badge-success font-weight-bold" style="font-size: 14px;">{{ $lead->discount_code }}</span></td>
                                <td>{{ $lead->created_at->format('M d, Y • h:i A') }}</td>
                                <td>
                                    <form action="{{ route('admins.discount-leads.destroy', $lead->id) }}" method="POST" onsubmit="return confirm('Delete this email record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No discount leads captured yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $leads->links() }}
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
