@if($categories && $categories->count() > 0)
@php
    $defaultImages = [
        'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=1520&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=1470&auto=format&fit=crop',
        'https://images.unsplash.com/photo-1599058917212-d750089bc07e?q=80&w=1469&auto=format&fit=crop'
    ];
@endphp

<section class="categories-section py-5">
    <div class="container mt-4 mb-4">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-4">
            <div class="mb-3 mb-md-0">
                <h2 style="font-size: 2.5rem; font-weight: 800; color: #fff; letter-spacing: -0.5px;">TRAINER-LED GROUP CLASSES</h2>
                <p style="font-size: 1.1rem; color: #aaa; margin-top: 5px;">Fun, engaging and result-oriented workouts</p>
            </div>
            <div>
                <a class="btn-premium btn-outline-light" href="{{ route('front.services') }}" style="border-radius: 30px; font-weight: 600; padding: 10px 24px;">
                    EXPLORE <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

        <div class="row g-4 mt-2">
            @foreach($categories->take(4) as $category)
            @php
                $fallbackImage = $defaultImages[$loop->index % count($defaultImages)];
            @endphp
            <div class="col-12 col-md-6 col-lg-3">
                <a href="{{ route('front.services', ['category_id' => $category->id]) }}" class="text-decoration-none">
                    <div class="category-card position-relative overflow-hidden rounded-4" style="height: 400px; background-color: #1a1a1a;">
                        @if($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-100 h-100 object-fit-cover category-img">
                        @else
                            <img src="{{ $fallbackImage }}" alt="{{ $category->name }}" class="w-100 h-100 object-fit-cover category-img">
                        @endif
                        
                        <div class="category-overlay"></div>
                        
                        <div class="category-content p-4" style="text-align: center !important;">
                            <h3 class="text-white mb-2 category-title" style="text-align: center !important;">{{ $category->name }}</h3>
                            
                            <div style="text-align: center !important; width: 100%; margin-top: 15px;">
                                <span class="category-custom-badge" style="{{ $category->color ? 'background-color: ' . $category->color . ' !important;' : '' }}">{{ $category->services_count }} Classes</span>
                            </div>
                        </div>
                        
                        <div class="explore-text-container">
                            <span class="text-white explore-text">EXPLORE <i class="fas fa-chevron-right ms-1"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .categories-section {
        background-color: var(--brand-bg);
    }
    .category-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0,0,0,0.4);
        border: 1px solid rgba(255,255,255,0.05);
    }
    .category-img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
        opacity: 0.6;
        filter: grayscale(30%) contrast(1.1);
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        background: linear-gradient(to bottom, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.8) 100%);
        transition: all 0.4s ease;
    }
    .category-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        z-index: 10;
        transition: all 0.4s ease;
    }
    .category-title {
        font-weight: 900; 
        font-size: 2.2rem; 
        text-transform: uppercase;
        letter-spacing: 1px;
        text-shadow: 0 4px 15px rgba(0,0,0,0.9);
    }
    .category-card:hover .category-img {
        transform: scale(1.1);
        opacity: 0.85;
        filter: grayscale(0%) contrast(1.1);
    }
    .category-card:hover .category-overlay {
        background: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.9) 100%);
    }
    .category-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.7), 0 0 20px rgba(255,255,255,0.05) !important;
        border-color: rgba(255,255,255,0.15);
    }
    .category-custom-badge {
        display: inline-block !important;
        float: none !important;
        margin: 0 auto !important;
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(4px);
        font-size: 0.85rem;
        padding: 8px 16px;
        border: 1px solid rgba(255,255,255,0.2);
        border-radius: 30px;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center !important;
    }
    .explore-text-container {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%) translateY(15px);
        opacity: 0;
        z-index: 10;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        width: 100%;
        text-align: center;
    }
    .category-card:hover .explore-text-container {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
    }
    .explore-text {
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 1px;
        text-shadow: 0 2px 10px rgba(0,0,0,0.8);
    }
    .btn-outline-light {
        color: #fff;
        border-color: rgba(255,255,255,0.3);
        transition: all 0.3s;
    }
    .btn-outline-light:hover {
        background-color: #fff;
        color: #000;
        border-color: #fff;
    }
    .object-fit-cover {
        object-fit: cover;
    }
</style>
@endif
