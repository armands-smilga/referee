<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GameSchedulerController;
use App\Http\Controllers\SeasonGameController;
use App\Http\Controllers\Auth\AuthController;


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

/*
so unlogged user can atleast see the home page
*/

Route::get('/',function (){
    return view('home');
});
// Every route except the first one above, you need to be an authenticated user - using middleware
// Route to home page
Route::get('home',[AuthController::class,'home']) -> middleware('auth');

// Multiple routes for CRUD operations using GameSchedulerController
Route::resource('game-scheduler',GameSchedulerController::class) ->middleware('auth'); 

// Generates multiple routes for CRUD operations using SeasonGameController
Route::resource('season-games',SeasonGameController::class)->middleware('auth'); 
// Updates a specific game in season-games
Route::put('/season-games/{game}',[SeasonGameController::class,'update']) -> name('season-games.update') ->middleware('auth');
// Retrieves items and passes to items.index view
Route::get('/items',[ItemController::class,'index']) ->name('items.index') ->middleware ('auth');
// Generates create form for items
Route::get('/items/create',[ItemController::class,'create']) -> name('items.create') ->middleware ('auth');
// Route that saves new item handles form submission for creating new item in create.blade then stores it
Route::post('/items',[ItemController::class,'store']) -> name('items.store') ->middleware('auth');
// Route that updates specific item handles form sumbission for updating an existing item in index.blade 
Route::patch('/items/update/{item}',[ItemController::class,'update']) -> name('items.update') ->middleware ('auth');
// Route to add an item, adds new item using store method
Route::post('/items/add',[ItemController::class,'store']) ->middleware('auth');
// Deletes the specific item
Route::delete('/items/{item}',[ItemController::class,'destroy']) -> name('items.destroy') ->middleware ('auth');
// Auth routes
Route::get('logout', [AuthController::class,'logout']) ->name ('logout');
Route::get('login', [AuthController::class,'index']) ->name ('login');
Route::get('registration', [AuthController::class,'registration']) ->name ('register');
Route::post('post-login', [AuthController::class,'postLogin']) ->name ('login.post');
Route::post('post-registration', [AuthController::class,'postRegistration']) ->name ('registration.post');


