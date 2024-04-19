<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileUploadComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $label, public $name, public $id = null, public $model = null, public $multi = false, public $cols = 12)
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
        return view('components.file-upload-component');
    }
}
