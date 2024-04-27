<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;
use App\Models\Item;
use App\Models\ApplyItems;
use Illuminate\Support\Facades\Auth;

class RequestingItemComponent extends Component
{
    public $item_id;
    public $issued_date, $return_date, $user_id;

    function mount($item_id) {
        $this->item_id = $item_id;
    }

    public function save() {

        $this->user_id = Auth::user()->id;
        $item = item::find($this->item_id);
        $this->validate([
            'item_id' => [
                'required',
                'exists:items,id', 
                function ($attribute, $value, $fail) {
                    $item = Item::find($value);
                    if ($item && $item->status !== 'Available') {
                        $fail('The selected item is not available.');
                    }
                }, 
            ],
            'user_id' => 'required|exists:users,id',
            'issued_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:issued_date|
            before_or_equal:' . date('Y-m-d', strtotime('+'.$item->allow_time.' days',
             strtotime($this->issued_date))),
        ]);

      
      
    
        // If loan_id does not exist, create a new record
        ApplyItems::create([
            'item_id' => $this->item_id,
            'user_id'=> $this->user_id,
            'date' => $this->issued_date,
            'end_date' => $this->return_date,  
            'status' => 'applied', 
            'owner_id' => $item->user->id, 
        ]);
    
        // Update the status of the item to 'unavailable'
        //$newBook = book::find($this->book_id);
        $item->update(['status' => 'Pending']);
        
        
    
        return redirect('/dashboard/applied-items')->with('status', 'Loan request has been added!');
        //session()->flash('status', "Loan added");
    }


    public function render()
    {
        $item = item::where('id', $this->item_id)->first();
        return view('livewire.items.requesting-item-component',['item'=>$item])->layout('layouts.main2');
    }
}
