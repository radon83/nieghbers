<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthenticationController extends Controller
{
    //
    public function getLogin($guard = 'user')
    {
        return response()->view('pages.auth.login', compact('guard'));
    }

    public function logout()
    {
        $guard = 'user';

        if (auth('admin')->check()) {
            $guard = 'admin';
        }

        session()->invalidate();
        Auth::guard($guard)->logout();

        session()->flash('message', __('logged out successfully'));
        session()->flash('status', true);

        return redirect()->route('login', $guard);
    }

    // Assign Permissions
    public function assignPermissions($enc_id)
    {
        return response()->view('pages.roles.assign', [
            'role' => Role::find(Crypt::decrypt($enc_id)),
        ]);
    }

    public function getRegister()
    {
        return response()->view('pages.auth.reg');
    }

    public function getResetPassword()
    {
        return response()->view('pages.auth.reset-password');
    }

    public function newPassword($token)
    {
        return response()->view('pages.auth.new-password', compact('token'));
    }
}
