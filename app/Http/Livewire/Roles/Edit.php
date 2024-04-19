<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $role;
    public $name;
    public $guard;

    public function mount()
    {
        isAuthorized('Edit role');

        $this->name = $this->role->name;
        $this->guard = $this->role->guard;
    }

    public function render()
    {
        return view('livewire.roles.edit');
    }

    public function save()
    {
        $this->validate();

        $this->role->name = $this->name;
        $this->role->guard = $this->guard;
        $isUpdated = $this->role->save();

        session()->flash('message', $isUpdated ? __('Role updated successfully') : __('Failed to update the role, please try again!'));
        session()->flash('status', $isUpdated);

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
