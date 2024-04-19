<?php

namespace App\Http\Livewire\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Reg extends Component
{
    public $fname;
    public $lname;
    public $email;
    public $phone;
    public $privacy;
    public $gender;
    public $password;

    public function render()
    {
        return view('livewire.auth.reg');
    }

    public function reg(Request $request)
    {
        $this->validate();

        if ($this->privacy) {
            $userId = DB::table('users')->insertGetId([
                'fname' => $this->fname,
                'lname' => $this->lname,
                'email' => $this->email,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'password' => Hash::make($this->password),
                'role_id' => Role::where([
                    ['guard', '=', 'user'],
                    ['name', '=', 'User']
                ])->first()->id,
                'status' => 'active',
            ]);

            if ($userId) {
                buildUserSettings($userId, 'user');
                detectUserLocation($userId, $request);
            }

            session()->flash('message', $userId ? __('Registration successfully') : __('Failed to register, please try again!'));
            session()->flash('status', $userId);

            return redirect()->route('login');
        } else {
            session()->flash('message',  __('You have to agree on privacy policy!'));
            session()->flash('status', false);
        }
    }

    public function rules()
    {
        return [
            'fname' => 'required|string|alpha|min:2|max:30',
            'lname' => 'required|string|alpha|min:2|max:30',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|min:2|max:20|regex:/^009665[0-9]{8}$/',
            'privacy' => 'required|boolean',
            'gender' => 'required|string|in:m,f',
            'password' => 'required|string|min:8|max:45',
        ];
    }
}
