<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Service') }} {{ $service->name }} {{ __('Details') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ route('admins.services.index') }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>{{ __('Service Name') }}</td>
                                <td>
                                    {{$service->name}}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Category Name') }}</td>
                                <td>
                                    {{$service->category?->name}}
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Description') }}</td>
                                <td>{!! $service->description !!}</td>
                            </tr>

                            <tr>
                                <td>{{ __('Image') }}</td>
                                <td>
                                    @if($service->image)
                                       <img src="{{ asset('storage/'.$service->image) }}" class="w_100">
                                   @else
                                    <p>{{ __('No Image') }}</p>
                                    @endif
                               </td>
                            </tr>
                            <tr>
                                <td>{{ __('Price After') }}</td>
                                <td>
                                    {{$service->price_after}} AED
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Price Before') }}</td>
                                <td>
                                    {{$service->price_before}} AED
                                </td>
                            </tr>

                            <tr>
                                <td>{{ __('Session Minutes') }}</td>
                                <td>
                                    {{$service->session_minutes}} {{ __('Minutes') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
