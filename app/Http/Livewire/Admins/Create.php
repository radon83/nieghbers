<?php

namespace App\Http\Livewire\Admins;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $fname;
    public $lname;
    public $email;
    public $password;
    public $phone;
    public $autoGeneratePassword;
    public $gender;
    public $photo;
    public $role_id;
    protected $roles = [];

    public function mount()
    {
        isAuthorized('Add admin');

        $this->autoGeneratePassword = false;
    }

    public function render()
    {
        foreach (Role::where('guard', 'admin')->get() as $role) {
            $this->roles[$role->id] = ucfirst(__($role->name));
        }

        return view('livewire.admins.create', [
            'roles' => $this->roles,
        ]);
    }

    // Generate Password
    public function updatedAutoGeneratePassword()
    {
        $this->password = $this->autoGeneratePassword ? Str::random(8) : $this->password;
    }

    public function save()
    {
        isAuthorized('Add admin');
        $this->validate();

        // File Upload
        $filePath = null;
        if ($this->photo) {
            $filePath = $this->photo->store('hr/admins/', [
                'disk' => 'public',
            ]);
        }

        $userId = DB::table('admins')->insertGetId([
            'fname' => $this->fname,
            'lname' => $this->lname,
            'email' => $this->email,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
            'status' => 'active',
            'image' => $filePath,
        ]);

        if ($userId)
            buildUserSettings($userId, 'admin');

        session()->flash('message', $userId ? __('Admin added successfully') : __('Failed to add new admin, please try again!'));
        session()->flash('status', $userId);

        return redirect()->route('admins.index');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:20',
            'lname' => 'required|string|min:2|max:20',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:8|max:45',
            'phone' => 'required|string|min:7|max:20',
            'gender' => 'required|string|in:f,m',
            'autoGeneratePassword' => 'required|boolean',
            // 'status' => 'required|string|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            'role_id' => 'required|integer|exists:roles,id',
        ];
    }
}
