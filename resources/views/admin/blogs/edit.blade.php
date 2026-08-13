<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.blogs.update', $blog->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Blog Title') }}</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') ?? $blog->title }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Blog Excerpt') }}</label>
                <input type="text" name="excerpt" class="form-control"
                    value="{{ old('excerpt') ?? htmlspecialchars($blog->excerpt) }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Content') }}</label>
                <textarea name="content" class="form-control editor">{!! old('content') ?? $blog->content !!}</textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Category') }}</label>
                <select name="category_id" class="form-control">
                    <option value="" disabled>{{ __('Select Category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">{{ __('Existing Image') }}</label>
                <div>
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="" width="100">
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
