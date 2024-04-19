<?php

namespace App\Http\Livewire\Categories;

use Livewire\Component;

class Edit extends Component
{
    public $name_en;
    public $name_ar;
    public $category;

    public function mount()
    {
        isAuthorized('Edit category');

        $this->name_ar = $this->category->name_ar;
        $this->name_en = $this->category->name_en;
    }

    public function render()
    {
        return view('livewire.categories.edit');
    }

    public function save()
    {
        $this->validate();

        $this->category->name_en = $this->name_en;
        $this->category->name_ar = $this->name_ar;
        $isAdded = $this->category->save();

        session()->flash('message', $isAdded ? __('Category updated successfully') : __('Failed to update category, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('categories.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:categories,name_en,' . $this->category->id,
            'name_ar' => 'required|string|unique:categories,name_ar,' . $this->category->id,
        ];
    }
}
