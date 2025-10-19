<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthService
{
    public static function login(Request $request)
    {
        AuthValidateService::validateUser($request);

        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        $token = $user->createToken('auth_token')->plainTextToken;

        Log::info('Пользователь вошёл', [
            'user_id' => $user->id,
            'email' => $user->email,
            'token' => $token,
        ]);

        return response()->json([
            'message' => 'User login successfully.',
            'token' => $token,
            'user' => $user,
            'role' => $user->role,
        ], 200);
    }
}
