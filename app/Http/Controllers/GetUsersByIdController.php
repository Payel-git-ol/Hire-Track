<?php

namespace App\Http\Controllers;

use App\Service\GetUsersByIdService;

class GetUsersByIdController
{
    public function getUserById(string $id)
    {
        return GetUsersByIdService::getUsersById($id);
    }
}
