<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Career</h1>
        <a href="{{ route('admins.careers.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admins.careers.update', $career->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $career->title) }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $career->location) }}" placeholder="e.g. Dubai, UAE">
                </div>

                <div class="form-group">
                    <label>Job Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-control">
                        @foreach(['Full-time', 'Part-time', 'Remote', 'Contract', 'Internship'] as $type)
                            <option value="{{ $type }}" {{ old('type', $career->type) == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description', $career->description) }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $career->sort_order) }}">
                    <small class="text-muted">Lower numbers appear first.</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" {{ $career->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveSwitch">Active (Visible on frontend)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Update Career</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
