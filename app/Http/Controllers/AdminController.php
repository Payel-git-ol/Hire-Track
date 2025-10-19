<?php

namespace App\Http\Controllers;

class AdminController
{
    public function index()
    {
        return response()->json(['message' => 'Welcome Admin!'], 200);
    }
}
