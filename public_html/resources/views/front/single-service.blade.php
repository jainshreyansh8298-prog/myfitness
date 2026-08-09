@php
    $priceBefore = $service->price_before > $service->price_after ? $service->price_before : ($service->price_after * 1.4);
    $discountPct = $service->discount_percentage ?? ($priceBefore > 0 ? round((($priceBefore - $service->price_after) / $priceBefore) * 100) : 0);
    $imgUrl = str_starts_with($service->image, 'http') ? $service->image : asset('storage/' . $service->image);
@endphp

<x-front.main-layout :title="$service->name . ' | MyFitness Dubai'">
    <section class="padding-top-60 padding-bottom-60" style="background: var(--brand-bg);">
        <div class="container">
            <div class="row g-5">
                <!-- Left: Service Details -->
                <div class="col-lg-7">
                    <div class="mb-3">
                        <a href="{{ route('front.services') }}" style="color: var(--brand-primary); text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: 0.2s;">
                            <i class="fas fa-arrow-left me-1"></i> BACK TO SERVICES
                        </a>
                    </div>

                    <h1 style="font-size: 2.5rem; font-weight: 800; color: var(--brand-text); margin-bottom: 16px; line-height: 1.25;">
                        {{ $service->name }}
                    </h1>

                    <div class="d-flex align-items-center flex-wrap gap-3 mb-4">
                        @if($service->category)
                            <span class="cult-category-badge" style="position: static; font-size: 0.85rem; padding: 6px 14px;">{{ $service->category->name }}</span>
                        @endif
                        @if($discountPct > 0)
                            <span class="cult-discount-badge" style="position: static; font-size: 0.85rem; padding: 6px 14px;">-{{ $discountPct }}% OFF</span>
                        @endif
                        <span style="color: var(--brand-text-muted); font-size: 0.95rem; font-weight: 500;">
                            <i class="far fa-clock me-1" style="color: var(--brand-primary);"></i> {{ $service->session_minutes }} Minutes
                        </span>
                    </div>

                    <div style="border-radius: 16px; overflow: hidden; margin-bottom: 30px; border: 1px solid var(--brand-card-border); box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                        <img src="{{ $imgUrl }}" alt="{{ $service->name }}" style="width: 100%; height: 400px; object-fit: cover;" onError="this.src='https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=800'">
                    </div>

                    <div style="background: var(--brand-card-bg); border: 1px solid var(--brand-card-border); border-radius: 16px; padding: 36px; color: var(--brand-text-muted); line-height: 1.8; font-size: 1.05rem;">
                        <h3 style="color: var(--brand-text); font-weight: 700; font-size: 1.4rem; margin-bottom: 20px;">Program Overview & What's Included</h3>
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                <!-- Right: Interactive Booking Widget -->
                <div class="col-lg-5">
                    <div style="background: var(--brand-card-bg); border: 1px solid var(--brand-primary); border-radius: 16px; padding: 36px; position: sticky; top: 120px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                        
                        <div class="text-center pb-4 mb-4" style="border-bottom: 1px solid var(--brand-card-border);">
                            <span style="color: var(--brand-text-muted); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">SPECIAL PRICE PER SESSION</span>
                            <div class="d-flex align-items-baseline justify-content-center gap-3 mt-2">
                                <span style="font-size: 2.5rem; font-weight: 800; color: var(--brand-primary);" id="displayPriceAfter">AED {{ number_format($service->price_after, 0) }}</span>
                                <span style="font-size: 1.25rem; color: #64748b; text-decoration: line-through; font-weight: 600;" id="displayPriceBefore">AED {{ number_format($priceBefore, 0) }}</span>
                            </div>
                        </div>

                        <form action="{{ route('front.order.create', $service->slug) }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label" style="color: var(--brand-text); font-weight: 600; font-size: 0.95rem;">1. Select Session Package</label>
                                <select name="sessions_number" id="packageSelect" class="form-select" required style="background: var(--brand-bg); border: 1px solid var(--brand-card-border); color: var(--brand-text); height: 52px; border-radius: 8px;">
                                    <option value="1" selected>1 Single Session</option>
                                    <option value="5">5 Sessions Package (Save 10%)</option>
                                    <option value="10">10 Sessions Transformation (Save 20%)</option>
                                    <option value="20">20 Sessions Ultimate (Save 30%)</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" style="color: var(--brand-text); font-weight: 600; font-size: 0.95rem;">2. Training Mode</label>
                                <select name="is_online" id="trainingMode" class="form-select" required style="background: var(--brand-bg); border: 1px solid var(--brand-card-border); color: var(--brand-text); height: 52px; border-radius: 8px;">
                                    <option value="0" selected>Offline / In-Person (At Your Home, Gym, Pool)</option>
                                    <option value="1">Online Video Coaching</option>
                                </select>
                            </div>

                            <div class="mb-4" id="areaSelectContainer">
                                <label class="form-label" style="color: var(--brand-text); font-weight: 600; font-size: 0.95rem;">3. Select Area in UAE</label>
                                <select name="area_id" id="areaSelect" class="form-select" style="background: var(--brand-bg); border: 1px solid var(--brand-card-border); color: var(--brand-text); height: 52px; border-radius: 8px;">
                                    @foreach($service->areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" style="color: var(--brand-text); font-weight: 600; font-size: 0.95rem;">4. Preferred Date & Time</label>
                                <input type="text" name="dtime" id="datetimePicker" class="form-control" required placeholder="Select date and time slot..." style="background: var(--brand-bg); border: 1px solid var(--brand-card-border); color: var(--brand-text); height: 52px; border-radius: 8px;">
                            </div>

                            <div class="mb-5">
                                <label class="form-label" style="color: var(--brand-text); font-weight: 600; font-size: 0.95rem;">5. Promo Code (Optional)</label>
                                <input type="text" name="promo_code" class="form-control" placeholder="Enter discount code" style="background: var(--brand-bg); border: 1px solid var(--brand-card-border); color: var(--brand-text); height: 52px; border-radius: 8px; text-transform: uppercase;">
                            </div>

                            <button type="submit" class="btn-cult-primary w-100" style="height: 56px; font-size: 1.1rem !important;">
                                PROCEED TO BOOKING <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Flatpickr Date Time Picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datetimePicker", {
                enableTime: true,
                minDate: "today",
                dateFormat: "Y-m-d H:i",
                minTime: "07:00",
                maxTime: "22:00"
            });

            const basePriceAfter = {{ $service->price_after }};
            const basePriceBefore = {{ $priceBefore }};

            const packageSelect = document.getElementById('packageSelect');
            const displayAfter = document.getElementById('displayPriceAfter');
            const displayBefore = document.getElementById('displayPriceBefore');
            const trainingMode = document.getElementById('trainingMode');
            const areaContainer = document.getElementById('areaSelectContainer');

            packageSelect.addEventListener('change', function() {
                const count = parseInt(this.value) || 1;
                const totalAfter = basePriceAfter * count;
                const totalBefore = basePriceBefore * count;

                displayAfter.innerText = 'AED ' + totalAfter.toLocaleString();
                displayBefore.innerText = 'AED ' + totalBefore.toLocaleString();
            });

            trainingMode.addEventListener('change', function() {
                if (this.value === '1') {
                    areaContainer.style.display = 'none';
                } else {
                    areaContainer.style.display = 'block';
                }
            });
        });
    </script>
</x-front.main-layout>
