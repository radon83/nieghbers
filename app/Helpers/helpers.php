<?php

use App\Models\City;
use App\Models\Permission;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

if (!function_exists('getRouteName')) {
    function getRouteName()
    {
        return Route::getCurrentRoute()->getName();
    }
}

if (!function_exists('authorized')) {
    function authorized($permission, bool $route = false)
    {
        $guard = 'admin';
        if (auth('user')->check()) {
            $guard = 'user';
        }

        $user = auth($guard)->user();

        if (is_null($user))
            return redirect()->route('logout');

        // if (is_null($permission)) {
        //     if (!$route)
        //         dd('Wrong Inputs, please enter a right inputs!');
        //     else {
        //         if ($route) {
        //             $routeName = getRouteName();
        //             $permissions = config('permissions');

        //             foreach ($permissions as $permission => $guard) {
        //                 if ($permission == $routeName) {
        //                     dd('In Array');
        //                 }
        //             }

        //             abort(403);
        //         }
        //     }
        // }

        return Permission::where('name', $permission)->whereHas('roles', function ($query) use ($user) {
            $query->where('role_id', $user->role()->first()->id);
        })->exists();
    }
}

if (!function_exists('getRandomValue')) {
    function getRandomValue($values)
    {
        if (!count($values))
            echo 'No values';

        return $values[rand(0, count($values) - 1)];
    }
}

if (!function_exists('getUserGuard')) {
    function getUserGuard()
    {
        $guard = 'user';
        return $guard = Auth::guard('admin')->check() ? 'admin' : (Auth::guard($guard)->check() ? $guard : null);
    }
}

if (!function_exists('getUserSettings')) {
    function getUserSettings()
    {
        return Settings::where([
            ['position', '=', getUserGuard()],
            ['object_id', '=', auth(getUserGuard())->user()->id]
        ])->first();
    }
}

if (!function_exists('getCountryFlag')) {
    function getCountryFlag($country)
    {
        foreach (Settings::LANGs_FLAGEs as $country_sym => $lang) {
            // return $country == $country_sym ? $country_sym : continue;
            if ($country == $country_sym)
                return $country;
            else
                continue;
        }
    }
}

if (!function_exists('buildUserSettings')) {
    function buildUserSettings(int $object_id, string $position = 'user')
    {
        Settings::create([
            'position' => $position,
            'object_id' => $object_id,
        ]);
    }
}

if (!function_exists('detectUserLocation')) {
    function detectUserLocation($userId, $request)
    {
        $ip = $request->ip();// it will take 127.0.0.1 as i am working in localhost
        $ip= "128.234.154.79";
        $url = "https://ipapi.co/{" . $ip ."}/json/";
        $response = Http::get($url);

        if ($response->successful()) {
            $data = json_decode($response->body());

            // $country = $response['country'];
            $extractedCity = $data->city;
            $country = $data->country_name;
            $lat = $data->latitude;
            $long = $data->longitude;

            if (!City::where('name_en', $extractedCity)->exists()) {

                $city = new City();
                $city->name_ar = __($extractedCity);
                $city->name_en = $extractedCity;

                $city->save();
            }

            UserLocation::create([
                'user_id' => $userId,
                'long' => $long,
                'lat' => $lat,
                'country' => $country,
                'city' => $data->city,
            ]);
        }
    }
}

if (!function_exists('isAuthorized')) {
    function isAuthorized($permission)
    {
        return authorized($permission) ? 0 : abort(403);
    }
}

if (!function_exists('updateLocation')) {
    function updateLocation($user_id, $request)
    {
        $user = User::find($user_id);

        $ip = $request->ip();
        $url = "https://ipapi.co/{" . $ip ."}/json/";
        $response = Http::get($url);


        if ($response->successful()) {
            $data = json_decode($response->body());

            $lat = $data->latitude;
            $long = $data->longitude;


            UserLocation::where('user_id', $user)->update([
                'lan' => $lat,
                'long' => $long,
            ]);
        }
    }
}
