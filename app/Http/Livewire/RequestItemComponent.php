<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RequestItemComponent extends Component
{
    public $i, $item;
    
    public function mount($i, $item)
    {

    }

    public function render()
    {
        return view('livewire.request-item-component');
    }
}
