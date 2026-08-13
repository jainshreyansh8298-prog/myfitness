<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.areas.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="">{{ __('Area Name') }}</label>
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
                <label for="">{{ __('Services') }}</label>
                <select name="services_ids[]" class="form-control select2 @error('services_ids') is-invalid @enderror" multiple>
                </select>
                @error('services_ids')
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

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Services",
                allowClear: true,
                ajax: {
                    url: '{{ route('admins.services.search') }}',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>

</x-dashboard.main-layout>
