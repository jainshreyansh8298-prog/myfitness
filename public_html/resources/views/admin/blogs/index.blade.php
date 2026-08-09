<x-dashboard.main-layout>
    <h1 class="mb-3 text-gray-800 h3">{{ __('Blogs') }}</h1>
    <div class="mb-4 shadow card">
        <div class="py-3 card-header">
            <h6 class="m-0 mt-2 font-weight-bold text-primary"></h6>
            <div class="float-right d-inline">
                <a href="{{ route('admins.blogs.create') }}" class="btn btn-primary btn-sm"><i
                        class="fa fa-plus"></i>{{ __('Add New') }}</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('Serial') }}</th>
                            <th>{{ __('Featured Image') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Excerpt') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Posted At') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=0; @endphp
                        @foreach ($blogs as $blog)
                            <tr data-aos="fade-up">
                                <td>{{ ++$i }}</td>
                                @if (!is_null($blog->image))
                                    <td>
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt=""
                                            class="w_200">
                                    </td>
                                @else
                                    <td>
                                        <p>{{ __('No Image') }}</p>
                                    </td>
                                @endif
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->excerpt }}</td>
                                <td>{{ $blog->category?->name }}</td>
                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('admins.blogs.edit', $blog->slug) }}"
                                        class="mx-1 btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admins.blogs.destroy', $blog->slug) }}" method="post">
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

                {{ $blogs->links() }}
            </div>
        </div>
    </div>


</x-dashboard.main-layout>
