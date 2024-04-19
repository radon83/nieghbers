<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $name_en;
    public $name_ar;

    public function mount () {
        isAuthorized('Show categories');

    }

    public function render()
    {
        return view('livewire.categories.create');
    }

    public function save()
    {
        $this->validate();

        $category = new Category();
        $category->name_en = $this->name_en;
        $category->name_ar = $this->name_ar;
        $isAdded = $category->save();

        session()->flash('message', $isAdded ? __('Category added successfully') : __('Failed to add new category, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('categories.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:categories,name_en',
            'name_ar' => 'required|string|unique:categories,name_ar',
        ];
    }
}
