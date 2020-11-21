<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Owners;
use App\Http\Controllers\Home;

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

/* Route::get('/', function () {
    return view('home');
}); */

Route::get('/about', function () { 
    return view('about');
});

/* Route::get('/owners/{id}', function () { 
    return view('owner');
}); */

Route::get('/', [Home::class, 'index']);

Route::get('/owners', [Owners::class, 'index']);

Route::get('/owners/{owner}', [Owners::class, 'show']);
