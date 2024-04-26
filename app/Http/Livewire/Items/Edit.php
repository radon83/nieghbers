<?php

namespace App\Http\Livewire\Items;

use App\Models\City;
use App\Models\Place;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name_ar;
    public $name_en;
    public $description_ar;
    public $description_en;
    public $fees;
    public $time;
    public $images = [];
    public $item;
    public $cities = [];
    public $selectedCity;
    public $places = [];
    public $selectedPlace;
    public $categories = [];
    public $selectedCategory;

    public function mount()
    {
        isAuthorized('Edit item');

        $this->name_ar = $this->item->name_ar;
        $this->name_en = $this->item->name_en;
        $this->description_ar = $this->item->description_ar;
        $this->description_en = $this->item->description_en;
        $this->selectedCity = $this->item->city_id;
        $this->selectedPlace = $this->item->place_id;
        $this->fees = $this->item->fee;
        $this->selectedCategory = $this->item->category_id;
        $this->time = $this->item->allow_time;

        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';

        $cities = City::select(['id', $col_name])->get();
        foreach ($cities as $city) {
            $this->cities[$city->id] = $city->$col_name;
        }

        $places = Place::where('city_id', $this->selectedCity)->select(['id', $col_name])->get();
        foreach ($places as $place) {
            $this->places[$place->id] = $place->$col_name;
        }

        $categories = Category::select(['id', $col_name])->get();
        foreach ($categories as $category) {
            $this->categories[$category->id] = $category->$col_name;
        }
    }

    public function render()
    {
        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';
        $cities = City::select(['id', $col_name])->get();
        foreach ($cities as $city) {
            $this->cities[$city->id] = $city->$col_name;
        }

        return view('livewire.items.edit');
    }

    public function updatedSelectedCity()
    {
        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';
        $places = Place::where('city_id', $this->selectedCity)->select(['id', $col_name])->get();
        $this->places = [];
        foreach ($places as $place) {
            $this->places[$place->id] = $place->$col_name;
        }
    }

    public function save()
    {
        $this->validate();

        $this->item->name_en = $this->name_en;
        $this->item->name_en = $this->name_en;
        $this->item->description_en = $this->description_en;
        $this->item->description_ar = $this->description_ar;
        $this->item->fee = $this->fees;
        $this->item->city_id = $this->selectedCity;
        $this->item->place_id = $this->selectedPlace;
        $this->item->category_id = $this->selectedCategory;
        $this->item->allow_time = $this->time;
        $this->item->user_id = auth()->user()->id;

        // Handle files
        $filePaths = [];
        if (count($this->images)) {

            foreach ($this->images as $image) {
                $filePath = $image->store('cm/items/', [
                    'disk' => 'public',
                ]);

                $filePaths[] = $filePath;
            }

            $this->item->images = json_encode($filePaths);
        }
        $isAdded = $this->item->save();

        session()->flash('message', $isAdded ? __('Item updated successfully') : __('Failed to update item, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('items.index');
    }

    public function rules()
    {
        return [
            'name_en' => 'required|string',
            'name_ar' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'fees' => 'required|numeric|min:1',
            'time' => 'nullable|numeric|min:1|max:25',
            'selectedCity' => 'required|integer|exists:cities,id',
            'selectedPlace' => 'required|integer|exists:places,id',
            'selectedCategory' => 'required|integer|exists:categories,id',
        ];
    }
}
