<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewPassword extends Component
{
    public $new_password;
    public $new_password_confirmation;
    public $token;

    public function render()
    {
        return view('livewire.auth.new-password');
    }

    public function resetNewPassword()
    {
        $this->validate();

        $credentials = explode('#', Crypt::decrypt($this->token));

        if (Carbon::now() > $credentials[2]) {
            session()->flash('message', __('Invalid token, please try again!'));
            session()->flash('status', false);

            return redirect()->route('login');
        } else {
            $user = User::where('email', $credentials[0])->first();

            $user->password = Hash::make($this->new_password);
            $isUpdated = $user->save();

            session()->flash('message', $isUpdated ? __('Password reset successfully') : __('Failed to reset password, please try again!'));
            session()->flash('status', $isUpdated);

            return redirect()->route('login');
        }
    }

    public function rules()
    {
        return [
            'new_password' => 'required|string|min:8|max:45|confirmed',
        ];
    }
}
