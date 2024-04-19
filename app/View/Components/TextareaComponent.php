<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TextareaComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $label, public $name, public $id = null, public $model = null, public $cols = null, public $rows = null, public $placeholder = null)
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
        return view('components.textarea-component');
    }
}
