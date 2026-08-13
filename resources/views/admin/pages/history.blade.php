<x-dashboard.main-layout>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">History for {{ $page->title }}</h1>
        <a href="{{ route('admins.pages.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to Pages
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Revision History</h6>
        </div>
        <div class="card-body">
            @if($histories->count() > 0)
                <div class="accordion" id="historyAccordion">
                    @foreach ($histories as $history)
                    <div class="card mb-2">
                        <div class="card-header p-2" id="heading{{ $history->id }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-link text-left text-decoration-none flex-grow-1 text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{ $history->id }}" aria-expanded="false" aria-controls="collapse{{ $history->id }}">
                                    <i class="fas fa-chevron-down mr-2 text-primary" style="font-size: 0.8rem;"></i> Updated at {{ $history->created_at->format('M d, Y h:i A') }} ({{ $history->created_at->diffForHumans() }})
                                </button>
                            </div>
                        </div>

                        <div id="collapse{{ $history->id }}" class="collapse" aria-labelledby="heading{{ $history->id }}" data-parent="#historyAccordion">
                            <div class="card-body" style="max-height: 400px; overflow-y: auto; background-color: #f8f9fa;">
                                {!! $history->content !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted my-4">No history available for this page yet.</p>
            @endif
        </div>
    </div>

</x-dashboard.main-layout>
