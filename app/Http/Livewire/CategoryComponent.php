<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\item;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    public $category_slug;
    protected $paginationTheme = 'bootstrap';

   
    public function mount($category_slug){
        $this->category_slug = $category_slug;
        
    }

    public function render()
    {
        $category = category::where('category_slug', $this->category_slug)->first();
        $items = item::where('category_id', $category->id)->paginate(5);
        return view('livewire.category-component', ['items'=>$items, 'category'=>$category])->layout('layouts.base');
    }
}
