<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\item;
use App\Models\ApplyItems;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ProductComponent extends Component
{
    use WithPagination;
    public $category_slug, $item_id, $itme="", $showElement=true;
    public $issued_date, $return_date, $user_id;
    protected $paginationTheme = 'bootstrap';

   
    public function mount($category_slug, $item_id){
        $this->category_slug = $category_slug;
        $this->item_id = $item_id;
    }

    
    function createloan() {
      
        //$this->showElement = false;
        //$this->emit('refreshPage');
        //dd($this->item->user->fname);

        $this->user_id = Auth::user()->id;
        $this->item = item::find($this->item_id);
        $this->validate([
            'item_id' => [
                'required',
                'exists:items,id',
                function ($attribute, $value, $fail) {
                    $item = item::find($value);
                    if (!$item || $item->status !== 'Available') {
                        $fail('The selected item is not available.');
                    }
                },
            ],
            'user_id' => 'required|exists:users,id',
            'issued_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:issued_date|before_or_equal:' . date('Y-m-d', strtotime('+'.$this->item->allow_time.' days', strtotime($this->issued_date))),
        ]);
      
    
        // If loan_id does not exist, create a new record
        ApplyItems::create([
            'item_id' => $this->item_id,
            'user_id'=> $this->user_id,
            'date' => $this->issued_date,
            'end_date' => $this->return_date,  
            'status' => 'applied', 
            'owner_id' => $this->item->user->id, 
        ]);
    
        // Update the status of the item to 'unavailable'
        //$newBook = book::find($this->book_id);
        $this->item->update(['status' => 'In use']);
        
        
        $this->showElement = false;
        $this->emit('refreshPage');
    
        return redirect('/dashboard/applied-items')->with('status', 'Loan request has been added!');
        //session()->flash('status', $isDeleted);
    }
 


    public function render()
    {
        $item = item::where('id', $this->item_id)->first();
        $category = category::where('category_slug', $this->category_slug)->first();
        $related_items = Item::where('category_id', $category->id)
                    ->where('id', '!=', $this->item_id)
                    ->take(4)
                    ->get();

        return view('livewire.product-component',['item'=>$item, 'category'=>$category, 'related_items'=>$related_items])->layout('layouts.base');
    }
}
