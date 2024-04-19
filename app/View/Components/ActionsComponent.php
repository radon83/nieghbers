<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionsComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $submitLabel = 'Submit', public $cancelLabel = 'Cancel', public $action = 'save()')
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
        return view('components.actions-component');
    }
}
