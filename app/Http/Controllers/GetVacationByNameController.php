<?php

namespace App\Http\Controllers;

use App\Service\GetVacationByNameService;
use Illuminate\Routing\Controller;

class GetVacationByNameController extends Controller
{
    public function getVacationByName(string $name)
    {
        return GetVacationByNameService::getVacationByName($name);
    }
}
