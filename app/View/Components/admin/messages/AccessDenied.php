<?php

namespace App\View\Components\admin\messages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AccessDenied extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.messages.access-denied');
    }
}
