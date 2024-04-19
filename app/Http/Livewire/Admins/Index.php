<?php

namespace App\Http\Livewire\Admins;

use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $admins;
    //
    public $paginator;
    public $searchTerm;
    public $status;
    public $avilability;

    public function mount()
    {
        isAuthorized('Show admins');

        $this->paginator = 15;
    }

    // public function updatedAvilability () {
    //     dd($this->avilability);
    // }

    public function render()
    {
        $searchableStatus = $this->status == 'active' ? 'active' : ($this->status == 'inactive' ? 'inactive' : null);
        $this->admins = !$this->avilability ? Admin::where([
            ['status', '=', $searchableStatus]
        ])->orWhere([
            ['fname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['lname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['email', 'LIKE', '%' . $this->searchTerm . '%'],
            ['phone', 'LIKE', '%' . $this->searchTerm . '%'],
            ['gender', 'LIKE', '%' . $this->searchTerm . '%'],
            ['status', 'LIKE', '%' . $this->searchTerm . '%']
        ])->take($this->paginator)->paginate() : Admin::onlyTrashed()->where([
            ['status', '=', $searchableStatus]
        ])->orWhere([
            ['fname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['lname', 'LIKE', '%' . $this->searchTerm . '%'],
            ['email', 'LIKE', '%' . $this->searchTerm . '%'],
            ['phone', 'LIKE', '%' . $this->searchTerm . '%'],
            ['gender', 'LIKE', '%' . $this->searchTerm . '%'],
            ['status', 'LIKE', '%' . $this->searchTerm . '%']
        ])->take($this->paginator)->paginate();

        return view('livewire.admins.index', [
            'admins' => $this->admins,
        ]);
    }

    // Save Admin from Modal
    public function saveAdminWillDeleted($enc_id)
    {
        session()->flash('admin_will_delete', $enc_id);
    }

    //
    public function deleteAdmin()
    {
        $isDeleted = Admin::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Admin deleted successfully') : __('Failed to deleted the admin, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
