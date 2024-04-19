<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $guard;
    public $email;
    public $password;
    public $rememberMe;

    public function mount()
    {
        $this->rememberMe = false;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        $isLogged = Auth::guard($this->guard)->attempt($credentials, $this->rememberMe);

        // if ($isLogged)
        //     updateLocation(User::where('email', $credentials['email'])->first()->id, $request);

        session()->flash('message', $isLogged ? __('Logged in successfully') : __('Failed to login, please try again!'));
        session()->flash('status', $isLogged);

        return $isLogged ? redirect()->route(getUserGuard() == 'user' ? 'items.own' : 'users.index') : redirect()->back();
    }

    public function rules()
    {
        return [
            'guard' => 'required|string|in:admin,user',
            'email' => 'required|string',
            'password' => 'required|string',
            'rememberMe' => 'required|boolean',
        ];
    }
}
