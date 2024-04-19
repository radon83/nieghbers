<?php

namespace App\Http\Livewire\Places;

use App\Models\City;
use App\Models\Place;
use Livewire\Component;

class Create extends Component
{
    public $name_en;
    public $name_ar;
    public $city_id;

    public function mount () {
        isAuthorized('Add place');
    }

    public function render()
    {
        $cities = [];
        foreach (City::get() as $city) {
            $cities[$city->id] = app()->getLocale() == 'ar' ? $city->name_ar : $city->name_en;
        }
        return view('livewire.places.create', [
            'cities' => $cities,
        ]);
    }

    public function save()
    {
        $this->validate();

        $place = new Place();
        $place->name_en = $this->name_en;
        $place->name_ar = $this->name_ar;
        $place->city_id = $this->city_id;
        $isAdded = $place->save();

        session()->flash('message', $isAdded ? __('Place added successfully') : __('Failed to add new place, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('places.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:places,name_en',
            'name_ar' => 'required|string|unique:places,name_ar',
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }
}
