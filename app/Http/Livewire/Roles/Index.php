<?php

namespace App\Http\Livewire\Roles;

use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $roles;
    //
    public $paginator;
    public $searchTerm;
    public $status;
    public $avilability;

    public function mount()
    {
        isAuthorized('Show roles');

        $this->paginator = 15;
    }

    public function render()
    {
        $searchableStatus = $this->status == 'active' ? 'active' : ($this->status == 'inactive' ? 'inactive' : null);
        $this->roles = !$this->avilability ? Role::where([
            ['name', '=', $searchableStatus]
        ])->orWhere([
            ['guard', 'LIKE', '%' . $this->searchTerm . '%'],
        ])->take($this->paginator)->paginate() : Role::onlyTrashed()->where([
            ['name', '=', $searchableStatus]
        ])->orWhere([
            ['guard', 'LIKE', '%' . $this->searchTerm . '%'],
        ])->take($this->paginator)->paginate();

        return view('livewire.roles.index', [
            'roles' => $this->roles,
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
        $isDeleted = Role::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Role deleted successfully') : __('Failed to deleted the role, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
