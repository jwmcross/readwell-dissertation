<?php


namespace App\Services;

use App\Models\Carer;
use App\Models\User;

class ApiTokenManager
{

    public function createToken(User $user, $abilities = ['*'])
    {
        return $user->createToken('...', $abilities);
    }

    public function destroy(User $user)
    {
        $user->tokens()->delete();
    }
}
