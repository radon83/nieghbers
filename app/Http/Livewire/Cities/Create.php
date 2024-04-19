<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
use Livewire\Component;

class Create extends Component
{
    public $name_en;
    public $name_ar;

    public function mount () {
        isAuthorized('Add city');
    }

    public function render()
    {
        return view('livewire.cities.create');
    }

    public function save()
    {
        $this->validate();

        $city = new City();
        $city->name_en = $this->name_en;
        $city->name_ar = $this->name_ar;
        $isAdded = $city->save();

        session()->flash('message', $isAdded ? __('City added successfully') : __('Failed to add new city, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('cities.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:cities,name_en',
            'name_ar' => 'required|string|unique:cities,name_ar',
        ];
    }
}
