<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">FAQs</h1>
        <a href="{{ route('admins.faqs.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> {{ __('Add FAQ') }}
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All FAQs</h6>
        </div>
        <div class="card-body">
            @if($faqs->count() > 0)
                <div class="accordion" id="faqAccordion">
                    @foreach ($faqs as $faq)
                    <div class="card mb-2">
                        <div class="card-header p-2" id="heading{{ $faq->id }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-link text-left text-decoration-none flex-grow-1 text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                    <i class="fas fa-chevron-down mr-2 text-primary" style="font-size: 0.8rem;"></i> {{ $faq->question }}
                                    @if($faq->is_active)
                                        <span class="badge badge-success ml-2">Active</span>
                                    @else
                                        <span class="badge badge-secondary ml-2">Inactive</span>
                                    @endif
                                </button>
                                <div class="ml-3 text-nowrap">
                                    <a href="{{ route('admins.faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admins.faqs.destroy', $faq->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this FAQ?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div id="collapse{{ $faq->id }}" class="collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#faqAccordion">
                            <div class="card-body">
                                <p class="mb-2">{{ $faq->answer }}</p>
                                <hr>
                                <div class="text-muted small">
                                    <strong>Display Order:</strong> {{ $faq->sort_order }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted my-4">No FAQs found. Click "Add FAQ" to create one.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
