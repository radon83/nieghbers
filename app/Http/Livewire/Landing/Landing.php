<?php

namespace App\Http\Livewire\Landing;

use App\Models\Contact;
use Livewire\Component;

class Landing extends Component
{
    public $name;
    public $email;
    public $message;

    public function render()
    {
        return view('livewire.landing.landing');
    }

    public function submitContact()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        session()->flash('message', __('Request send successfully'));
        session()->flash('status', true);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:45',
            'email' => 'required|email',
            'message' => 'required|string|min:2|max:45',
        ];
    }
}
