<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.categories.update', $category->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Category Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $category->name }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control " cols="30" rows="10">{{ old('description') ?? $category->description }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Badge Color') }}</label>
                <input type="color" name="color" class="form-control form-control-color @error('color') is-invalid @enderror" value="{{ old('color', $category->color) ?? '#000000' }}" title="Choose your color">
                @error('color')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Existing Image') }}</label>
                <div>
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="w_200" alt="">
                    @else
                        <p>{{ __('No Image') }}</p>
                    @endif
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
