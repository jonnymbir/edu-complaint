<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', \App\Livewire\Guest\HomeComponent::class)->name('home');
//Route::get('/about-us', \App\Livewire\Guest\AboutComponent::class)->name('about');
//Route::get('/complaint', \App\Livewire\Guest\ComplaintComponent::class)->name('complaint');

Route::get('/login', \App\Livewire\Admin\Auth\LoginComponent::class)->name('login');
Route::get('/logout', function () {
	Auth::logout();
	return redirect()->route('login');
})->name('logout');

//Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], static function (){
Route::group(['middleware' => ['auth']], static function (){
	Route::get('/', \App\Livewire\Admin\DashboardComponent::class)->name('dashboard');
	Route::get('/users', \App\Livewire\Admin\UserComponent::class)->name('users');
	Route::get('/roles', \App\Livewire\Admin\RoleComponent::class)->name('roles');
	Route::get('/regions', \App\Livewire\Admin\RegionComponent::class)->name('regions');
	Route::get('/complaint', \App\Livewire\Admin\ComplaintComponent::class)->name('complaints');
	Route::get('/divisions', \App\Livewire\Admin\DivisionComponent::class)->name('divisions');
	Route::get('/units', \App\Livewire\Admin\UnitComponent::class)->name('units');
	Route::get('/activity_logs', \App\Livewire\Admin\ActivityLogComponent::class)->name('activity_logs');
});
