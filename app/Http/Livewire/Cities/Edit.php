<?php

namespace App\Http\Livewire\Cities;

use Livewire\Component;

class Edit extends Component
{
    public $name_en;
    public $name_ar;
    public $city;

    public function mount()
    {
        isAuthorized('Edit city');

        $this->name_ar = $this->city->name_ar;
        $this->name_en = $this->city->name_en;
    }

    public function render()
    {
        return view('livewire.cities.edit');
    }

    public function save()
    {
        $this->validate();

        $this->city->name_en = $this->name_en;
        $this->city->name_ar = $this->name_ar;
        $isAdded = $this->city->save();

        session()->flash('message', $isAdded ? __('City updated successfully') : __('Failed to update city, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('cities.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:cities,name_en,' . $this->city->id,
            'name_ar' => 'required|string|unique:cities,name_ar,' . $this->city->id,
        ];
    }
}
