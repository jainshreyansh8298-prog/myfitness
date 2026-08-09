<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Legal Pages CMS</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Pages</h6>
        </div>
        <div class="card-body">
            @if($pages->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td><code>{{ $page->slug }}</code></td>
                                <td>{{ $page->updated_at->diffForHumans() }}</td>
                                <td style="width: 200px;">
                                    <a href="{{ route('admins.pages.edit', $page->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i> Edit Content</a>
                                    <a href="{{ route('admins.pages.history', $page->id) }}" class="btn btn-info btn-sm" title="History"><i class="fas fa-history"></i> History</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-muted my-4">No Pages found. Please run the seeder.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
