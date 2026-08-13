<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-plus-circle text-primary mr-2"></i>Add Testimonial</h1>
        <a href="{{ route('admins.testimonials.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left mr-1"></i>Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admins.testimonials.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Client Name *</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Sarah Al Mansoori">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Role / Location</label>
                        <input type="text" name="role_location" class="form-control" placeholder="e.g. Dubai Marina • Lost 10kg">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Rating (1 to 5 Stars) *</label>
                        <select name="rating" class="form-control" required>
                            <option value="5" selected>5 Stars (★★★★★)</option>
                            <option value="4">4 Stars (★★★★☆)</option>
                            <option value="3">3 Stars (★★★☆☆)</option>
                            <option value="2">2 Stars (★★☆☆☆)</option>
                            <option value="1">1 Star (★☆☆☆☆)</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="font-weight-bold">Avatar Photo URL</label>
                        <input type="text" name="avatar_url" class="form-control" placeholder="https://images.unsplash.com/...">
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Review Content *</label>
                    <textarea name="content" class="form-control" rows="4" required placeholder="Enter client testimonial review text..."></textarea>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActive" name="is_active" value="1" checked>
                        <label class="custom-control-label font-weight-bold" for="isActive">Published & Visible on Website</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success font-weight-bold px-4">SAVE TESTIMONIAL</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
