<?php

namespace App\View\Components\Front;

use App\Services\SiteSettingService;
use Illuminate\View\Component;

class HeroVideo extends Component
{
    public $showHero;
    public $heroSlides;
    public $heroFadeEffect;
    public $heroTitle;
    public $heroSubtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(SiteSettingService $siteSettingService)
    {
        $settings = $siteSettingService->getHeroSettings();
        
        $this->showHero       = $settings['showHero'];
        $this->heroSlides     = $settings['heroSlides'];
        $this->heroFadeEffect = $settings['heroFadeEffect'];
        $this->heroTitle      = $settings['heroTitle'];
        $this->heroSubtitle   = $settings['heroSubtitle'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.hero-video');
    }
}
