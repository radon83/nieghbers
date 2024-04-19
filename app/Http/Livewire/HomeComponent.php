<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\category;
use App\Models\item;
use App\Models\place;


class HomeComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        $newitems = item::latest()->limit(4)->get();
        $items = item::all();
        $places = place::all(); 
        return view('livewire.home-component',['places'=>$places, 'newitems'=>$newitems, 'categories'=>$categories, 'items'=>$items])->layout('layouts.base');
    }
}
