<?php

namespace App\Http\Livewire\Places;

use App\Models\City;
use Livewire\Component;

class Edit extends Component
{
    public $name_en;
    public $name_ar;
    public $city_id;
    public $place;

    public function mount()
    {
        isAuthorized('Edit place');

        $this->name_ar = $this->place->name_ar;
        $this->name_en = $this->place->name_en;
        $this->city_id = $this->place->city_id;
    }

    public function render()
    {
        $cities = [];
        foreach (City::get() as $city) {
            $cities[$city->id] = app()->getLocale() == 'ar' ? $city->name_ar : $city->name_en;
        }

        return view('livewire.places.edit', [
            'cities' => $cities,
        ]);
    }

    public function save()
    {
        $this->validate();

        // $place = new Place();
        $this->place->name_en = $this->name_en;
        $this->place->name_ar = $this->name_ar;
        $this->place->city_id = $this->city_id;
        $isAdded = $this->place->save();

        session()->flash('message', $isAdded ? __('Place updated successfully') : __('Failed to update place, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('places.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string|unique:places,name_en,' . $this->place->id,
            'name_ar' => 'required|string|unique:places,name_ar,' . $this->place->id,
            'city_id' => 'required|integer|exists:cities,id',
        ];
    }
}
