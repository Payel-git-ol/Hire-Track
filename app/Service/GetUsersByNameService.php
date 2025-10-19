<?php

namespace App\Service;

use App\Models\User;

class GetUsersByNameService
{
    public static function getUsersByName(string $name)
    {
        $userName = User::where('users.name', $name)->get();

        return response()->json($userName);
    }
}
