<x-front.main-layout title="Login | MyFitness Dubai">
    <section class="premium-section" style="padding-top: 140px; min-height: 100vh; display: flex; align-items: center; position: relative;">
        <!-- Background Elements -->
        <div style="position: absolute; top: -20%; left: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(6,182,212,0.1) 0%, transparent 70%); z-index: 0; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -20%; right: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%); z-index: 0; pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="text-center mb-4">
                        <span class="hero-badge mb-2">WELCOME BACK</span>
                        <h1 style="font-size: 2.5rem; font-weight: 900; text-transform: uppercase;">
                            SIGN <span class="text-gradient">IN</span>
                        </h1>
                    </div>

                    <div class="glass-panel" style="border-radius: 24px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            
                            @if (session('error'))
                                <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #fca5a5; padding: 16px; border-radius: 12px; margin-bottom: 24px; font-size: 0.95rem; text-align: center;">
                                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-4">
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Email Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="name@example.com" value="{{ old('email') }}" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem;">
                                @error('email')
                                    <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4" style="position: relative;">
                                <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Password</label>
                                <input id="passwordInput" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required placeholder="Enter your password" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem; padding-right: 50px;">
                                <button type="button" onclick="togglePassword()" style="position: absolute; right: 16px; top: 40px; background: none; border: none; color: var(--color-text-muted); cursor: pointer;">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                                @error('password')
                                    <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                @enderror
                            </div>

                            <input type="hidden" name="type" value="login">

                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="form-check d-flex align-items-center gap-2">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" style="background: rgba(9,9,11,0.6); border-color: var(--color-border);">
                                    <label class="form-check-label" for="remember" style="color: var(--color-text-muted); font-size: 0.95rem; padding-top: 2px;">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('front.forgot') }}" style="color: var(--color-primary); font-size: 0.95rem; font-weight: 600; text-decoration: none;">Forgot Password?</a>
                            </div>

                            <button type="submit" class="btn-premium btn-accent w-100" style="height: 56px; font-size: 1.05rem;">
                                SIGN IN TO ACCOUNT
                            </button>

                            <div class="text-center mt-4">
                                <span style="color: var(--color-text-muted); font-size: 0.95rem;">New to MyFitness? <a href="{{ route('front.register') }}" class="text-gradient" style="font-weight: 800; text-decoration: none; margin-left: 4px;">Create an Account</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function togglePassword() {
            var input = document.getElementById('passwordInput');
            var icon = document.getElementById('eyeIcon');
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</x-front.main-layout>
