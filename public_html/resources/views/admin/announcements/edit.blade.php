<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Announcement</h1>
        <a href="{{ route('admins.announcements.index') }}" class="btn btn-sm btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="my-3" action="{{ route('admins.announcements.update', $announcement->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>{{ __('Message') }}</label>
                    <input type="text" name="message" maxlength="500" class="form-control @error('message') is-invalid @enderror" value="{{ old('message', $announcement->message) }}" required>
                    @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label>{{ __('Link (optional)') }}</label>
                    <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $announcement->link) }}" placeholder="https://...">
                    @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                @php $isDays = old('duration', $announcement->is_permanent ? 'permanent' : 'days') === 'days'; @endphp

                <div class="form-group">
                    <label class="d-block font-weight-bold">{{ __('Duration') }}</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="durPermanent" name="duration" value="permanent" class="custom-control-input" {{ $isDays ? '' : 'checked' }}>
                        <label class="custom-control-label" for="durPermanent">Permanent</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="durDays" name="duration" value="days" class="custom-control-input" {{ $isDays ? 'checked' : '' }}>
                        <label class="custom-control-label" for="durDays">Auto-expire after N days</label>
                    </div>
                    @if(!$announcement->is_permanent && $announcement->expires_at)
                        <small class="d-block text-muted mt-1">Currently expires on {{ $announcement->expires_at->format('d M Y, H:i') }}. Setting days again restarts the countdown from now.</small>
                    @endif
                </div>

                <div class="form-group" id="daysWrapper" style="max-width: 220px; display: {{ $isDays ? 'block' : 'none' }};">
                    <label>{{ __('Number of days') }}</label>
                    <input type="number" name="days" min="1" max="3650" class="form-control" value="{{ old('days', 7) }}">
                    <small class="text-muted">Countdown restarts from now when you save.</small>
                </div>

                <div class="form-group" style="max-width: 220px;">
                    <label>{{ __('Sort Order') }}</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $announcement->sort_order) }}">
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" value="1" {{ old('is_active', $announcement->is_active) ? 'checked' : '' }}>
                        <label class="custom-control-label" for="isActiveSwitch">Active (visible on site)</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">{{ __('Update Announcement') }}</button>
            </form>
        </div>
    </div>

    <script>
        (function () {
            function toggleDays() {
                var days = document.getElementById('durDays');
                var wrapper = document.getElementById('daysWrapper');
                wrapper.style.display = days.checked ? 'block' : 'none';
            }
            document.querySelectorAll('input[name="duration"]').forEach(function (el) {
                el.addEventListener('change', toggleDays);
            });
            toggleDays();
        })();
    </script>
</x-dashboard.main-layout>
