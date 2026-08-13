<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Forms Submission') }}</h1>
    <div class="mb-4 shadow card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-ar" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Phone') }}</th>
                            <th>{{ __('Purpose') }}</th>
                            <th>{{ __('Submitted At') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($forms as $form)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $form->name}}</td>
                                <td>{{ $form->email }}</td>
                                <td>{{ $form->phone }}</td>
                                <td>{{ $form->purpose }}</td>
                                <td>{{ $form->created_at->format('d M Y') }}</td>

                                <td class="d-flex justify-content-center">
                                    <a title="show in details" href="{{ route('admins.forms.show', $form->id) }}"
                                        class="mx-1 btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    
                                    <form action="{{ route('admins.forms.destroy', $form->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mx-1 btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure? It Will Removed Form All Statictics');">
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
