@php
    $showPopup = \App\Models\SiteSetting::get('show_popup', '1');
    $headline = \App\Models\SiteSetting::get('popup_headline', 'GET 10% OFF YOUR FIRST BOOKING!');
    $subheadline = \App\Models\SiteSetting::get('popup_subheadline', 'Join over 5,000+ fitness enthusiasts. Enter your email below to unlock your exclusive 10% discount promo code.');
    $discountCode = \App\Models\SiteSetting::get('popup_discount_code', 'FIRST10');
@endphp

@if($showPopup == '1' && !auth()->check())
<div id="discountModal" class="discount-modal-backdrop">
    <div class="discount-modal-card">
        <button class="discount-modal-close" id="closeDiscountModal" type="button" aria-label="Close">&times;</button>
        
        <span class="discount-tag-badge">🎁 FIRST BOOKING SPECIAL</span>
        
        <h2 class="text-gradient" style="font-size: 2.2rem; font-weight: 900; margin-bottom: 16px; text-transform: uppercase; letter-spacing: -1px; line-height: 1.2;">
            {{ $headline }}
        </h2>
        
        <p style="color: var(--color-text-muted); font-size: 1rem; margin-bottom: 32px; line-height: 1.6;">
            {{ $subheadline }}
        </p>

        <div id="popupAlert" style="display: none; padding: 16px; border-radius: 12px; font-weight: 600; margin-bottom: 24px; text-align: left; font-size: 0.95rem; border: 1px solid transparent;"></div>

        <form id="discountLeadForm">
            @csrf
            <div style="margin-bottom: 16px; position: relative;">
                <input type="email" name="email" id="discountLeadEmail" required placeholder="Enter your best email address..."
                       style="width: 100%; height: 56px; background: rgba(9, 9, 11, 0.6); border: 1px solid var(--color-border); border-radius: 12px; padding: 0 20px 0 50px; color: var(--color-text); font-size: 1.05rem; transition: all 0.3s ease; outline: none;"
                       onfocus="this.style.borderColor='var(--color-primary)';"
                       onblur="this.style.borderColor='var(--color-border)';">
                <i class="far fa-envelope" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: var(--color-text-muted); font-size: 1.2rem;"></i>
            </div>
            
            <button type="submit" class="btn-premium btn-accent" style="width: 100%; height: 56px; border-radius: 12px; font-size: 1.05rem;">
                CLAIM MY DISCOUNT NOW
            </button>
            <p style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: 16px; margin-bottom: 0;">We respect your privacy. No spam ever.</p>
        </form>

        <div id="codeDisplayArea" style="display: none; margin-top: 30px; background: rgba(6, 182, 212, 0.05); border: 2px dashed var(--color-primary); padding: 24px; border-radius: 16px; position: relative; overflow: hidden;">
            <p style="color: var(--color-text-muted); font-weight: 700; font-size: 0.85rem; margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px;">YOUR EXCLUSIVE PROMO CODE:</p>
            <div class="text-gradient" style="font-size: 2.5rem; font-weight: 900; letter-spacing: 3px; margin: 12px 0;" id="unlockedPromoCode">
                {{ $discountCode }}
            </div>
            <p style="color: var(--color-text-muted); font-size: 0.85rem; margin-top: 8px; margin-bottom: 0;">Use code at checkout to apply your discount.</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('discountModal');
    const closeBtn = document.getElementById('closeDiscountModal');
    const form = document.getElementById('discountLeadForm');
    const alertBox = document.getElementById('popupAlert');
    const codeArea = document.getElementById('codeDisplayArea');

    const dismissedAt = localStorage.getItem('myfitness_popup_dismissed_at');
    let shouldShow = true;
    
    if (localStorage.getItem('myfitness_popup_dismissed') === '1') {
        shouldShow = false;
    } else if (dismissedAt) {
        const oneHour = 60 * 60 * 1000; // 1 hour in milliseconds
        if (Date.now() - parseInt(dismissedAt) < oneHour) {
            shouldShow = false;
        }
    }

    // Trigger logic
    if (shouldShow) {
        let triggerType = "{{ \App\Models\SiteSetting::get('popup_trigger_type', 'time') }}";
        let triggerValue = parseFloat("{{ \App\Models\SiteSetting::get('popup_trigger_value', '1.5') }}");
        
        if (triggerType === 'time') {
            setTimeout(function() {
                modal.classList.add('active');
            }, triggerValue * 1000);
        } else if (triggerType === 'scroll') {
            window.addEventListener('scroll', function scrollHandler() {
                let scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
                if (scrollPercent >= triggerValue) {
                    modal.classList.add('active');
                    window.removeEventListener('scroll', scrollHandler);
                }
            });
        }
    }

    function dismissPopup() {
        modal.classList.remove('active');
        localStorage.setItem('myfitness_popup_dismissed_at', Date.now().toString());
    }

    closeBtn.addEventListener('click', dismissPopup);

    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            dismissPopup();
        }
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = document.getElementById('discountLeadEmail').value;

        fetch("{{ route('front.discount.store') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email: email })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                form.style.display = 'none';
                alertBox.style.display = 'block';
                alertBox.style.background = 'rgba(16, 185, 129, 0.1)';
                alertBox.style.color = '#fff';
                alertBox.style.borderColor = 'rgba(16, 185, 129, 0.3)';
                alertBox.innerText = data.message;
                
                document.getElementById('unlockedPromoCode').innerText = data.discount_code;
                codeArea.style.display = 'block';
                localStorage.setItem('myfitness_popup_dismissed', '1');
            } else {
                alertBox.style.display = 'block';
                alertBox.style.background = 'rgba(239, 68, 68, 0.1)';
                alertBox.style.color = '#fff';
                alertBox.style.borderColor = 'rgba(239, 68, 68, 0.3)';
                alertBox.innerText = data.message || 'Error processing email.';
            }
        })
        .catch(err => {
            console.error(err);
        });
    });
});
</script>
@endif
