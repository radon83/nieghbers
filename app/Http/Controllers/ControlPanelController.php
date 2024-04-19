<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ControlPanelController extends Controller
{
    //
    public function getControlPanel()
    {
        return response()->view('pages.dashboard');
    }

    public function getLocation()
    {
        return response()->view('pages.users.location', [
            'user' => auth()->user(),
        ]);
    }
}
