<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.categories.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">{{ __('Category Name') }}</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <span class="form-error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="">{{ __('Badge Color') }}</label>
                <input type="color" name="color" class="form-control form-control-color @error('color') is-invalid @enderror" value="{{ old('color', '#000000') }}" title="Choose your color">
                @error('color')
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
