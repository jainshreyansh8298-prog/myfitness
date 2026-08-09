<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Coach</h1>
        <a href="{{ route('admins.coaches.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="my-3" action="{{ route('admins.coaches.update', $coach->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>{{ __('Name') }}</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $coach->name) }}" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>{{ __('Title / Role') }}</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $coach->title) }}">
                </div>

                <div class="form-group">
                    <label>{{ __('Photo') }}</label>
                    <div class="mb-2">
                        <img src="{{ $coach->photo_url }}" alt="{{ $coach->name }}" style="width:80px; height:80px; object-fit:cover; border-radius:8px;">
                    </div>
                    <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" accept="image/*">
                    @error('photo')<span class="text-danger">{{ $message }}</span>@enderror
                    <small class="text-muted">Leave empty to keep the current photo.</small>
                </div>

                <div class="form-group">
                    <label>{{ __('Bio') }}</label>
                    <textarea name="bio" class="form-control" rows="4">{{ old('bio', $coach->bio) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>{{ __('Instagram URL') }}</label>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $coach->instagram) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('Facebook URL') }}</label>
                        <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $coach->facebook) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('LinkedIn URL') }}</label>
                        <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin', $coach->linkedin) }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>{{ __('WhatsApp URL') }}</label>
                        <input type="text" name="whatsapp" class="form-control" value="{{ old('whatsapp', $coach->whatsapp) }}">
                    </div>
                </div>

                <div class="form-group" style="max-width: 220px;">
                    <label>{{ __('Sort Order') }}</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $coach->sort_order) }}">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" value="1" {{ old('is_active', $coach->is_active) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveSwitch">Active (visible on site)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">{{ __('Update Coach') }}</button>
            </form>
        </div>
    </div>
</x-dashboard.main-layout>
