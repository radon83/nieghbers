<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $label, public $name, public $options, public $cols = 12, public $model = null, public $id = null, public $selected = null, public $icon = null)
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
        return view('components.select-component');
    }
}
