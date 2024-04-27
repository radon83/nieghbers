<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MarkerController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ProductComponent;
use App\Models\Settings;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Control Panel - Routes
Route::prefix('dashboard')->middleware(['auth:admin,user', 'prevent_blocked_users', 'settings'])->group(function () {
    Route::get('/', [ControlPanelController::class, 'getControlPanel'])->name('control.panel');
    Route::get('{role}/assign', [AuthenticationController::class, 'assignPermissions'])->name('roles.assign');
    Route::get('/my-items', [ItemController::class, 'myItems'])->name('items.own');
    Route::get('/applied-items', [ItemController::class, 'appliedItems'])->name('items.applied');
    Route::get('/requested-items', [ItemController::class, 'requestedItems'])->name('items.requested');
    Route::get('/location', [ControlPanelController::class, 'getLocation'])->name('users.location');
    Route::post('dashboard/store-location', [MarkerController::class,'storeLocation']);
    Route::post('/{category_slug}/{item_id}', ProductComponent::class);


    // Resources - Routes
    Route::resource('admins', AdminController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('cities', CityController::class);
    Route::resource('places', PlaceController::class);
    Route::resource('items', ItemController::class);
    Route::resource('contacts', ContactController::class);

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::get('logout', [AuthenticationController::class, 'logout'])->withoutMiddleware('prevent_blocked_users')->name('logout');
});

// Authentication - Routes
Route::prefix('/')->middleware(['guest:admin,user'])->group(function () {
    Route::get('/login/{guard?}', [AuthenticationController::class, 'getLogin'])->name('login');
    Route::get('reg', [AuthenticationController::class, 'getRegister'])->name('reg');

    Route::get('reset-password', [AuthenticationController::class, 'getResetPassword'])->name('passwords.reset');
    Route::get('{token}/reset-password', [AuthenticationController::class, 'resetPassword'])->name('reset');
    Route::get('{token}/new-password', [AuthenticationController::class, 'newPassword'])->name('passwords.new');
});

Route::get('test', function () {
    // dd('Test Function');
    // dd(authorized('Show admins', true));
    // dd(implode(',', array_keys(Settings::LANGs)));
    // dd(app()->getLocale());
    // dd(getRandomValue(['A', 'B']));

    // dd(session('lang'), session('theme'));
    // dd(getCountryFlag('ps'));
    // dd(session('theme'));
    $routes_and_permissions = config('routes-and-permissions');
    dd(
        // in_array('admins.edit ', $routes_and_permissions)
        array_keys($routes_and_permissions)
    );
})->name('routes.test');

// public - Routes
Route::get('/', HomeComponent::class);
Route::get('/{category_slug}/{item_id}', ProductComponent::class);
Route::get('/{category_slug}', CategoryComponent::class);
