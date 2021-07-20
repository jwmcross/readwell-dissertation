<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserLoginRequest;
use App\Services\ApiTokenManager;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carer;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Hashing\HashManager;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email);

        if(!$user) {
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid Credentials');
        }

        if(!Hash::check($request->password, $user->password)){
            abort(Response::HTTP_UNAUTHORIZED, 'Invalid Credentials');
        }


        $carer = Carer::where('user_id', $user->id)->first();

        $token = (new ApiTokenManager)->createToken($user)->plainTextToken;

        return response()->json([
            'token' => $token,
            'carer_id' => $carer->id,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user_id;
        (new ApiTokenManager)->destroy($user);

        return response(Response::HTTP_NO_CONTENT);
    }
}
