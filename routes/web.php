<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RoleController;

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
Route::get('/', function () {
    return view('Front.welcome');
});

Route::get('/test', function () {
    return view('Back.pages.test'); 
})->name('test');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('Back.pages.index');
    })-> name('dashboard');
Route::resource('/produit', ProduitController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
Route::resource('/role', RoleController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

});
    
require __DIR__.'/auth.php';