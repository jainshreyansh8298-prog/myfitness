<x-front.main-layout title="Register | MyFitness Dubai">
    <section class="premium-section" style="padding-top: 140px; min-height: 100vh; display: flex; align-items: center; position: relative;">
        <!-- Background Elements -->
        <div style="position: absolute; top: -20%; right: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(16,185,129,0.1) 0%, transparent 70%); z-index: 0; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -20%; left: -10%; width: 50%; height: 50%; background: radial-gradient(circle, rgba(6,182,212,0.1) 0%, transparent 70%); z-index: 0; pointer-events: none;"></div>

        <div class="container" style="position: relative; z-index: 1;">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="text-center mb-5">
                        <span class="hero-badge mb-2">JOIN THE REVOLUTION</span>
                        <h1 style="font-size: 2.5rem; font-weight: 900; text-transform: uppercase;">
                            CREATE AN <span class="text-gradient">ACCOUNT</span>
                        </h1>
                    </div>

                    <div class="glass-panel" style="border-radius: 24px; padding: 40px; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                        <form action="{{ route('register') }}" method="POST" id="register" onsubmit="if (typeof CheckPassword !== 'undefined') { return CheckPassword(this); } return true;">
                            @csrf
                            
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">First Name</label>
                                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" pattern="[A-Za-z]{2,}" title="Letters only" name="first_name" required placeholder="John" value="{{ old('first_name') }}" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem;">
                                    @error('first_name')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Last Name</label>
                                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" pattern="[A-Z a-z]{2,}" title="Letters only" required placeholder="Doe" value="{{ old('last_name') }}" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem;">
                                    @error('last_name')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Email Address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required placeholder="name@example.com" value="{{ old('email') }}" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem;">
                                    @error('email')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Mobile Number</label>
                                    <div class="d-flex align-items-center">
                                        <input class="form-control" type="text" value="+971" disabled style="background: rgba(9,9,11,0.8); border: 1px solid var(--color-border); color: var(--color-text-muted); height: 56px; border-radius: 12px 0 0 12px; padding: 0 15px; font-size: 1rem; width: 70px; border-right: none; text-align: center;">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" pattern="5[0-9]{8}" maxlength="9" required placeholder="5X XXX XXXX" title="Please enter 9 digit number starting with 5" value="{{ old('phone') }}" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 0 12px 12px 0; padding: 0 20px; font-size: 1rem; flex: 1;">
                                    </div>
                                    @error('phone')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-4 mb-4">
                                <div class="col-md-6" style="position: relative;">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Password</label>
                                    <input id="pass" class="form-control @error('password') is-invalid @enderror" type="password" required name="password" placeholder="Create a password" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem; padding-right: 50px;">
                                    <button type="button" class="toggle-pass" data-target="pass" style="position: absolute; right: 16px; top: 40px; background: none; border: none; color: var(--color-text-muted); cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @error('password')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6" style="position: relative;">
                                    <label style="display: block; font-size: 0.85rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px;">Confirm Password</label>
                                    <input id="cnfpass" class="form-control @error('cnf_password') is-invalid @enderror" type="password" required name="cnf_password" placeholder="Confirm your password" style="background: rgba(9,9,11,0.6); border: 1px solid var(--color-border); color: var(--color-text); height: 56px; border-radius: 12px; padding: 0 20px; font-size: 1rem; padding-right: 50px;">
                                    <button type="button" class="toggle-pass" data-target="cnfpass" style="position: absolute; right: 16px; top: 40px; background: none; border: none; color: var(--color-text-muted); cursor: pointer;">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    @error('cnf_password')
                                        <span style="color: #fca5a5; font-size: 0.85rem; margin-top: 6px; display: block;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password Validation Rules -->
                            <div class="mb-4" style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 16px; border-radius: 12px;">
                                <div style="font-size: 0.85rem; color: var(--color-text-muted); font-weight: 600; text-transform: uppercase; margin-bottom: 8px;">Password Requirements:</div>
                                <div class="d-flex flex-column gap-2" style="font-size: 0.9rem;">
                                    <div id="Length" style="color: var(--color-text-muted);"><i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 8 characters</div>
                                    <div id="UpperCase" style="color: var(--color-text-muted);"><i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 1 alphabet character</div>
                                    <div id="Numbers" style="color: var(--color-text-muted);"><i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 1 numeric character</div>
                                </div>
                            </div>

                            <div id="wpass" style="color: #fca5a5; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); padding: 12px; border-radius: 8px; margin-bottom: 20px; font-size: 0.9rem; display: none; text-align: center;"></div>

                            <button type="submit" class="btn-premium btn-accent w-100 mb-4" style="height: 56px; font-size: 1.05rem;">
                                COMPLETE REGISTRATION
                            </button>

                            <div class="text-center">
                                <span style="color: var(--color-text-muted); font-size: 0.95rem;">Already have an account? <a href="{{ route('front.login') }}" class="text-gradient" style="font-weight: 800; text-decoration: none; margin-left: 4px;">Sign In here</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Password visibility toggle
        document.querySelectorAll('.toggle-pass').forEach(button => {
            button.addEventListener('click', function() {
                const targetId = this.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });

        // Password validation function
        function CheckPassword(form) {
            var decimal = /^(?=.*\d)(?=.*[a-z A-Z]).{8,50}$/;
            var password = document.getElementById("pass").value;
            var cnf_password = document.getElementById("cnfpass").value;

            if (password.match(decimal)) {
                if (password == cnf_password) {
                    return true;
                } else {
                    var wpass = document.getElementById("wpass");
                    if (wpass) {
                        wpass.innerHTML = "<i class='fas fa-exclamation-circle me-1'></i> Password and confirm password do not match";
                        wpass.style.display = "block";
                        setTimeout(function() { wpass.style.display = "none"; }, 8000);
                    }
                    return false;
                }
            } else {
                var wpass = document.getElementById("wpass");
                if (wpass) {
                    wpass.innerHTML = "<i class='fas fa-exclamation-circle me-1'></i> Password must be at least 8 characters and contain at least one letter and one number.";
                    wpass.style.display = "block";
                    setTimeout(function() { wpass.style.display = "none"; }, 8000);
                }
                return false;
            }
        }

        // Real-time password validation UI update
        $(document).ready(function() {
            $("#pass").on('keyup', function() {
                var password = $(this).val();
                
                // Length check
                if (password.length > 7) {
                    $("#Length").html('<i class="fas fa-check me-2" style="color: var(--color-accent);"></i> At least 8 characters');
                } else {
                    $("#Length").html('<i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 8 characters');
                }

                // Alphabet check
                if (/[A-Za-z]/.test(password)) {
                    $("#UpperCase").html('<i class="fas fa-check me-2" style="color: var(--color-accent);"></i> At least 1 alphabet character');
                } else {
                    $("#UpperCase").html('<i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 1 alphabet character');
                }

                // Number check
                if (/[0-9]/.test(password)) {
                    $("#Numbers").html('<i class="fas fa-check me-2" style="color: var(--color-accent);"></i> At least 1 numeric character');
                } else {
                    $("#Numbers").html('<i class="fas fa-times me-2" style="color: #ef4444;"></i> At least 1 numeric character');
                }
            });
        });
    </script>
</x-front.main-layout>
