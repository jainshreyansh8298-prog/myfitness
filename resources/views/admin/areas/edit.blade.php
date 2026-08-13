<x-dashboard.main-layout>

    <div class="card-body" data-aos="fade-up">
        <form class="my-3" action="{{ route('admins.areas.update', $area->slug) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Area Name') }}</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') ?? $area->name }}">
            </div>

            <div class="form-group">
                <label for="">{{ __('Description') }}</label>
                <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') ?? $area->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="">{{ __('Services') }}</label>
                <select name="services_ids[]" class="form-control select2" multiple>
                    @foreach ($area->services as $service)
                        <option value="{{ $service->id }}" selected>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="">{{ __('Existing Image') }}</label>
                <div>
                    <img src="{{ asset('storage/' . $area->image) }}" alt="" width="100">
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
