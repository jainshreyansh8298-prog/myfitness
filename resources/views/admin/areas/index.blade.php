<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Areas') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.areas.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>{{ __('Add New') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-ar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Services Count') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($areas as $area)
                            <tr data-aos="fade-up">
                                <td>{{ ++$i }}</td>
                                <td>{{ $area->name }}</td>
                                <td>{{ $area->description }}</td>
                                @if (!is_null($area->image))
                                    <td>
                                        <img src="{{ asset('storage/' . $area->image) }}" alt=""
                                            class="w_200">
                                    </td>
                                @else
                                    <td>
                                        <p>{{ __('No Image') }}</p>
                                    </td>
                                @endif
                                <td>{{ $area->services_count }}</td>
                                <td class="d-flex justify-content-center">
                                        <a href="{{ route('admins.areas.edit', $area->slug) }}"
                                            class="mx-1 btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                        </a>
                                    <form action="{{ route('admins.areas.destroy', $area->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-1 btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure? ');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</x-dashboard.main-layout>
