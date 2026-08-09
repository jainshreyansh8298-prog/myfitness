<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Services') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.services.create') }}" class="btn btn-primary btn-sm"><i
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
                            {{-- <th>{{ __('Description') }}</th> --}}
                            <th>{{ __('Category Name') }}</th>
                            <th>{{ __('Price After') }}</th>
                            <th>{{ __('Price before') }}</th>
                            <th>{{ __('Session Minutes') }}</th>
                            <th>{{ __('Is Featured') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($services as $service)
                            <tr >
                                <td>{{ ++$i }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->category?->name ?? 'Uncategorized' }}</td>
                                <td>{{ $service->price_after }}</td>
                                <td>{{ $service->price_before }}</td>
                                <td>{{ $service->session_minutes }} min.</td>
                                <td>
                                    @if ($service->is_featured)
                                        <span class="badge badge-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif
                                </td>
                                @if (!is_null($service->image))
                                    <td><img src="{{ asset('storage/' . $service->image) }}" alt=""
                                            class="w_200"></td>
                                @else
                                    <td>
                                        <p>{{ __('No image') }}</p>
                                    </td>
                                @endif
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admins.services.show', $service->slug) }}"
                                        class="mx-1 btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admins.services.edit', $service->slug) }}"
                                        class="mx-1 btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admins.services.destroy', $service->slug) }}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-1 btn btn-danger btn-sm"
                                            onClick="return confirm('ARE_YOU_SURE?');"><i
                                                class="fas fa-trash-alt"></i></button>
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
