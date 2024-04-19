<?php

namespace App\Http\Livewire\Places;

use App\Models\Place;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $places;
    //
    public $paginator;
    public $searchTerm;
    public $availability;

    public function mount()
    {
        isAuthorized('Show places');

        $this->paginator = 15;
    }

    public function render()
    {
        $this->places = $this->availability
            ? Place::onlyTrashed()->where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator)
            : Place::where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator);

        return view('livewire.places.index', [
            'places' => $this->places
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
        $isDeleted = Place::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Place deleted successfully') : __('Failed to deleted the place, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
