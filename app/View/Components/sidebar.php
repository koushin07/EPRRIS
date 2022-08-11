<?php

namespace App\View\Components;

use App\Models\Province;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
      
        return view('components.sidebar', ['provinces' =>Province::get(['id', 'province_name'])]);
    }
}