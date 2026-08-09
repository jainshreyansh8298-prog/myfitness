<?php

namespace App\View\Components\Front;

use App\Models\Area;
use App\Models\Category;
use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceAndAreaSelectionComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $services;
    public $areas;
    
    public function __construct()
    {
        $this->services = Service::select('id', 'name')->get();
        $this->areas = Area::select('id', 'name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.service-and-area-selection-component');
    }
}
