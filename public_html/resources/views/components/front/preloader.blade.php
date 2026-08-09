    <div class="preloader" id="preloader" style="display: flex; justify-content: center; align-items: center; background-color: var(--color-bg); position: fixed; width: 100%; height: 100%; z-index: 9999; top: 0; left: 0;">
        <div class="preloader-inner" style="display: flex; flex-direction: column; justify-content: center; align-items: center; width: 100%; height: 100%;">
            <i class="fas fa-dumbbell dumbbell-loader" style="color: {{ \App\Models\SiteSetting::get('preloader_color', '#10b981') }}; font-size: 5rem;"></i>
            <h3 style="color: var(--color-text); margin-top: 20px; font-weight: 700; letter-spacing: 2px; text-transform: lowercase;">{{ \App\Models\SiteSetting::get('preloader_text', 'myfitness.ae') }}</h3>
        </div>
    </div>

    <style>
    @keyframes liftDumbbell {
        0% { 
            transform: translateY(20px) rotate(-10deg); 
        }
        50% { 
            transform: translateY(-30px) rotate(10deg); 
        }
        100% { 
            transform: translateY(20px) rotate(-10deg); 
        }
    }
    .dumbbell-loader {
        animation: liftDumbbell 1.5s infinite ease-in-out;
        text-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }
    </style>