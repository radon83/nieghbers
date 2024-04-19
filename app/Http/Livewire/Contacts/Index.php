<?php

namespace App\Http\Livewire\Contacts;

use App\Models\Contact;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $contacts;
    //
    public $paginator;
    public $searchTerm;
    public $availability;

    public function mount()
    {
        isAuthorized('Show contacts');

        $this->paginator = 15;
    }

    public function render()
    {
        $this->contacts = $this->availability
            ? Contact::onlyTrashed()->where('name', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('message', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator)
            : Contact::where('name', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('message', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator);

        return view('livewire.contacts.index', [
            'contacts' => $this->contacts
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
        isAuthorized('Delete contact');

        $isDeleted = Contact::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Contact deleted successfully') : __('Failed to deleted the contact, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
