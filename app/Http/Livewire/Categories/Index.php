<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $categories;
    //
    public $paginator;
    public $searchTerm;
    public $availability;

    public function mount()
    {
        isAuthorized('Show categories');

        $this->paginator = 15;
    }

    public function render()
    {
        $this->categories = $this->availability
            ? Category::onlyTrashed()->where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator)
            : Category::where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator);

        return view('livewire.categories.index', [
            'categories' => $this->categories
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
        $isDeleted = Category::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Category deleted successfully') : __('Failed to deleted the category, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
