<?php

namespace App\View\Components\admin\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySelect extends Component
{
    public array $categories;
    public string $name;

    public function __construct(array $categories, string $name)
    {
        $this->categories = $categories;
        $this->name = $name;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.form.category-select');
    }
}
