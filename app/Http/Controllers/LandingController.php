<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LandingController extends Controller
{
    //
    public function getLanding()
    {
        return response()->view('pages.landing', [
            'items' => Item::all(),
        ]);
    }
}
