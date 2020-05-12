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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/drawings', 'DrawingsController@index');
Route::get('/drawings', 'DrawingsController@feed');
Route::post('/addPosts', 'DrawingsController@addPosts');
Route::get('/editPost/{id}', 'DrawingsController@editPost');
Route::get('/editForm/{id}', 'DrawingsController@editForm');
Route::get('/deletePost/{id}', 'DrawingsController@deletePost');
Route::post('/comment', 'DrawingsController@comment');
Route::post('/like', 'DrawingsController@like');



Route::get('/pixelArt', 'PixelArtController@index');
Route::get('/drawingMaterials', 'DrawingMaterialsController@index');
Route::get('/design', 'DesignController@index');




