<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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
//    return view('index');
//});

Route::get('contact', function () {
    return view('contact');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//USER
Route::get('/', [PropertyController::class, 'property'])->name('property.index');
Route::get('property/show/{id}', [PropertyController::class, 'show'])->name('property.show');
Route::get('property/sell', [PropertyController::class, 'getSellProperties'])->name('property.sell');
Route::get('property/rent', [PropertyController::class, 'getRentProperties'])->name('property.rent');
Route::get('property/Show-All', [PropertyController::class, 'showall'])->name('property.showall');



//ADMIN PANEL
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('admin_panel/index', [HomeController::class, 'index'])->name('admin_panel.index');
    Route::get('/admin_panel/{id}/status', [HomeController::class, 'type'])->name('admin_panel.type');
    Route::get('admin_panel/create', [HomeController::class, 'create'])->name('admin_panel.create');
    Route::post('admin_panel/id', [HomeController::class, 'store'])->name('admin_panel.store');
    Route::get('admin_panel/show/{id}', [HomeController::class, 'show'])->name('admin_panel.show');
    Route::get('/admin_panel/edit/{id}', [HomeController::class, 'edit'])->name('admin_panel.edit');
    Route::put('/admin_panel/update/{id}', [HomeController::class, 'update'])->name('admin_panel.update');
    Route::delete('/admin_panel/{home}', [HomeController::class, 'destroy'])->name('admin_panel.destroy');

});


require __DIR__.'/auth.php';
