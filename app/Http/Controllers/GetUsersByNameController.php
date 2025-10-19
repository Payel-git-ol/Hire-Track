<?php

namespace App\Http\Controllers;

use App\Service\GetUsersByNameService;

class GetUsersByNameController
{
    public function getUsersByName(string $name)
    {
        return GetUsersByNameService::getUsersByName($name);
    }
}
