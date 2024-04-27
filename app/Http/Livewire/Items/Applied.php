<?php

namespace App\Http\Livewire\Items;

use App\Models\ApplyItems;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Applied extends Component
{
    protected $items;
    //
    public $searchTerm;
    public $paginator;
    public $availability;

    public function mount()
    {
        isAuthorized('Show applied items');

        $this->paginator = 15;
    }

    public function render()
    {
        // Bugs Here - No filtering
        $this->items = $this->availability
            ? ApplyItems::onlyTrashed()->with('item')->where([
                ['user_id', '=', auth()->user()->id]
            ])->paginate($this->paginator)
            : ApplyItems::where([
                ['user_id', '=', auth()->user()->id]
            ])->with('item')->paginate($this->paginator);

        return view('livewire.items.applied', [
            'items' => $this->items
        ]);
    }

    function showInfo($owner_id) {
        dd($owner_id);
    }

    // Save Role from Modal
    public function saveAdminWillDeleted($enc_id)
    {
        session()->flash('admin_will_delete', $enc_id);
    }

    //
    public function deleteAdmin()
    {
        $isDeleted = Item::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Item deleted successfully') : __('Failed to deleted the item, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }

    public function setValueToCancelBorrow($enc_id)
    {
        session()->flash('value_to_cancel_borrow', $enc_id);
    }

    public function submitCancellationBorrow($id)
    {
        //$id = Crypt::decrypt(session('value_to_cancel_borrow'));

        $applyItem = ApplyItems::find( $id);
        $item = item::find($applyItem->item_id);


        $isDeleted = ApplyItems::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'applied'],
            ['id', '=', $id],
        ])->delete();

        

        $item->update(['status' => 'Available']);

        //$this->item->update(['status' => 'Available']);
        session()->flash('message', $isDeleted ? __('Order canceled successfully') : __('Failed to cancelate order, please try again!'));
        session()->flash('status', $isDeleted);
    }
}
