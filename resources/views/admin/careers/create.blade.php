<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Career</h1>
        <a href="{{ route('admins.careers.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admins.careers.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. Dubai, UAE">
                </div>

                <div class="form-group">
                    <label>Job Type <span class="text-danger">*</span></label>
                    <select name="type" class="form-control">
                        <option value="Full-time" {{ old('type') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                        <option value="Part-time" {{ old('type') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                        <option value="Remote" {{ old('type') == 'Remote' ? 'selected' : '' }}>Remote</option>
                        <option value="Contract" {{ old('type') == 'Contract' ? 'selected' : '' }}>Contract</option>
                        <option value="Internship" {{ old('type') == 'Internship' ? 'selected' : '' }}>Internship</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="6" required>{{ old('description') }}</textarea>
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    <small class="text-muted">Lower numbers appear first.</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" checked>
                        <label class="custom-control-label" for="isActiveSwitch">Active (Visible on frontend)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Create Career</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
