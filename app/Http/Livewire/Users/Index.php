<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $users;
    //
    public $paginator;
    public $searchTerm;
    public $status;
    public $avilability;

    public function mount()
    {
        isAuthorized('Show users');

        $this->paginator = 15;
    }

    // public function updatedAvilability () {
    //     dd($this->avilability);
    // }

    public function render()
    {
        $searchableStatus = $this->status == 'active' ? 'active' : ($this->status == 'inactive' ? 'inactive' : null);
        $this->users = !$this->avilability ? User::where([
            ['status', '=', $searchableStatus]
        ])->orWhere([
            ['fname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['lname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['email', 'LIKE', '%' . $this->searchTerm . '%'],
            ['phone', 'LIKE', '%' . $this->searchTerm . '%'],
            ['gender', 'LIKE', '%' . $this->searchTerm . '%'],
            ['status', 'LIKE', '%' . $this->searchTerm . '%']
        ])->take($this->paginator)->paginate() : User::onlyTrashed()->where([
            ['status', '=', $searchableStatus]
        ])->orWhere([
            ['fname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['lname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['email', 'LIKE', '%' . $this->searchTerm . '%'],
            ['phone', 'LIKE', '%' . $this->searchTerm . '%'],
            ['gender', 'LIKE', '%' . $this->searchTerm . '%'],
            ['status', 'LIKE', '%' . $this->searchTerm . '%']
        ])->take($this->paginator)->paginate();

        return view('livewire.users.index', [
            'users' => $this->users,
        ]);
    }

    // Save User from Modal
    public function saveAdminWillDeleted($enc_id)
    {
        session()->flash('admin_will_delete', $enc_id);
    }

    //
    public function deleteAdmin()
    {
        $isDeleted = User::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('User deleted successfully') : __('Failed to deleted the user, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
