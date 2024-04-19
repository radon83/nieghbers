<?php

namespace App\Http\Livewire\Admins;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $admin;
    public $fname;
    public $lname;
    public $email;
    public $password;
    public $phone;
    public $autoGeneratePassword;
    public $gender;
    public $status;
    public $statusCollection;
    public $photo;
    public $role_id;
    protected $roles = [];

    public function mount()
    {
        isAuthorized('Edit admin');

        // dd($this->all());
        $this->fname = $this->admin->fname;
        $this->lname = $this->admin->lname;
        $this->email = $this->admin->email;
        $this->phone = $this->admin->phone;
        $this->gender = $this->admin->gender;
        $this->role_id = $this->admin->role_id;
        $this->status = $this->admin->status;
        $this->autoGeneratePassword = false;

        foreach (Admin::STATUS as $status) {
            $this->statusCollection[$status] = ucfirst(__($status));
        }
    }

    public function render()
    {
        foreach (Role::where('guard', 'admin')->get() as $role) {
            $this->roles[$role->id] = ucfirst(__($role->name));
        }

        return view('livewire.admins.edit', [
            'roles' => $this->roles,
        ]);
    }

    // Generate Password
    public function updatedAutoGeneratePassword()
    {
        $this->password = $this->autoGeneratePassword ? Str::random(8) : $this->password;
    }

    public function edit()
    {
        isAuthorized('Edit admin');

        $this->validate();

        // $admin = new Admin();
        $this->admin->fname = $this->fname;
        $this->admin->lname = $this->lname;
        $this->admin->email = $this->email;
        $this->admin->phone = $this->phone;
        $this->admin->gender = $this->gender;
        $this->admin->role_id = $this->role_id;
        $this->admin->password = $this->password ? Hash::make($this->password) : $this->admin->password;
        $this->admin->status = $this->status;

        // File Upload
        $filePath = null;
        // dd($this->photo);
        if ($this->photo) {
            $filePath = $this->photo->store('hr/admins/', [
                'disk' => 'public',
            ]);

            // dd($filePath);
        } else {
            // dd('No Image');
        }

        $this->admin->image = $filePath;
        $isUpdated = $this->admin->save();

        session()->flash('message', $isUpdated ? __('Admin updated successfully') : __('Failed to update the admin, please try again!'));
        session()->flash('status', $isUpdated);

        return redirect()->route('admins.index');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:20',
            'lname' => 'required|string|min:2|max:20',
            'email' => 'required|email|unique:admins,email,' . $this->admin->id,
            'password' => 'nullable|string|min:8|max:45',
            'phone' => 'required|string|min:7|max:20',
            'gender' => 'required|string|in:f,m',
            'autoGeneratePassword' => 'required|boolean',
            'status' => 'required|string|in:active,inactive',
            'photo' => 'nullable|image|mime:jpg,png,jpeg',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }
}
