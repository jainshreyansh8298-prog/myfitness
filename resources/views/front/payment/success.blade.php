<x-front.main-layout>
    <div class="container py-5 text-center">
        <h2>Payment Success</h2>
        <p class="text-success">{{ $message }}</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to Home</a>
    </div>
</x-front.main-layout>
