<x-dashboard.main-layout>
    <div class="card-body">
        <form class="my-3" action="{{ route('admins.faqs.update', $faq->id) }}" method="post">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="">{{ __('Question') }}</label>
                <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" value="{{ old('question', $faq->question) }}" required>
                @error('question')
                    <span class="form-error-message text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Answer') }}</label>
                <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" cols="30" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
                @error('answer')
                    <span class="form-error-message text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Sort Order') }}</label>
                <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}">
                <small class="text-muted">Lower numbers appear first.</small>
            </div>

            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="isActiveSwitch" name="is_active" {{ $faq->is_active ? 'checked' : '' }}>
                    <label class="custom-control-label" for="isActiveSwitch">Active (Visible on frontend)</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('Update FAQ') }}</button>
        </form>
    </div>
</x-dashboard.main-layout>
