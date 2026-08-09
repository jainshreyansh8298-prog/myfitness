<header class="premium-header glass-panel" style="backdrop-filter: blur(20px);">
    <div class="container d-flex align-items-center justify-content-between py-3">
        <!-- Logo / Brand Name -->
        <a href="/" class="d-flex align-items-center text-decoration-none">
            @if(config('app.logo'))
                <img src="{{ asset(config('app.logo')) }}" alt="MyFitness Logo" style="height: 55px; width: auto; object-fit: contain;">
            @endif
        </a>

        <!-- Desktop Navigation -->
        <nav class="d-none d-lg-flex align-items-center gap-2 gap-xl-4" style="margin-right: auto; margin-left: 40px;">
            <a href="/" class="nav-link {{ Route::is('front.home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('front.services') }}" class="nav-link {{ Route::is('front.services*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('front.about') }}" class="nav-link {{ Route::is('front.about') ? 'active' : '' }}">About</a>
            <a href="{{ route('front.blogs') }}" class="nav-link {{ Route::is('front.blogs*') ? 'active' : '' }}">Blogs</a>
        </nav>

        <!-- Right Side Action Buttons & Mobile Menu Toggle -->
        <div class="d-flex align-items-center gap-4">
            <div class="d-none d-lg-flex align-items-center gap-4">
                @guest
                    <a href="{{ route('front.login') }}" style="color: var(--color-text); font-weight: 600; text-decoration: none; font-size: 0.95rem; text-transform: uppercase; display: flex; align-items: center; gap: 6px;">
                        <i class="far fa-user"></i> LOGIN
                    </a>
                @else
                    <a href="{{ route('front.dashboard') }}" style="color: var(--color-text); font-weight: 600; text-decoration: none; font-size: 0.95rem; text-transform: uppercase; display: flex; align-items: center; gap: 6px;">
                        <i class="fas fa-user-circle"></i> DASHBOARD
                    </a>
                @endguest

                <a href="{{ route('front.contact') }}" class="btn-premium btn-accent" style="padding: 12px 28px; font-size: 0.9rem; margin-left: 15px;">
                    BECOME A PARTNER
                </a>
            </div>
            
            <!-- Mobile Menu Toggle Button -->
            <button class="d-lg-none btn p-0 text-white" id="mobileMenuToggle" style="border: none; background: transparent; font-size: 1.5rem;" aria-label="Toggle Navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Menu -->
<div id="mobileNavMenu" class="mobile-nav-overlay d-lg-none">
    <a href="/" class="nav-link {{ Route::is('front.home') ? 'text-gradient' : '' }}">Home</a>
    <a href="{{ route('front.services') }}" class="nav-link {{ Route::is('front.services*') ? 'text-gradient' : '' }}">Services</a>
    <a href="{{ route('front.about') }}" class="nav-link {{ Route::is('front.about') ? 'text-gradient' : '' }}">About</a>
    <a href="{{ route('front.blogs') }}" class="nav-link {{ Route::is('front.blogs*') ? 'text-gradient' : '' }}">Blogs</a>
    <hr style="border-color: var(--color-border); margin: 20px 0;">
    
    @guest
        <a href="{{ route('front.login') }}" style="color: var(--color-text); font-weight: 700; text-decoration: none; font-size: 1.2rem; margin-bottom: 20px;"><i class="far fa-user me-2"></i>LOGIN</a>
    @else
        <a href="{{ route('front.dashboard') }}" style="color: var(--color-text); font-weight: 700; text-decoration: none; font-size: 1.2rem; margin-bottom: 20px;"><i class="fas fa-user-circle me-2"></i>DASHBOARD</a>
    @endguest

    <a href="{{ route('front.contact') }}" class="btn-premium btn-accent text-center mt-2">BECOME A PARTNER</a>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileNavMenu');
        
        if(toggleBtn && mobileMenu) {
            toggleBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
                if (mobileMenu.classList.contains('active')) {
                    toggleBtn.innerHTML = '<i class="fas fa-times"></i>';
                } else {
                    toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
                }
            });
        }
    });
</script>
