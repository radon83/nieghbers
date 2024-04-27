<?php

namespace App\Http\Livewire\Items;

use App\Models\ApplyItems;
use App\Models\Item;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Index extends Component
{
    protected $items;
    //
    public $paginator;
    public $searchTerm;
    public $availability;
    public $applyDate;
    public $endDate;
    public $item_id, $itme="";
    public $issued_date, $return_date, $user_id;

    public function mount()
    {
        isAuthorized('Show items');

        $this->paginator = 15;
    }

    public function render()
    {
        $this->items = $this->availability
            ? Item::onlyTrashed()->where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->with('city')->paginate($this->paginator)
            : Item::where('name_en', 'LIKE', '%' . $this->searchTerm . '%')->orWhere('name_ar', 'LIKE', '%' . $this->searchTerm . '%')->paginate($this->paginator);

        foreach ($this->items as $item) {
            if (ApplyItems::where([
                ['user_id', '=', auth()->user()->id],
                ['item_id', '=', $item->id]
            ])->exists()) {
            }
        }

        return view('livewire.items.index', [
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

    public function saveApplyItem($enc_id)
    {
        session()->put('item_to_borrow', $enc_id);
    }

    public function applyItem()
    {

        $item = Item::find(Crypt::decrypt(session('item_to_borrow')));

        // Validate the input fields
        $validatedData = $this->validate([
            'item_id' => [
                'required',
                'exists:items,id',
                function ($attribute, $value, $fail) {
                    $item = item::find($value);
                    if (!$item || $item->status !== 'Available') {
                        $fail('The selected item is not available.');
                    }
                },
            ],
            'user_id' => 'required|exists:users,id',
            'issued_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after_or_equal:issued_date|before_or_equal:'
             . date('Y-m-d', strtotime('+'.$item->allow_time.' days', strtotime($this->issued_date))),
        ]);

        $isApplied = ApplyItems::create([
            'owner_id' => $item->user_id,
            'user_id' => auth()->user()->id,
            'item_id' => $item->id,
            'date' => $this->applyDate,
            'end_date' => $this->endDate,
        ]);

        session()->flash('message', $isApplied ? __('Item applied successfully') : __('Failed to apply for the item, please try again!'));
        session()->flash('status', $isApplied);
    }
}
