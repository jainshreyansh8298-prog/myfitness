<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit {{ $page->title }}</h1>
        <a href="{{ route('admins.pages.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Pages
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Content</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admins.pages.update', $page->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="content">Page Content</label>
                    <textarea name="content" id="content" class="form-control" rows="20">{{ old('content', $page->content) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('content', {
                height: 500
            });
        </script>
    </x-slot>
</x-dashboard.main-layout>
