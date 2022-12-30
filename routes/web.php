<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

Route::post('/login', function () {
    $credentials = [
        'email' => 'pkutch@example.org',
        'password' => 'password'
    ];

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();

        return auth()->user();
    }


    return 'Não foi autorizado';
    // abort(401);

});

Route::get('/users', function () {
    return User::all();
})->middleware('auth:sanctum');
