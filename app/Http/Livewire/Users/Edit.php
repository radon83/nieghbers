<?php

namespace App\Http\Livewire\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $user;
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
        if ($this->user->id != auth()->user()->id)
            isAuthorized('Edit user');

        // dd($this->all());
        $this->fname = $this->user->fname;
        $this->lname = $this->user->lname;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->gender = $this->user->gender;
        $this->status = $this->user->status;
        $this->autoGeneratePassword = false;

        foreach (User::STATUS as $status) {
            $this->statusCollection[$status] = ucfirst(__($status));
        }
    }

    public function render()
    {
        foreach (Role::where('guard', 'user')->get() as $role) {
            $this->roles[$role->id] = ucfirst(__($role->name));
        }

        return view('livewire.users.edit', [
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
        $this->validate();

        // $user = new User();
        $this->user->fname = $this->fname;
        $this->user->lname = $this->lname;
        $this->user->email = $this->email;
        $this->user->phone = $this->phone;
        $this->user->gender = $this->gender;
        $this->user->role_id = $this->role_id;
        $this->user->password = $this->password ? Hash::make($this->password) : $this->user->password;
        $this->user->status = $this->status;

        // File Upload
        $filePath = null;
        // dd($this->photo);
        if ($this->photo) {
            $filePath = $this->photo->store('hr/users/', [
                'disk' => 'public',
            ]);

            // dd($filePath);
        } else {
            // dd('No Image');
        }

        $this->user->image = $filePath;
        $isUpdated = $this->user->save();

        session()->flash('message', $isUpdated ? __('User updated successfully') : __('Failed to update the user, please try again!'));
        session()->flash('status', $isUpdated);

        return redirect()->route('users.index');
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|min:2|max:20',
            'lname' => 'required|string|min:2|max:20',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
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
