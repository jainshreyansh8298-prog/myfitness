<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-edit text-warning mr-2"></i>Edit Testimonial</h1>
        <a href="{{ route('admins.testimonials.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-1"></i>Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admins.testimonials.update', $testimonial->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Client Name *</label>
                        <input type="text" name="name" class="form-control" required value="{{ $testimonial->name }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Role / Location</label>
                        <input type="text" name="role_location" class="form-control" value="{{ $testimonial->role_location }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Rating (1 to 5 Stars) *</label>
                        <select name="rating" class="form-control" required>
                            <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars (★★★★★)</option>
                            <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars (★★★★☆)</option>
                            <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars (★★★☆☆)</option>
                            <option value="2" {{ $testimonial->rating == 2 ? 'selected' : '' }}>2 Stars (★★☆☆☆)</option>
                            <option value="1" {{ $testimonial->rating == 1 ? 'selected' : '' }}>1 Star (★☆☆☆☆)</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Avatar Photo URL</label>
                        <input type="text" name="avatar_url" class="form-control" value="{{ $testimonial->avatar_url }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Review Content *</label>
                    <textarea name="content" class="form-control" rows="4" required>{{ $testimonial->content }}</textarea>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" {{ $testimonial->is_active ? 'checked' : '' }}>
                        <label class="custom-control-label font-weight-bold" for="isActive">Published & Visible on Website</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning font-weight-bold px-4">UPDATE TESTIMONIAL</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
