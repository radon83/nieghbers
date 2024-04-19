<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;

class MarkerController extends Controller
{
    public function storeLocation(Request $request)
    {
        dd($request->all());
        $lat = $request->input('lat');
        $lng = $request->input('lng');

        // Store the coordinates in your database or perform any other actions
        // Example: YourModel::create(['lat' => $lat, 'lng' => $lng]);
        // Update the user's location in the database
        $user = User::find(auth()->id()); // Assuming you are updating the location for the authenticated user
        $user->location()->update(['lat' => $lat, 'long' => $lng]);
        dd($lat);

        return response()->json(['message' => 'Coordinates saved successfully']);
    }
}
