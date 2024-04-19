<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $label, public $name, public $type = 'text', public $cols = '12', public $model = null, public $value = null, public $id = null, public $icon = null, public $placeholder = null)
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
        return view('components.input-component');
    }
}
