<?php
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function (){ //Requiere auth para dichas rutas (si no, redirige a login/register)
    Route::get('/tweets', 'TweetsController@index')->name('home');
    Route::post('/tweets', 'TweetsController@store');
    Route::post('/profiles/{user}/follow', 'FollowsController@store');
    Route::get('/profiles/{user}/edit', 'ProfilesController@edit');
    Route::patch('/profiles/{user}', 'ProfilesController@update');
    Route::get('/profiles/{user}/seguidores','ProfilesController@showFollowers');
    Route::get('/logout', 'TweetsController@logout');
    Route::get('/delete/{tweet}', 'TweetsController@softDelete');
});

Route::get('/todos', 'ProfilesController@showAll')->name('todos');
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');



Auth::routes();
