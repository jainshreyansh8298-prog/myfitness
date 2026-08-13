<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Coach</h1>
        <a href="{{ route('admins.coaches.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="my-3" action="{{ route('admins.coaches.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>{{ __('Title / Role') }}</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Head Strength Coach">
                </div>

                <div class="form-group">
                    <label>{{ __('Photo') }}</label>
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" accept="image/*">
                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                    <small class="text-muted">Square images work best. JPG, PNG or WEBP, up to 4 MB.</small>
                </div>

                <div class="form-group">
                    <label>{{ __('Bio') }}</label>
                    <textarea name="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{ __('Instagram URL') }}</label>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('Facebook URL') }}</label>
                        <input type="text" name="facebook" class="form-control" value="{{ old('facebook') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('LinkedIn URL') }}</label>
                        <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('WhatsApp URL') }}</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp') }}" placeholder="https://wa.me/9715...">
                    </div>
                </div>

                <div class="form-group" style="max-width: 220px;">
                    <label>{{ __('Sort Order') }}</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}">
                    <small class="text-muted">Lower numbers appear first.</small>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveSwitch">Active (visible on site)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">{{ __('Create Coach') }}</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
