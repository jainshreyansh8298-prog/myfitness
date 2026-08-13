<x-dashboard.main-layout>

    <h1 class="mb-3 text-gray-800 h3">{{ __('Form Submission') }}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-4 shadow card">
                <div class="py-3 card-header">
                    <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
                    <div class="float-right d-inline">
                        <a href="{{ redirect()->back() }}" class="btn btn-primary btn-sm">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">

                            <tr>
                                <td>{{ __('Name') }}</td>
                                <td>
                                    {{ $form->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Email') }}</td>
                                <td>
                                    {{ $form->email }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}</td>
                                <td>
                                    {{ $form->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Purpose') }}</td>
                                <td>
                                    {{ $form->purpose }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Comment') }}</td>
                                <td>
                                    {{ $form->comment }}
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-dashboard.main-layout>
