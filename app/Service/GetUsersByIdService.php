<?php

namespace App\Service;

use App\Models\User;

class GetUsersByIdService
{
    public static function getUsersById(string $id)
    {
        $userId = User::find($id);

        return response()->json($userId);
    }
}
