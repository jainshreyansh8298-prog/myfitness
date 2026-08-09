<?php

namespace App\View\Components\Front;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServicesCategoriesView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $categories = [])
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.front.services-categories-view');
    }
}
