<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class UserLocation extends Component
{
    public $latitude;
    public $longitude;
    protected $listeners = ['saveLocation' => 'updateAndStoreLocation'];

    public function mount($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function render()
    {
        return view('livewire.users.user-location');
    }

    public function updatedLatitude($value)
    {
        $this->emit('locationUpdated', ['latitude' => $value, 'longitude' => $this->longitude]);
    }

    public function updatedLongitude($value)
    {
        $this->emit('locationUpdated', ['latitude' => $this->latitude, 'longitude' => $value]);
    }

    public function updateAndStoreLocation($lat, $lng)
    {
        // Update the user's location in the database
        $user = User::find(auth()->id()); // Assuming you are updating the location for the authenticated user
        $user->location()->update(['lat' => $lat, 'long' => $lng]);
        dd($lat);

        session()->flash('success', 'Location updated successfully');
    }

    

}
