<?php

namespace App\Service;

use Illuminate\Http\Request;

class AuthValidateService
{
    public static function validateUser(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
        ]);
    }
}
