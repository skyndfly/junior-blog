<?php

namespace App\View\Components\admin\alerts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SuccessAlert extends Component
{

    public function __construct()
    {
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.alerts.success-alert');
    }
}
