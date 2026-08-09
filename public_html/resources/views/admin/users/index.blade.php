<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Users') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">

            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-ar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Email Verified ?') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($users as $user)
                            <tr >
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email ?? __('No Email') }}</td>
                                <td>
                                    @if ($user->email_verified_at)
                                        <span class="badge badge-success">{{ __('Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex">
                                        {{-- <a href="{{ route('admins.users.show', $user->id) }}"
                                            class="mx-1 btn btn-success btn-sm"><i class="fas fa-eye"></i></a> --}}

                                        {{--<form action="{{ route('admins.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="mx-1 btn btn-danger btn-sm"
                                                onclick="return confirm('{{ __('Are you sure?') }}')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>--}}
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-2 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>


</x-dashboard.main-layout>
