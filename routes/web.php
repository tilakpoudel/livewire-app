<?php

use App\Http\Livewire\Counter;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Posts;
use App\Http\Livewire\ShowPost;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/counter', Counter::class)->name('counter');
Route::get('/posts', Posts::class)->name('posts');
Route::get('/posts/{post}', ShowPost::class)->name('view-post');

