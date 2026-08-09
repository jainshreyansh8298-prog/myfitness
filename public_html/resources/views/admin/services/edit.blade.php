<x-dashboard.main-layout>

    {{-- @dd($service) --}}
    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.services.update', $service->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Service Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $service->name }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control editor" cols="30" rows="10">{!! old('description') ?? $service->description !!}</textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Category') }}</label>
                <select name="category_id" class="form-control">
                    <option value="">{{ __('Select Category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id || $service->category_id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">{{ __('Price After') }}</label>
                <input type="number" name="price_after" class="form-control"
                    value="{{ old('price_after') ?? $service->price_after }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Price Before') }}</label>
                <input type="number" name="price_before" class="form-control"
                    value="{{ old('price_before') ?? $service->price_before }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Session Minutes') }}</label>
                <select name="session_minutes" class="form-control">
                    <option value="45"
                        {{ old('session_minutes') == 45 || $service->session_minutes == 45 ? 'selected' : '' }}>45
                        {{ __('Minutes') }}</option>
                    <option value="60"
                        {{ old('session_minutes') == 60 || $service->session_minutes == 60 ? 'selected' : '' }}>60
                        {{ __('Minutes') }}</option>
                    <option value="90"
                        {{ old('session_minutes') == 90 || $service->session_minutes == 90 ? 'selected' : '' }}>90
                        {{ __('Minutes') }}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">{{ __('Is Featured') }}</label>
                <select name="is_featured" class="form-control">
                    <option value="1" {{ old('is_featured', $service->is_featured) == 1 ? 'selected' : '' }}>
                        {{ __('Yes') }}
                    </option>
                    <option value="0" {{ old('is_featured', $service->is_featured) == 0 ? 'selected' : '' }}>
                        {{ __('No') }}
                    </option>
                </select>
            </div>


            <div class="form-group">
                <label for="">{{ __('Existing Image') }}</label>
                <div>
                    <img src="{{ asset('storage/' . $service->image) }}" alt="" width="100">
                </div>
            </div>
            <div class="form-group">
                <label for="">{{ __('Change Photo') }}</label>
                <div>
                    <input type="file" name="image">
                </div>
            </div>

            <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
        </form>
    </div>

</x-dashboard.main-layout>
