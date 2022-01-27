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

    return view('guest.welcome');
})->name('home');

Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('posts', PostController::class)->only(['index', 'show'])->parameter('post', 'post:slug');


Auth::routes();



Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);


});

/*
Routes: sever routes (url singolo post: posts/learn-laravel)

Model: Post

Migrazione: posts

- title - Learn Laravel
- slug  - learn-laravel
- sub_title
- body

Seeder


Controllers: admin/guest


Table: categories
- id
- name
- slug

Category <-> Post

*/
