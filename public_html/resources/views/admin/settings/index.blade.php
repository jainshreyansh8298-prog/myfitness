<x-dashboard.main-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sliders-h text-warning mr-2"></i>Site Settings & Design Controls</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('admins.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left Column: Settings with Tabs -->
            <div class="col-lg-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-cogs mr-2"></i>Configuration</h6>
                        <button type="submit" class="btn btn-warning btn-sm font-weight-bold text-dark shadow">
                            <i class="fas fa-save mr-1"></i>SAVE SETTINGS
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Nav Tabs -->
                        <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="brand-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="brand" aria-selected="true">Colors</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="hero-tab" data-toggle="tab" href="#hero" role="tab" aria-controls="hero" aria-selected="false">Hero</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ticker-tab" data-toggle="tab" href="#ticker" role="tab" aria-controls="ticker" aria-selected="false">Ticker</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="popup-tab" data-toggle="tab" href="#popup" role="tab" aria-controls="popup" aria-selected="false">Popup</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="sections-tab" data-toggle="tab" href="#sections" role="tab" aria-controls="sections" aria-selected="false">Sections</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="socials-tab" data-toggle="tab" href="#socials" role="tab" aria-controls="socials" aria-selected="false">Socials</a>
                            </li>
                        </ul>

                        <!-- Tab Panes -->
                        <div class="tab-content mt-4" id="settingsTabsContent">
                            
                            <!-- Tab: Brand & Colors -->
                            <div class="tab-pane fade show active" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                                <div class="form-group">
                                    <label class="font-weight-bold">Primary Accent Color (Neon Lime/Yellow)</label>
                                    <input type="color" name="primary_color" class="form-control" value="{{ $settings['primary_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Secondary Accent Color (Electric Cyan)</label>
                                    <input type="color" name="secondary_color" class="form-control" value="{{ $settings['secondary_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Background Color (Dark Theme)</label>
                                    <input type="color" name="bg_color" class="form-control" value="{{ $settings['bg_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Main Text Color</label>
                                    <input type="color" name="text_color" class="form-control" value="{{ $settings['text_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Button Text Color</label>
                                    <input type="color" name="button_text_color" class="form-control" value="{{ $settings['button_text_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Preloader Icon Color</label>
                                    <input type="color" name="preloader_color" class="form-control" value="{{ $settings['preloader_color'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Preloader Loading Text</label>
                                    <input type="text" name="preloader_text" class="form-control" value="{{ $settings['preloader_text'] }}">
                                </div>
                            </div>

                            <!-- Tab: Hero Carousel -->
                            <div class="tab-pane fade" id="hero" role="tabpanel" aria-labelledby="hero-tab">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="custom-control custom-switch mr-3">
                                        <input type="checkbox" class="custom-control-input" id="switchFade" name="hero_fade_effect" value="1" {{ $settings['hero_fade_effect'] == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="switchFade">Fade Effect</label>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-primary ml-auto" onclick="addHeroSlide()"><i class="fas fa-plus mr-1"></i>Add Slide</button>
                                </div>
                                <div id="hero-slides-container">
                                    @foreach($settings['hero_slides'] ?? [] as $index => $slide)
                                        <div class="form-row align-items-center mb-3 slide-item border p-2 rounded shadow-sm">
                                            <div class="col-md-2 text-center">
                                                @if(!empty($slide['url']))
                                                    @if(($slide['type'] ?? 'image') == 'video')
                                                        <video src="{{ $slide['url'] }}" style="width:100%; max-height:60px; object-fit:cover; border-radius:4px;" muted autoplay loop playsinline></video>
                                                    @else
                                                        <img src="{{ $slide['url'] }}" style="width:100%; max-height:60px; object-fit:cover; border-radius:4px;" alt="preview">
                                                    @endif
                                                @else
                                                    <div class="text-muted"><small>No Preview</small></div>
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                <select name="hero_slides[{{ $index }}][type]" class="form-control form-control-sm" required>
                                                    <option value="image" {{ ($slide['type'] ?? '') == 'image' ? 'selected' : '' }}>Image</option>
                                                    <option value="video" {{ ($slide['type'] ?? '') == 'video' ? 'selected' : '' }}>Video</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="hero_slides[{{ $index }}][url]" class="form-control form-control-sm mb-2" value="{{ $slide['url'] ?? '' }}" placeholder="Existing/External URL">
                                                <input type="file" name="hero_slides[{{ $index }}][file]" class="form-control-file form-control-sm" accept="image/*,video/*">
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.slide-item').remove()"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <small class="text-muted d-block mb-3">If you only add one slide, it will be a static background. Add multiple slides to enable the fading carousel.</small>
                                <div class="form-group">
                                    <label class="font-weight-bold">Hero Headline Title</label>
                                    <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Hero Subtitle</label>
                                    <textarea name="hero_subtitle" class="form-control" rows="2">{{ $settings['hero_subtitle'] }}</textarea>
                                </div>
                            </div>

                            <!-- Tab: Ticker -->
                            <div class="tab-pane fade" id="ticker" role="tabpanel" aria-labelledby="ticker-tab">
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="switchTicker" name="show_ticker" value="1" {{ $settings['show_ticker'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="switchTicker">Active Ticker</label>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Ticker Marquee Text</label>
                                    <input type="text" name="ticker_text" class="form-control" value="{{ $settings['ticker_text'] }}">
                                </div>
                            </div>

                            <!-- Tab: Popup -->
                            <div class="tab-pane fade" id="popup" role="tabpanel" aria-labelledby="popup-tab">
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="switchPopup" name="show_popup" value="1" {{ $settings['show_popup'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="switchPopup">Active Pop-Up Modal</label>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Popup Trigger Event</label>
                                    <select name="popup_trigger_type" class="form-control">
                                        <option value="time" {{ $settings['popup_trigger_type'] == 'time' ? 'selected' : '' }}>Time Delay (in Seconds)</option>
                                        <option value="scroll" {{ $settings['popup_trigger_type'] == 'scroll' ? 'selected' : '' }}>Scroll Percentage (%)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Trigger Value</label>
                                    <input type="number" step="0.1" name="popup_trigger_value" class="form-control" value="{{ $settings['popup_trigger_value'] }}">
                                    <small class="text-muted">Enter seconds (e.g., 1.5) or scroll percentage (e.g., 50).</small>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Popup Headline</label>
                                    <input type="text" name="popup_headline" class="form-control" value="{{ $settings['popup_headline'] }}">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Popup Subheadline</label>
                                    <textarea name="popup_subheadline" class="form-control" rows="2">{{ $settings['popup_subheadline'] }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold">Promo Discount Code</label>
                                    <input type="text" name="popup_discount_code" class="form-control" value="{{ $settings['popup_discount_code'] }}">
                                </div>
                            </div>

                            <!-- Tab: Sections -->
                            <div class="tab-pane fade" id="sections" role="tabpanel" aria-labelledby="sections-tab">
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swHero" name="show_hero_video" value="1" {{ $settings['show_hero_video'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swHero">Hero Workout Video Section</label>
                                </div>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swServices" name="show_services" value="1" {{ $settings['show_services'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swServices">Fitness Services Grid Section</label>
                                </div>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swWhyUs" name="show_why_us" value="1" {{ $settings['show_why_us'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swWhyUs">Why Choose Us Feature Section</label>
                                </div>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swTestimonials" name="show_testimonials" value="1" {{ $settings['show_testimonials'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swTestimonials">Testimonials Section</label>
                                </div>
                                <div class="form-group pl-4 mb-4">
                                    <label class="font-weight-bold text-muted" style="font-size: 0.9rem;">Testimonial Auto-Scroll Speed (Seconds)</label>
                                    <input type="number" step="1" min="1" name="testimonial_scroll_speed" class="form-control form-control-sm" style="max-width: 150px;" value="{{ $settings['testimonial_scroll_speed'] ?? 15 }}">
                                </div>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swBlogs" name="show_blogs" value="1" {{ $settings['show_blogs'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swBlogs">Blogs Slider Section</label>
                                </div>
                                <div class="custom-control custom-switch mb-3">
                                    <input type="checkbox" class="custom-control-input" id="swFaqs" name="show_faqs" value="1" {{ $settings['show_faqs'] == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label font-weight-bold" for="swFaqs">Compact FAQs Section</label>
                                </div>
                            </div>

                            <!-- Tab: Socials -->
                            <div class="tab-pane fade" id="socials" role="tabpanel" aria-labelledby="socials-tab">
                                <div class="form-group border p-3 rounded">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="swInstagram" name="show_instagram" value="1" {{ $settings['show_instagram'] == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="swInstagram">Enable Instagram</label>
                                    </div>
                                    <input type="text" name="social_instagram" class="form-control" placeholder="Instagram Profile URL" value="{{ $settings['social_instagram'] }}">
                                </div>

                                <div class="form-group border p-3 rounded">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="swTwitter" name="show_twitter" value="1" {{ $settings['show_twitter'] == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="swTwitter">Enable Twitter/X</label>
                                    </div>
                                    <input type="text" name="social_twitter" class="form-control" placeholder="Twitter Profile URL" value="{{ $settings['social_twitter'] }}">
                                </div>

                                <div class="form-group border p-3 rounded">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="swLinkedin" name="show_linkedin" value="1" {{ $settings['show_linkedin'] == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="swLinkedin">Enable LinkedIn</label>
                                    </div>
                                    <input type="text" name="social_linkedin" class="form-control" placeholder="LinkedIn Profile URL" value="{{ $settings['social_linkedin'] }}">
                                </div>

                                <div class="form-group border p-3 rounded">
                                    <div class="custom-control custom-switch mb-2">
                                        <input type="checkbox" class="custom-control-input" id="swWhatsapp" name="show_whatsapp" value="1" {{ $settings['show_whatsapp'] == '1' ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="swWhatsapp">Enable WhatsApp</label>
                                    </div>
                                    <input type="text" name="social_whatsapp" class="form-control" placeholder="WhatsApp Link (e.g. https://wa.me/971...)" value="{{ $settings['social_whatsapp'] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Live Preview -->
            <div class="col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-dark text-white d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold"><i class="fas fa-desktop mr-2"></i>Live Preview</h6>
                        <button type="button" class="btn btn-sm btn-info font-weight-bold" id="refreshPreviewBtn">
                            <i class="fas fa-sync-alt mr-1"></i>Refresh Preview
                        </button>
                    </div>
                    <div class="card-body p-0" style="height: 700px; overflow: hidden; position: relative;">
                        <!-- The iframe loads the frontend homepage -->
                        <iframe id="previewIframe" src="{{ route('front.home') }}" style="width: 100%; height: 100%; border: none;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // JS for dynamic hero slides
        let slideIndex = {{ count($settings['hero_slides'] ?? []) }};
        function addHeroSlide() {
            const container = document.getElementById('hero-slides-container');
            const html = `
                <div class="form-row align-items-center mb-3 slide-item border p-2 rounded shadow-sm">
                    <div class="col-md-2 text-center text-muted">
                        <small>New Slide</small>
                    </div>
                    <div class="col-md-3">
                        <select name="hero_slides[${slideIndex}][type]" class="form-control form-control-sm" required>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" name="hero_slides[${slideIndex}][url]" class="form-control form-control-sm mb-2" placeholder="Existing/External URL">
                        <input type="file" name="hero_slides[${slideIndex}][file]" class="form-control-file form-control-sm" accept="image/*,video/*">
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="btn btn-danger btn-sm w-100" onclick="this.closest('.slide-item').remove()"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
            slideIndex++;
        }

        // Live Preview Logic
        document.addEventListener('DOMContentLoaded', function() {
            const iframe = document.getElementById('previewIframe');
            const refreshBtn = document.getElementById('refreshPreviewBtn');
            
            // Refresh iframe on button click
            refreshBtn.addEventListener('click', function() {
                // To avoid caching issues, we can append a random query string, 
                // but setting src to itself usually works for same-origin.
                iframe.src = iframe.src;
            });

            // Map inputs to CSS variables in the frontend
            const colorInputs = {
                'primary_color': '--brand-primary',
                'secondary_color': '--brand-secondary',
                'bg_color': '--brand-bg',
                'text_color': '--brand-text',
                'button_text_color': '--brand-button-text'
            };

            // Add event listeners to update CSS variables in the iframe on the fly
            for (const [inputName, cssVar] of Object.entries(colorInputs)) {
                const input = document.querySelector(`input[name="${inputName}"]`);
                if (input) {
                    input.addEventListener('input', function(e) {
                        try {
                            const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                            if (iframeDoc) {
                                iframeDoc.documentElement.style.setProperty(cssVar, e.target.value, 'important');
                            }
                        } catch(err) {
                            console.error('Cannot access iframe for live preview update (CORS or loading).', err);
                        }
                    });
                }
            }
        });
    </script>
</x-dashboard.main-layout>
