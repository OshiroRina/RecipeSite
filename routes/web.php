<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('User/Welcome', [
//         'canLogin' => Route::has('user.login'),
//         'canRegister' => Route::has('user.register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', [RecipeController::class, 'index'])->name('topSite.index');
Route::get('/recipeSearch', [RecipeController::class, 'search'])->name('recipe.search');
Route::get('/recipeDetail/{id}', [RecipeController::class, 'show'])->name('recipe.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/favorite', [FavoriteController::class, 'index'])->middleware('auth:users')->name('favorite.index');


require __DIR__.'/auth.php';
