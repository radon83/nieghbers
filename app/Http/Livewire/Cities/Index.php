<?php

namespace App\Http\Livewire\Cities;

use App\Models\City;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $cities;
    //
    public $paginator;
    public $searchTerm;
    public $availability;

    public function mount()
    {
        isAuthorized('Show cities');

        $this->paginator = 15;
    }

    public function render()
    {
        $this->cities = $this->availability
            ? City::onlyTrashed()->where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator)
            : City::where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator);

        return view('livewire.cities.index', [
            'cities' => $this->cities
        ]);
    }


    // Save Role from Modal
    public function saveAdminWillDeleted($enc_id)
    {
        session()->flash('admin_will_delete', $enc_id);
    }

    //
    public function deleteAdmin()
    {
        $isDeleted = City::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('City deleted successfully') : __('Failed to deleted the city, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
