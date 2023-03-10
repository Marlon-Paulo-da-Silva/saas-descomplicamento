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

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    // return json_encode($credentials);
    // die();

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();

        // return auth()->user();
        return json_encode(['status' => 'ok', 'api_data' => auth()->user()]);
    }


    return json_encode(['status' => 'error']);
    abort(401);

});

Route::get('/users', function () {
    return User::all();
})->middleware('auth:sanctum');
