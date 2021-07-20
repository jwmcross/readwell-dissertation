<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
| When the mobile application uses the token to make an API request
| to your application, it should pass the token in the Authorization header as a Bearer token.
*/

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});


Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('children', \App\Http\Controllers\Api\v1\ChildController::class);

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
