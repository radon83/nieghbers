<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $guard;

    public function mount () {
        isAuthorized('Add role');
    }

    public function render()
    {
        return view('livewire.roles.create');
    }

    public function save()
    {
        $this->validate();

        $role = new Role();
        $role->name = $this->name;
        $role->guard = $this->guard;
        $isAdded = $role->save();

        session()->flash('message', $isAdded ? __('Role added successfully') : __('Failed to add new role, please try again!'));
        session()->flash('status', $isAdded);

        return redirect()->route('roles.index');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'guard' => 'required|string|in:' . implode(',', Role::GURDS),
        ];
    }
}
