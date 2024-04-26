<?php

namespace App\Http\Livewire\Items;

use App\Models\ApplyItems;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Requested extends Component
{
    protected $items;
    //
    public $searchTerm;
    public $paginator;
    public $availability;

    public function mount()
    {
        isAuthorized('Show requested items');

        $this->paginator = 15;
    }

    public function render()
    {
        // Bugs Here - No filtering
        $this->items = $this->availability
            ? ApplyItems::onlyTrashed()->with(['item', 'own'])->where([
                // ['user_id', '=', auth()->user()->id]
                ['owner_id', '=', auth()->user()->id]
            ])->paginate($this->paginator)
            : ApplyItems::where([
                // ['user_id', '=', auth()->user()->id]
                ['owner_id', '=', auth()->user()->id]
            ])->with(['item', 'own'])->paginate($this->paginator);

        return view('livewire.items.requested', [
            'items' => $this->items
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
        $isDeleted = Item::where('id', Crypt::decrypt(session('admin_will_delete')))->delete();

        session()->flash('message', $isDeleted ? __('Item deleted successfully') : __('Failed to deleted the item, please try again!'));
        session()->flash('status', $isDeleted);

        session()->forget('admin_will_delete');
    }

    public function setValueToCancelBorrow($enc_id)
    {
        session()->flash('value_to_cancel_borrow', $enc_id);
    }

    public function submitCancellationBorrow()
    {
        $id = Crypt::decrypt(session('value_to_cancel_borrow'));

        $isDeleted = ApplyItems::where([
            ['user_id', '=', auth()->user()->id],
            ['status', '=', 'applied'],
            ['id', '=', $id],
        ])->delete();

        session()->flash('message', $isDeleted ? __('Order canceled successfully') : __('Failed to cancelate order, please try again!'));
        session()->flash('status', $isDeleted);
    }

    public function takeAction($action, $enc_id)
    {
        ApplyItems::where([
            ['owner_id', '=', auth()->user()->id],
            ['id', '=', Crypt::decrypt($enc_id)],
            ['status', '=', 'applied'],
        ])->update([
            'status' => $action,
        ]);
        if($action == "canceled"){
             item::where('id',Crypt::decrypt($enc_id))->update(['status' => 'Available']);
        }elseif($action == "approved"){
            item::where('id',Crypt::decrypt($enc_id))->update(['status' => 'In use']);
        }
       
    }

 
}