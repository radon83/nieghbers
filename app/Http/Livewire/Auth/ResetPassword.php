<?php

namespace App\Http\Livewire\Auth;

use App\Jobs\ResetPasswordJob;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Str;

class ResetPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function resetPassword()
    {
        $this->validate();

        $user = User::where('email', '=', $this->email)->first();

        if (!is_null($user)) {
            ResetPasswordJob::dispatch($user);

            session()->flash('message',  __('Reset link sent successfully'));
            session()->flash('status', true);

            // return redirect()->route('passwords.new');
        } else {
            session()->flash('message',  __('Failed to send reset link, please try again!'));
            session()->flash('status', false);
        }
        return redirect()->route('control.panel');
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}
