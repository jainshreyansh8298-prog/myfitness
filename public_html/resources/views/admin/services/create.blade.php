<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.services.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">{{ __('Service Name') }}</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control editor @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Category') }}</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                    <option value="">{{ __('Select Category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Price After') }}</label>
                <input type="number" name="price_after" class="form-control @error('price_after') is-invalid @enderror" value="{{ old('price_after') }}">
                @error('price_after')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Price Before') }}</label>
                <input type="number" name="price_before" class="form-control @error('price_before') is-invalid @enderror" value="{{ old('price_before') }}">
                @error('price_before')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Session Minutes') }}</label>
                <select name="session_minutes" class="form-control @error('session_minutes') is-invalid @enderror">
                    <option value="45" {{ old('session_minutes') == 45 ? 'selected' : '' }}>45
                        {{ __('Minutes') }}</option>
                    <option value="60" {{ old('session_minutes') == 60 ? 'selected' : '' }}>60
                        {{ __('Minutes') }}</option>
                    <option value="90" {{ old('session_minutes') == 90 ? 'selected' : '' }}>90
                        {{ __('Minutes') }}</option>
                </select>
                @error('session_minutes')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Is Featured') }}</label>
                <select name="is_featured" class="form-control @error('is_featured') is-invalid @enderror">
                    <option value="1" {{ old('is_featured') == 1 ? 'selected' : '' }}>{{ __('Yes') }}
                    </option>
                    <option value="0" {{ old('is_featured') == 0 ? 'selected' : '' }}>{{ __('No') }}
                    </option>
                </select>
                @error('is_featured')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Change Photo') }}</label>
                <div>
                    <input type="file" name="image" class="@error('image') is-invalid @enderror">
                </div>
                @error('image')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-success">{{ __('Create') }}</button>
        </form>
    </div>

</x-dashboard.main-layout>
