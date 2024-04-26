<?php

namespace App\Http\Livewire\Items;

use App\Models\City;
use App\Models\Item;
use App\Models\Place;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name_ar;
    public $name_en;
    public $description_ar;
    public $description_en;
    public $fees;
    public $images = [];
    public $time;
    public $cities = [];
    public $selectedCity;
    public $places = [];
    public $selectedPlace;
    public $categories = [];
    public $selectedCategory;

    public function mount()
    {
        isAuthorized('Add item');

        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';

        $cities = City::select(['id', $col_name])->get();
        foreach ($cities as $city) {
            if (is_null($this->selectedCity))
                $this->selectedCity = $city->id;

            $this->cities[$city->id] = $city->$col_name;
        }

        $places = Place::where('city_id', $this->selectedCity)->select(['id', $col_name])->get();
        foreach ($places as $place) {
            $this->places[$place->id] = $place->$col_name;
        }

        $this->selectedPlace = Place::where('city_id', $this->selectedCity)->first()?->id;

        
        $categories = Category::select(['id', $col_name])->get();
        foreach ($categories as $category) {
            $this->categories[$category->id] = $category->$col_name;
        }

        //$this->selectedCategory = Category::where('category_id', $this->selectedCity)->first()?->id;
    }

    public function render()
    {
        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';
        $cities = City::select(['id', $col_name])->get();
        foreach ($cities as $city) {
            $this->cities[$city->id] = $city->$col_name;
        }

        return view('livewire.items.create');
    }

    public function updatedSelectedCity()
    {
        $col_name = session('lang') == 'ar' ? 'name_ar' : 'name_en';
        $places = Place::where('city_id', $this->selectedCity)->select(['id', $col_name])->get();
        $this->places = [];
        foreach ($places as $place) {
            $this->selectedPlace = $place->id;

            $this->places[$place->id] = $place->$col_name;
        }
    }

    public function save()
    {
        $this->validate();

        $item = new Item();
        $item->name_en = $this->name_en;
        $item->name_ar = $this->name_ar;
        $item->description_ar = $this->description_ar;
        $item->description_en = $this->description_en;
        $item->fee = $this->fees;
        $item->allow_time = $this->time;
        $item->city_id = $this->selectedCity;
        $item->place_id = $this->selectedPlace;
        $item->category_id = $this->selectedCategory;
        $item->user_id = auth()->user()->id;

        // Handle files
        $filePaths = [];
        if (count($this->images)) {

            foreach ($this->images as $image) {
                $filePath = $image->store('cm/items/', [
                    'disk' => 'public',
                ]);

                $filePaths[] = $filePath;
            }

            $item->images = json_encode($filePaths);
        }
        $isAdded = $item->save();

        session()->flash('message', $isAdded ? __('Item added successfully') : __('Failed to add new item, please try again!'));
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
            'selectedCategory' => 'required|integer|exists:categories,id',
            'selectedPlace' => 'required|integer|exists:places,id',
        ];
    }
}
