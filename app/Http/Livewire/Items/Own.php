<?php

namespace App\Http\Livewire\Items;

use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Own extends Component
{
    protected $items;
    //
    public $searchTerm;
    public $paginator;
    public $availability;

    public function mount()
    {
        isAuthorized('Show owned items');

        $this->paginator = 15;
    }

    public function render()
    {
        // Bugs Here - No filtering
        $this->items = $this->availability
            ? Item::onlyTrashed()->where([
                ['name_en', 'LIKE', '%' . $this->searchTerm . '%'],
                ['description_ar', 'LIKE', '%' . $this->searchTerm . '%'],
                ['name_ar', 'LIKE', '%' . $this->searchTerm . '%'],
                ['description_en', 'LIKE', '%' . $this->searchTerm . '%'],
            ])->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->own()->paginate($this->paginator)
            : Item::own()->where([
                ['name_en', 'LIKE', '%' . $this->searchTerm . '%'],
                ['description_ar', 'LIKE', '%' . $this->searchTerm . '%'],
                ['name_ar', 'LIKE', '%' . $this->searchTerm . '%'],
                ['description_en', 'LIKE', '%' . $this->searchTerm . '%'],
            ])->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->own()->paginate($this->paginator);

        return view('livewire.items.own', [
            'items' => $this->items
        ]);
    }

    // Save Role from Modal
    public function saveAdminWillDeleted($enc_id)
    {
        session()->flash('admin_will_delete', $enc_id);
    }

    //
    public function deleteAdmin($id)
    {
        $isDeleted = Item::where('id', $id)->delete();

        session()->flash('message', $isDeleted ? __('Item deleted successfully') : __('Failed to deleted the item, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }
}
