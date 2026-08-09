<x-front.main-layout>
    <div class="container py-5 text-center">
        <h2>Payment Cancelled</h2>
        <p class="text-danger">{{ $message }}</p>
        <a href="{{ url('/') }}" class="btn btn-primary mt-3">Go to Home</a>
    </div>
</x-front.main-layout>
